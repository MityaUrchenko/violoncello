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
 *   --iblock=6
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
    'iblock' => getenv('IBLOCK_ID') ?: 6,
    'owner' => getenv('VK_OWNER_ID') ?: -92726381,
    'property' => getenv('PHOTO_PROPERTY') ?: 'PHOTOS',
    'limit' => 0,
    'token' => getenv('VK_ACCESS_TOKEN') ?: '',
    'skip-system' => false,
    'dry-run' => false,
];
