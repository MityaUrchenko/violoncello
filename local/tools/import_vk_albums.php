<?php
/**
 * Одноразовая выгрузка альбомов VK → инфоблок фотохроники.
 *
 * Каждому альбому — элемент, фото — множественное свойство файла PHOTOS.
 * Повторный запуск не дублирует: XML_ID = vk-album-{id}.
 *
 * Запуск с корня сайта:
 *   VK_ACCESS_TOKEN=xxxxx php local/tools/import_vk_albums.php
 *
 * Опции:
 *   --iblock=5
 *   --owner=-92726381
 *   --property=PHOTOS
 *   --limit=0          сколько альбомов (0 = все)
 *   --skip-system      не брать стену/профиль
 *   --dry-run          только список, без записи в БД
 */

if (php_sapi_name() !== 'cli') {
    fwrite(STDERR, "Только CLI\n");
    exit(1);
}

$root = realpath(__DIR__ . '/../..');
$_SERVER['DOCUMENT_ROOT'] = $root;
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('BX_NO_ACCELERATOR_RESET', true);

require $root . '/bitrix/modules/main/include/prolog_before.php';

if (!CModule::IncludeModule('iblock')) {
    fwrite(STDERR, "Модуль iblock не подключён\n");
    exit(1);
}

$opts = [
    'iblock' => getenv('IBLOCK_ID') ?: 5,
    'owner' => getenv('VK_OWNER_ID') ?: -92726381,
    'property' => getenv('PHOTO_PROPERTY') ?: 'PHOTOS',
    'limit' => 0,
    'token' => getenv('VK_ACCESS_TOKEN') ?: '',
    'skip-system' => false,
    'dry-run' => false,
];

foreach (array_slice($argv, 1) as $arg) {
    if ($arg === '--dry-run') {
        $opts['dry-run'] = true;
        continue;
    }
    if ($arg === '--skip-system') {
        $opts['skip-system'] = true;
        continue;
    }
    if (preg_match('/^--([^=]+)=(.*)$/', $arg, $m)) {
        $opts[$m[1]] = $m[2];
    }
}

$opts['iblock'] = (int)$opts['iblock'];
$opts['owner'] = (int)$opts['owner'];
$opts['limit'] = (int)$opts['limit'];

if ($opts['token'] === '') {
    fwrite(STDERR, "Нужен VK_ACCESS_TOKEN (сервисный ключ приложения или user token)\n");
    fwrite(STDERR, "Создать: https://dev.vk.com → приложение → сервисный ключ доступа\n");
    exit(1);
}

function vkCall(string $method, array $params): array
{
    global $opts;
    $params['access_token'] = $opts['token'];
    $params['v'] = '5.199';
    $url = 'https://api.vk.com/method/' . $method . '?' . http_build_query($params);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_USERAGENT => 'violoncello-import/1.0',
    ]);
    $raw = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($raw === false) {
        throw new RuntimeException('VK HTTP: ' . $err);
    }
    $json = json_decode($raw, true);
    if (!empty($json['error'])) {
        throw new RuntimeException('VK ' . $json['error']['error_code'] . ': ' . $json['error']['error_msg']);
    }
    usleep(350000);
    return $json['response'] ?? [];
}

function vkLargestSrc(array $photo): ?string
{
    if (!empty($photo['sizes']) && is_array($photo['sizes'])) {
        usort($photo['sizes'], static function ($a, $b) {
            return ((int)($b['width'] ?? 0) * (int)($b['height'] ?? 0))
                <=> ((int)($a['width'] ?? 0) * (int)($a['height'] ?? 0));
        });
        return $photo['sizes'][0]['url'] ?? null;
    }
    return $photo['orig_photo']['url'] ?? ($photo['photo_2560'] ?? ($photo['photo_1280'] ?? ($photo['photo_807'] ?? null)));
}

