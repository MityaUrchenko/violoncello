<?php
/**
 * Импорт альбомов VK → инфоблок фотохроники (IBLOCK_ID=6).
 * Один альбом VK = один элемент, фото → множественное свойство PHOTOS.
 *
 * 1. Подставь VK_TOKEN.
 * 2. Открой /import_photos.php под админом Bitrix
 *    или: php import_photos.php
 *
 * После импорта файл лучше удалить с сервера.
 */

const VK_TOKEN = ''; // ключ доступа VK (сервисный или user)
const VK_OWNER_ID = -92726381;
const IBLOCK_ID = 6;
const PHOTO_PROPERTY = 'PHOTOS';
const SKIP_SYSTEM_ALBUMS = true;
const API_VERSION = '5.199';

if (php_sapi_name() !== 'cli') {
    $root = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/');
} else {
    $root = __DIR__;
    $_SERVER['DOCUMENT_ROOT'] = $root;
}

define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('BX_NO_ACCELERATOR_RESET', true);
define('STOP_STATISTICS', true);

require $root . '/bitrix/modules/main/include/prolog_before.php';

@set_time_limit(0);
@ignore_user_abort(true);

$isCli = php_sapi_name() === 'cli';
$isHtml = !$isCli;

if (!$isCli) {
    global $USER;
    if (!is_object($USER) || !$USER->IsAdmin()) {
        header('HTTP/1.1 403 Forbidden');
        echo 'Нужна авторизация администратора Bitrix.';
        exit;
    }
    header('Content-Type: text/html; charset=UTF-8');
    echo '<pre style="font:14px/1.4 monospace;white-space:pre-wrap">';
}

function out(string $msg): void
{
    echo $msg, PHP_EOL;
    if (function_exists('flush')) {
        @ob_flush();
        @flush();
    }
}

if (VK_TOKEN === '') {
    out('Подставь VK_TOKEN в import_photos.php и запусти снова.');
    exit(1);
}

if (!CModule::IncludeModule('iblock')) {
    out('Модуль iblock не подключён.');
    exit(1);
}

function vkCall(string $method, array $params): array
{
    $params['access_token'] = VK_TOKEN;
    $params['v'] = API_VERSION;
    $url = 'https://api.vk.com/method/' . $method . '?' . http_build_query($params);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_USERAGENT => 'violoncello-import-photos/1.0',
    ]);
    $raw = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($raw === false) {
        throw new RuntimeException('VK HTTP: ' . $err);
    }

    $json = json_decode($raw, true);
    if (!is_array($json)) {
        throw new RuntimeException('VK: пустой ответ');
    }
    if (!empty($json['error'])) {
        throw new RuntimeException(
            'VK ' . $json['error']['error_code'] . ': ' . $json['error']['error_msg']
        );
    }

    usleep(340000);
    return $json['response'] ?? [];
}

function vkLargestSrc(array $photo): ?string
{
    if (!empty($photo['sizes']) && is_array($photo['sizes'])) {
        usort($photo['sizes'], static function ($a, $b) {
            $sa = ((int)($a['width'] ?? 0)) * ((int)($a['height'] ?? 0));
            $sb = ((int)($b['width'] ?? 0)) * ((int)($b['height'] ?? 0));
            return $sb <=> $sa;
        });
        return $photo['sizes'][0]['url'] ?? null;
    }

    foreach (['orig_photo', 'photo_2560', 'photo_1280', 'photo_807', 'photo_604'] as $key) {
        if ($key === 'orig_photo' && !empty($photo['orig_photo']['url'])) {
            return $photo['orig_photo']['url'];
        }
        if (!empty($photo[$key]) && is_string($photo[$key])) {
            return $photo[$key];
        }
    }
    return null;
}

function downloadToBitrixFile(string $url): ?array
{
    $tmp = tempnam(sys_get_temp_dir(), 'vkph_');
    $fp = fopen($tmp, 'wb');
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_FILE => $fp,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 90,
        CURLOPT_USERAGENT => 'violoncello-import-photos/1.0',
    ]);
    $ok = curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    if (!$ok || !is_file($tmp) || filesize($tmp) < 100) {
        @unlink($tmp);
        return null;
    }

    $mime = function_exists('mime_content_type') ? (mime_content_type($tmp) ?: 'image/jpeg') : 'image/jpeg';
    $extMap = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
        'image/gif' => 'gif',
    ];
    $ext = $extMap[$mime] ?? 'jpg';
    $named = $tmp . '.' . $ext;
    @rename($tmp, $named);

    $file = CFile::MakeFileArray($named);
    if (!$file) {
        @unlink($named);
        return null;
    }
    $file['MODULE_ID'] = 'iblock';
    return ['file' => $file, 'path' => $named];
}

function findElementByXmlId(int $iblockId, string $xmlId): ?int
{
    $res = CIBlockElement::GetList(
        [],
        ['IBLOCK_ID' => $iblockId, '=XML_ID' => $xmlId, 'CHECK_PERMISSIONS' => 'N'],
        false,
        ['nTopCount' => 1],
        ['ID']
    );
    if ($row = $res->Fetch()) {
        return (int)$row['ID'];
    }
    return null;
}

