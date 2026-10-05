<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Фотоархив');
$APPLICATION->SetPageProperty('title', 'Фотоархив — Всероссийская виолончельная академия');

global $arrFilterPhoto;
$arrFilterPhoto = [];

$year = isset($_GET['year']) ? trim((string)$_GET['year']) : '';
$project = isset($_GET['project']) ? trim((string)$_GET['project']) : '';
$event = isset($_GET['event']) ? trim((string)$_GET['event']) : '';

if (preg_match('/^\d{4}$/', $year)) {
    $fromTs = strtotime($year . '-01-01 00:00:00');
    $toTs = strtotime($year . '-12-31 23:59:59');
    $arrFilterPhoto['>=DATE_ACTIVE_FROM'] = ConvertTimeStamp($fromTs, 'FULL');
    $arrFilterPhoto['<=DATE_ACTIVE_FROM'] = ConvertTimeStamp($toTs, 'FULL');
}
if ($project !== '') {
    $arrFilterPhoto[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_PROJECT' => $project],
        ['PROPERTY_PROJECT_VALUE' => $project],
    ];
}
if ($event !== '') {
    $arrFilterPhoto[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_EVENT' => $event],
        ['PROPERTY_EVENT_VALUE' => $event],
    ];
}
?>
<section class="hero-secondary hero-secondary--photo">
    <div class="hero-secondary__bg">
        <img src="/assets/images/photo-archive-hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb">Медиацентр</p>
        <h1 class="hero-secondary__title">Фотоархив</h1>
        <p class="hero-secondary__subtitle">Фотографии концертов, мастер-классов и сезонов Академии, собранные по альбомам</p>
    </div>
</section>

<?php
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'photo_chronicle',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => '6',
        'NEWS_COUNT' => '9',
        'SORT_BY1' => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'DESC',
        'SORT_BY2' => 'SORT',
        'SORT_ORDER2' => 'ASC',
        'FILTER_NAME' => 'arrFilterPhoto',
        'FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DATE_ACTIVE_FROM', 'DETAIL_PAGE_URL'],
        'PROPERTY_CODE' => ['PHOTOS', 'PROJECT', 'EVENT'],
        'CHECK_DATES' => 'Y',
        'DETAIL_URL' => '/mediacenter/photo/detail.php?ID=#ELEMENT_ID#',
        'AJAX_MODE' => 'N',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'CACHE_FILTER' => 'Y',
        'CACHE_GROUPS' => 'Y',
        'PREVIEW_TRUNCATE_LEN' => '',
        'ACTIVE_DATE_FORMAT' => 'j F Y',
        'SET_TITLE' => 'N',
        'SET_BROWSER_TITLE' => 'N',
        'SET_META_KEYWORDS' => 'N',
        'SET_META_DESCRIPTION' => 'N',
        'SET_LAST_MODIFIED' => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'HIDE_LINK_WHEN_NO_DETAIL' => 'N',
        'PARENT_SECTION' => '',
        'PARENT_SECTION_CODE' => '',
        'INCLUDE_SUBSECTIONS' => 'Y',
        'STRICT_SECTION_CHECK' => 'N',
        'PAGER_TEMPLATE' => '.default',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'Y',
        'PAGER_TITLE' => 'Альбомы',
        'PAGER_SHOW_ALWAYS' => 'N',
        'PAGER_DESC_NUMBERING' => 'N',
        'PAGER_DESC_NUMBERING_CACHE_TIME' => 36000,
        'PAGER_SHOW_ALL' => 'N',
        'PHOTO_PROPERTY' => 'PHOTOS',
        'PROJECT_PROPERTY' => 'PROJECT',
        'EVENT_PROPERTY' => 'EVENT',
        'SET_STATUS_404' => 'N',
        'SHOW_404' => 'N',
        'MESSAGE_404' => '',
    ],
    false
);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
