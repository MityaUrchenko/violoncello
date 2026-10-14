<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Сообщество');
$APPLICATION->SetPageProperty('title', 'Сообщество — Всероссийская виолончельная академия');

global $arrFilterCommunity;
$arrFilterCommunity = [];

$q = isset($_GET['q']) ? trim((string)$_GET['q']) : '';
$category = isset($_GET['category']) ? trim((string)$_GET['category']) : '';
$country = isset($_GET['country']) ? trim((string)$_GET['country']) : '';
$city = isset($_GET['city']) ? trim((string)$_GET['city']) : '';
$spec = isset($_GET['spec']) ? trim((string)$_GET['spec']) : '';
$project = isset($_GET['project']) ? trim((string)$_GET['project']) : '';

if ($q !== '') {
    $arrFilterCommunity['%NAME'] = $q;
}

$propFilter = [
    'CATEGORY' => $category,
    'COUNTRY' => $country,
    'CITY' => $city,
    'SPECIALIZATION' => $spec,
    'PROJECT' => $project,
];
foreach ($propFilter as $code => $value) {
    if ($value === '') {
        continue;
    }
    $arrFilterCommunity[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_' . $code => $value],
        ['PROPERTY_' . $code . '_VALUE' => $value],
    ];
}
?>
<link rel="stylesheet" href="/local/templates/main/css/community-page.css">

<?php
$APPLICATION->IncludeComponent(
    'bitrix:news',
    'community',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => '4',
        'NEWS_COUNT' => '8',
        'USE_SEARCH' => 'N',
        'USE_RSS' => 'N',
        'USE_RATING' => 'N',
        'USE_CATEGORIES' => 'N',
        'USE_REVIEW' => 'N',
        'USE_FILTER' => 'N',
        'SORT_BY1' => 'SORT',
        'SORT_ORDER1' => 'ASC',
        'SORT_BY2' => 'NAME',
        'SORT_ORDER2' => 'ASC',
        'CHECK_DATES' => 'Y',
        'SEF_MODE' => 'Y',
        'SEF_FOLDER' => '/community/',
        'SEF_URL_TEMPLATES' => [
            'news' => '',
            'section' => '',
            'detail' => '#ELEMENT_CODE#/',
        ],
        'AJAX_MODE' => 'N',
        'AJAX_OPTION_JUMP' => 'N',
        'AJAX_OPTION_STYLE' => 'Y',
        'AJAX_OPTION_HISTORY' => 'N',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => '3600',
        'CACHE_FILTER' => 'Y',
        'CACHE_GROUPS' => 'Y',
        'FILTER_NAME' => 'arrFilterCommunity',
        'SET_LAST_MODIFIED' => 'N',
        'SET_TITLE' => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'ADD_ELEMENT_CHAIN' => 'N',
        'USE_PERMISSIONS' => 'N',
        'STRICT_SECTION_CHECK' => 'N',
        'PREVIEW_TRUNCATE_LEN' => '',
        'LIST_ACTIVE_DATE_FORMAT' => 'j F Y',
        'LIST_FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'DETAIL_PAGE_URL'],
        'LIST_PROPERTY_CODE' => ['CATEGORY', 'COUNTRY', 'CITY', 'SPECIALIZATION', 'PROJECT'],
        'HIDE_LINK_WHEN_NO_DETAIL' => 'N',
        'DISPLAY_NAME' => 'Y',
        'META_KEYWORDS' => '-',
        'META_DESCRIPTION' => '-',
        'BROWSER_TITLE' => '-',
        'DETAIL_SET_CANONICAL_URL' => 'N',
        'DETAIL_ACTIVE_DATE_FORMAT' => 'j F Y',
        'DETAIL_FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE'],
        'DETAIL_PROPERTY_CODE' => ['CATEGORY', 'COUNTRY', 'CITY', 'SPECIALIZATION', 'PROJECT'],
        'DETAIL_DISPLAY_TOP_PAGER' => 'N',
        'DETAIL_DISPLAY_BOTTOM_PAGER' => 'N',
        'DETAIL_PAGER_TITLE' => 'Страница',
        'DETAIL_PAGER_TEMPLATE' => '',
        'DETAIL_PAGER_SHOW_ALL' => 'N',
        'PAGER_TEMPLATE' => '.default',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'Y',
        'PAGER_TITLE' => 'Сообщество',
        'PAGER_SHOW_ALWAYS' => 'N',
        'PAGER_DESC_NUMBERING' => 'N',
        'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000',
        'PAGER_SHOW_ALL' => 'N',
        'PAGER_BASE_LINK_ENABLE' => 'N',
        'SET_STATUS_404' => 'Y',
        'SHOW_404' => 'Y',
        'MESSAGE_404' => '',
    ],
    false
);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