function clearFileProperty(int $iblockId, int $elementId, string $code): void
{
    $res = CIBlockElement::GetProperty($iblockId, $elementId, [], ['CODE' => $code]);
    $del = [];
    while ($row = $res->Fetch()) {
        if (!empty($row['PROPERTY_VALUE_ID'])) {
            $del[$row['PROPERTY_VALUE_ID']] = ['VALUE' => ['del' => 'Y']];
        }
    }
    if ($del) {
        CIBlockElement::SetPropertyValuesEx($elementId, $iblockId, [$code => $del]);
    }
}

function fetchAllAlbums(): array
{
    $albums = [];
    $offset = 0;
    do {
        $chunk = vkCall('photos.getAlbums', [
            'owner_id' => VK_OWNER_ID,
            'need_system' => SKIP_SYSTEM_ALBUMS ? 0 : 1,
            'need_covers' => 1,
            'offset' => $offset,
            'count' => 100,
        ]);
        $items = $chunk['items'] ?? [];
        $albums = array_merge($albums, $items);
        $offset += count($items);
        $total = (int)($chunk['count'] ?? 0);
    } while ($items && $offset < $total);

    if (SKIP_SYSTEM_ALBUMS) {
        $albums = array_values(array_filter($albums, static function ($a) {
            return (int)($a['id'] ?? 0) > 0;
        }));
    }

    return $albums;
}

function fetchAlbumPhotos(int $albumId): array
{
    $photos = [];
    $offset = 0;
    do {
        $resp = vkCall('photos.get', [
            'owner_id' => VK_OWNER_ID,
            'album_id' => $albumId,
            'count' => 1000,
            'offset' => $offset,
            'photo_sizes' => 1,
        ]);
        $items = $resp['items'] ?? [];
        $photos = array_merge($photos, $items);
        $offset += count($items);
        $total = (int)($resp['count'] ?? 0);
    } while ($items && $offset < $total);

    return $photos;
}

out('owner=' . VK_OWNER_ID . ' iblock=' . IBLOCK_ID . ' property=' . PHOTO_PROPERTY);

try {
    $albums = fetchAllAlbums();
} catch (Throwable $e) {
    out('Ошибка VK: ' . $e->getMessage());
    exit(1);
}

out('Альбомов: ' . count($albums));

$el = new CIBlockElement();

foreach ($albums as $album) {
    $albumId = (int)$album['id'];
    $title = trim((string)($album['title'] ?? ''));
    if ($title === '') {
        $title = 'Альбом ' . $albumId;
    }
    $xmlId = 'vk-album-' . $albumId;
    $expected = (int)($album['size'] ?? 0);

    out('');
    out("[{$albumId}] {$title} ({$expected} фото)");

    try {
        $vkPhotos = fetchAlbumPhotos($albumId);
    } catch (Throwable $e) {
        out('  ошибка photos.get: ' . $e->getMessage());
        continue;
    }

    $files = [];
    $tmpPaths = [];
    $previewFile = null;

    foreach ($vkPhotos as $i => $photo) {
        $src = vkLargestSrc($photo);
        if (!$src) {
            out('  skip photo ' . ($photo['id'] ?? $i) . ' — нет URL');
            continue;
        }
        $dl = downloadToBitrixFile($src);
        if (!$dl) {
            out('  skip photo ' . ($photo['id'] ?? $i) . ' — не скачалось');
            continue;
        }
        $files[] = $dl['file'];
        $tmpPaths[] = $dl['path'];
        if ($previewFile === null) {
            $previewFile = CFile::MakeFileArray($dl['path']);
            if ($previewFile) {
                $previewFile['MODULE_ID'] = 'iblock';
            }
        }
        if ((($i + 1) % 20) === 0) {
            out('  скачано ' . count($files) . '/' . count($vkPhotos));
        }
    }

    out('  готово файлов: ' . count($files) . '/' . count($vkPhotos));

    $propValues = [];
    foreach ($files as $n => $file) {
        $propValues['n' . $n] = ['VALUE' => $file];
    }

    $fields = [
        'IBLOCK_ID' => IBLOCK_ID,
        'XML_ID' => $xmlId,
        'NAME' => $title,
        'ACTIVE' => 'Y',
        'PREVIEW_TEXT' => (string)($album['description'] ?? ''),
        'PREVIEW_TEXT_TYPE' => 'text',
    ];
    if (!empty($album['created'])) {
        $fields['ACTIVE_FROM'] = ConvertTimeStamp((int)$album['created'], 'FULL');
    }
    if ($previewFile) {
        $fields['PREVIEW_PICTURE'] = $previewFile;
    }

    $existingId = findElementByXmlId(IBLOCK_ID, $xmlId);

    if ($existingId) {
        $ok = $el->Update($existingId, $fields);
        if (!$ok) {
            out('  ошибка Update: ' . $el->LAST_ERROR);
        } else {
            clearFileProperty(IBLOCK_ID, $existingId, PHOTO_PROPERTY);
            if ($propValues) {
                CIBlockElement::SetPropertyValuesEx($existingId, IBLOCK_ID, [
                    PHOTO_PROPERTY => $propValues,
                ]);
            }
            out('  обновлён #' . $existingId);
        }
    } else {
        $fields['PROPERTY_VALUES'] = [
            PHOTO_PROPERTY => $propValues,
        ];
        $newId = $el->Add($fields);
        if ($newId) {
            out('  создан #' . $newId);
        } else {
            out('  ошибка Add: ' . $el->LAST_ERROR);
        }
    }

    foreach ($tmpPaths as $path) {
        @unlink($path);
    }
}

out('');
out('Готово.');

if ($isHtml) {
    echo '</pre>';
}