function downloadToTemp(string $url): ?array
{
    $tmp = tempnam(sys_get_temp_dir(), 'vkphoto_');
    $ch = curl_init($url);
    $fp = fopen($tmp, 'wb');
    curl_setopt_array($ch, [
        CURLOPT_FILE => $fp,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_USERAGENT => 'violoncello-import/1.0',
    ]);
    $ok = curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    if (!$ok || filesize($tmp) < 100) {
        @unlink($tmp);
        return null;
    }
    $mime = mime_content_type($tmp) ?: 'image/jpeg';
    $ext = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
        'image/gif' => 'gif',
    ][$mime] ?? 'jpg';
    $named = $tmp . '.' . $ext;
    rename($tmp, $named);
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
        ['IBLOCK_ID' => $iblockId, 'XML_ID' => $xmlId, 'CHECK_PERMISSIONS' => 'N'],
        false,
        ['nTopCount' => 1],
        ['ID']
    );
    if ($row = $res->Fetch()) {
        return (int)$row['ID'];
    }
    return null;
}

echo "owner={$opts['owner']} iblock={$opts['iblock']} property={$opts['property']}\n";

$albums = [];
$offset = 0;
do {
    $chunk = vkCall('photos.getAlbums', [
        'owner_id' => $opts['owner'],
        'need_system' => $opts['skip-system'] ? 0 : 1,
        'need_covers' => 1,
        'offset' => $offset,
        'count' => 100,
    ]);
    $items = $chunk['items'] ?? [];
    $albums = array_merge($albums, $items);
    $offset += count($items);
    $total = (int)($chunk['count'] ?? 0);
} while ($items && $offset < $total);

if ($opts['skip-system']) {
    $albums = array_values(array_filter($albums, static function ($a) {
        return (int)$a['id'] > 0;
    }));
}

if ($opts['limit'] > 0) {
    $albums = array_slice($albums, 0, $opts['limit']);
}

echo 'Альбомов: ' . count($albums) . "\n";

$el = new CIBlockElement();

foreach ($albums as $album) {
    $albumId = (int)$album['id'];
    $title = trim((string)$album['title']);
    $xmlId = 'vk-album-' . $albumId;
    echo "\n[{$albumId}] {$title} ({$album['size']} фото)\n";

    if ($opts['dry-run']) {
        continue;
    }

    $photos = [];
    $pOffset = 0;
    $tmpPaths = [];
    do {
        $resp = vkCall('photos.get', [
            'owner_id' => $opts['owner'],
            'album_id' => $albumId,
            'count' => 1000,
            'offset' => $pOffset,
            'photo_sizes' => 1,
        ]);
        $pItems = $resp['items'] ?? [];
        foreach ($pItems as $photo) {
            $src = vkLargestSrc($photo);
            if (!$src) {
                continue;
            }
            $dl = downloadToTemp($src);
            if (!$dl) {
                echo "  skip photo {$photo['id']}\n";
                continue;
            }
            $photos[] = $dl['file'];
            $tmpPaths[] = $dl['path'];
        }
        $pOffset += count($pItems);
        $pTotal = (int)($resp['count'] ?? 0);
        echo "  скачано " . count($photos) . "/{$pTotal}\n";
    } while ($pItems && $pOffset < $pTotal);

    $fields = [
        'IBLOCK_ID' => $opts['iblock'],
        'XML_ID' => $xmlId,
        'NAME' => $title !== '' ? $title : ('Альбом ' . $albumId),
        'ACTIVE' => 'Y',
        'ACTIVE_FROM' => !empty($album['created'])
            ? ConvertTimeStamp($album['created'], 'FULL')
            : '',
        'PREVIEW_TEXT' => (string)($album['description'] ?? ''),
        'PREVIEW_TEXT_TYPE' => 'text',
        'PROPERTY_VALUES' => [
            $opts['property'] => $photos,
        ],
    ];

    $existing = findElementByXmlId($opts['iblock'], $xmlId);
    if ($existing) {
        unset($fields['IBLOCK_ID']);
        $ok = $el->Update($existing, $fields);
        echo $ok ? "  обновлён #{$existing}\n" : "  ошибка Update: {$el->LAST_ERROR}\n";
    } else {
        $id = $el->Add($fields);
        echo $id ? "  создан #{$id}\n" : "  ошибка Add: {$el->LAST_ERROR}\n";
    }

    foreach ($tmpPaths as $path) {
        @unlink($path);
    }
}

echo "\nГотово.\n";
