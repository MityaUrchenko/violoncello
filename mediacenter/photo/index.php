<?php
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


$iblockId = 6;

$collectFilterOptions = static function (int $iblockId, string $code): array {
    if ($iblockId <= 0 || $code === '') {
        return [];
    }

    $values = [];
    $res = CIBlockElement::GetList(
        [],
        ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
        false,
        false,
        ['ID', 'PROPERTY_' . $code]
    );

    while ($row = $res->Fetch()) {
        $val = $row['PROPERTY_' . $code . '_VALUE'] ?? '';
        $enum = $row['PROPERTY_' . $code . '_ENUM_ID'] ?? '';
        $xml = $row['PROPERTY_' . $code . '_XML_ID'] ?? '';

        if (is_array($val)) {
            $val = reset($val);
        }

        $val = trim((string)$val);
        if ($val === '') {
            continue;
        }

        $key = $xml !== '' && $xml !== null
            ? (string)$xml
            : ((string)$enum !== '' ? (string)$enum : $val);

        $values[$key] = $val;
    }

    asort($values, SORT_NATURAL | SORT_FLAG_CASE);
    return $values;
};

$filterYears = [];
$res = CIBlockElement::GetList(
    ['ACTIVE_FROM' => 'DESC'],
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', '!DATE_ACTIVE_FROM' => false],
    false,
    false,
    ['ID', 'ACTIVE_FROM', 'DATE_ACTIVE_FROM']
);
while ($row = $res->Fetch()) {
    $raw = $row['ACTIVE_FROM'] ?: ($row['DATE_ACTIVE_FROM'] ?? '');
    $timestamp = $raw ? MakeTimeStamp($raw) : 0;
    if (!$timestamp) {
        continue;
    }

    $filterYear = date('Y', $timestamp);
    $filterYears[$filterYear] = $filterYear;
}
krsort($filterYears, SORT_NUMERIC);

$filterOptions = [
    'year' => $filterYears,
    'project' => $collectFilterOptions($iblockId, 'PROJECT'),
    'event' => $collectFilterOptions($iblockId, 'EVENT'),
];

?>
<section class="hero-secondary hero-secondary--photo">
    <div class="hero-secondary__bg">
        <img src="/assets/images/photo-archive-hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/news/">Медиацентр</a></p>
        <h1 class="hero-secondary__title">Фотоархив</h1>
        <p class="hero-secondary__subtitle">Фотографии концертов, мастер-классов и сезонов Академии, собранные по альбомам</p>
    </div>
</section>


<section class="filter-block">
    <div class="section__container">
        <form class="filter-block__row" method="get" action="/mediacenter/photo/">
            <div class="filter-block__left">
                <a href="/mediacenter/photo/" class="btn btn--primary">Все альбомы</a>
                <label class="filter-block__dropdown">
                    Год
                    <select name="year" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($filterOptions['year'] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= $year === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="filter-block__dropdown">
                    Проект
                    <select name="project" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($filterOptions['project'] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= $project === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="filter-block__dropdown">
                    Мероприятие
                    <select name="event" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($filterOptions['event'] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= $event === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <a href="/mediacenter/photo/" class="filter-block__reset">Сбросить фильтры</a>
        </form>
    </div>
    <svg class="filter-block__line" viewBox="0 0 1920 28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M0 20.2858C104.542 13.1045 368.701 -0.827229 589.004 0.896286C864.382 3.05068 1124.46 26.75 1407.49 26.75C1633.91 26.75 1843.51 9.51419 1920 0.896286" stroke="#981B2F" stroke-width="1.5"/>
    </svg>
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
