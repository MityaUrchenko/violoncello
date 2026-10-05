<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$elementId = (int)($_REQUEST['ID'] ?? $_REQUEST['ELEMENT_ID'] ?? 0);
$elementCode = trim((string)($_REQUEST['CODE'] ?? $_REQUEST['ELEMENT_CODE'] ?? ''));

$APPLICATION->IncludeComponent(
    'bitrix:news.detail',
    'photo_chronicle',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => 6,
        'ELEMENT_ID' => $elementId,
        'ELEMENT_CODE' => $elementCode,
        'CHECK_DATES' => 'Y',
        'FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'DATE_ACTIVE_FROM'],
        'PROPERTY_CODE' => ['PHOTOS'],
        'IBLOCK_URL' => '/mediacenter/photo/',
        'DETAIL_URL' => '/mediacenter/photo/detail.php?ID=#ELEMENT_ID#',
        'SET_TITLE' => 'Y',
        'SET_BROWSER_TITLE' => 'Y',
        'SET_META_KEYWORDS' => 'N',
        'SET_META_DESCRIPTION' => 'N',
        'SET_CANONICAL_URL' => 'N',
        'SET_LAST_MODIFIED' => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'ADD_ELEMENT_CHAIN' => 'N',
        'ACTIVE_DATE_FORMAT' => 'j F Y',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'CACHE_GROUPS' => 'Y',
        'SET_STATUS_404' => 'Y',
        'SHOW_404' => 'Y',
        'MESSAGE_404' => '',
        'STRICT_SECTION_CHECK' => 'N',
        'PHOTO_PROPERTY' => 'PHOTOS',
        'LIST_URL' => '/mediacenter/photo/',
    ],
    false
);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
