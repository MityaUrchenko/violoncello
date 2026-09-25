<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Афиша');
$APPLICATION->SetPageProperty('title', 'Афиша — Всероссийская виолончельная академия');

global $arrFilterAfisha;
$arrFilterAfisha = [];

$type = isset($_GET['type']) ? trim((string)$_GET['type']) : '';
$date = isset($_GET['date']) ? trim((string)$_GET['date']) : '';
$city = isset($_GET['city']) ? trim((string)$_GET['city']) : '';
$project = isset($_GET['project']) ? trim((string)$_GET['project']) : '';
$participants = isset($_GET['participants']) ? trim((string)$_GET['participants']) : '';

if ($type !== '') {
    $arrFilterAfisha[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_TYPE' => $type],
        ['PROPERTY_TYPE_VALUE' => $type],
    ];
}
if (preg_match('/^\d{4}-\d{2}$/', $date)) {
    $fromTs = strtotime($date . '-01 00:00:00');
    $toTs = strtotime('last day of this month 23:59:59', $fromTs);
    $arrFilterAfisha['>=DATE_ACTIVE_FROM'] = ConvertTimeStamp($fromTs, 'FULL');
    $arrFilterAfisha['<=DATE_ACTIVE_FROM'] = ConvertTimeStamp($toTs, 'FULL');
}
if ($city !== '') {
    $arrFilterAfisha[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_CITY' => $city],
        ['PROPERTY_CITY_VALUE' => $city],
    ];
}
if ($project !== '') {
    $arrFilterAfisha[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_PROJECT' => $project],
        ['PROPERTY_PROJECT_VALUE' => $project],
    ];
}
if ($participants !== '') {
    $arrFilterAfisha[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_PARTICIPANTS' => $participants],
        ['PROPERTY_PARTICIPANTS_VALUE' => $participants],
    ];
}
?>

<section class="hero-secondary">
    <div class="hero-secondary__bg">
        <img src="/assets/images/afisha-hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Афиша</h1>
        <p class="hero-secondary__subtitle">Концерты, мастер-классы, лекции, конкурсы и специальные мероприятия Академии</p>
    </div>
</section>

<?php
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'afisha',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => 1,
        'NEWS_COUNT' => 9,
        'SORT_BY1' => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'ASC',
        'SORT_BY2' => 'SORT',
        'SORT_ORDER2' => 'ASC',
        'FILTER_NAME' => 'arrFilterAfisha',
        'FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL', 'DATE_ACTIVE_FROM'],
        'PROPERTY_CODE' => ['PLACE', 'TICKETS_URL', 'TYPE', 'CITY', 'PROJECT', 'PARTICIPANTS'],
        'CHECK_DATES' => 'Y',
        'DETAIL_URL' => '',
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
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'Y',
        'PAGER_TITLE' => 'События',
        'PAGER_SHOW_ALWAYS' => 'N',
        'PAGER_TEMPLATE' => '.default',
        'PAGER_DESC_NUMBERING' => 'N',
        'PAGER_DESC_NUMBERING_CACHE_TIME' => 36000,
        'PAGER_SHOW_ALL' => 'N',
        'TYPE_PROPERTY' => 'TYPE',
        'CITY_PROPERTY' => 'CITY',
        'PROJECT_PROPERTY' => 'PROJECT',
        'PARTICIPANTS_PROPERTY' => 'PARTICIPANTS',
    ],
    false
);
?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
