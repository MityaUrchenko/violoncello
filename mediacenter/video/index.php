<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Видеоархив');
$APPLICATION->SetPageProperty('title', 'Видеоархив — Всероссийская виолончельная академия');

CModule::IncludeModule('iblock');

const VIDEO_IBLOCK_ID = 7;

$videoTypes = [
    '' => 'Все видео',
    'concert' => 'Концерты',
    'masterclass' => 'Мастер-классы',
    'interview' => 'Интервью',
    'lecture' => 'Лекции',
    'archive' => 'Архив',
];

$type = isset($_GET['type']) ? preg_replace('/[^a-z]/', '', (string)$_GET['type']) : '';
if (!isset($videoTypes[$type])) {
    $type = '';
}
$year = isset($_GET['year']) ? trim((string)$_GET['year']) : '';
$project = isset($_GET['project']) ? trim((string)$_GET['project']) : '';
$event = isset($_GET['event']) ? trim((string)$_GET['event']) : '';
$section = isset($_GET['section']) ? preg_replace('/[^a-z0-9_-]/i', '', (string)$_GET['section']) : '';

global $arrFilterVideo;
$arrFilterVideo = [];

if (preg_match('/^\d{4}$/', $year)) {
    $arrFilterVideo['>=DATE_ACTIVE_FROM'] = ConvertTimeStamp(strtotime($year . '-01-01 00:00:00'), 'FULL');
    $arrFilterVideo['<=DATE_ACTIVE_FROM'] = ConvertTimeStamp(strtotime($year . '-12-31 23:59:59'), 'FULL');
}
if ($project !== '') {
    $arrFilterVideo[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_PROJECT' => $project],
        ['PROPERTY_PROJECT_VALUE' => $project],
    ];
}
if ($event !== '') {
    $arrFilterVideo[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_EVENT' => $event],
        ['PROPERTY_EVENT_VALUE' => $event],
    ];
}
if ($type !== '') {
    $enum = CIBlockPropertyEnum::GetList([], [
        'IBLOCK_ID' => VIDEO_IBLOCK_ID,
        'CODE' => 'CATEGORY',
        'XML_ID' => $type,
    ])->Fetch();
    $arrFilterVideo['PROPERTY_CATEGORY'] = $enum ? $enum['ID'] : -1;
}

$collectFilterOptions = static function (int $iblockId, string $code): array {
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
        $key = ($xml !== '' && $xml !== null) ? (string)$xml : (($enum !== '' && $enum !== null) ? (string)$enum : $val);
        $values[$key] = $val;
    }
    asort($values, SORT_NATURAL | SORT_FLAG_CASE);
    return $values;
};

$filterYears = [];
$res = CIBlockElement::GetList(
    ['ACTIVE_FROM' => 'DESC'],
    ['IBLOCK_ID' => VIDEO_IBLOCK_ID, 'ACTIVE' => 'Y', '!DATE_ACTIVE_FROM' => false],
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
    'project' => $collectFilterOptions(VIDEO_IBLOCK_ID, 'PROJECT'),
    'event' => $collectFilterOptions(VIDEO_IBLOCK_ID, 'EVENT'),
];

$videoUrl = static function (array $overrides = []) use ($type, $year, $project, $event, $section): string {
    $query = [
        'type' => $type,
        'year' => $year,
        'project' => $project,
        'event' => $event,
        'section' => $section,
    ];
    foreach ($overrides as $key => $value) {
        $query[$key] = $value;
    }
    $query = array_filter($query, static function ($value) {
        return $value !== '' && $value !== null;
    });
    return '/mediacenter/video/' . ($query ? '?' . http_build_query($query) : '');
};

$playlists = [];
$sections = CIBlockSection::GetList(
    ['SORT' => 'ASC', 'NAME' => 'ASC'],
    ['IBLOCK_ID' => VIDEO_IBLOCK_ID, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y'],
    true,
    ['ID', 'NAME', 'CODE', 'PICTURE', 'ELEMENT_CNT']
);
while ($row = $sections->GetNext()) {
    $playlists[] = $row;
}
?>
<section class="hero-secondary hero-secondary--photo">
    <div class="hero-secondary__bg">
        <img src="/assets/images/video-archive-hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/news/">Медиацентр</a></p>
        <h1 class="hero-secondary__title">Видеоархив</h1>
        <p class="hero-secondary__subtitle">Концерты, мастер-классы, интервью, лекции и архивные записи Академии</p>
    </div>
</section>

<section class="filter-block">
    <div class="section__container">
        <div class="video-filters__tabs">
            <?php foreach ($videoTypes as $code => $label):
                $isActive = $type === $code;
                if ($code === '') {
                    $href = '/mediacenter/video/';
                } else {
                    $href = $videoUrl(['type' => $code]);
                }
                $btnClass = $isActive ? 'btn btn--primary' : 'btn btn--outline';
                if ($isActive):
            ?>
            <span class="<?= $btnClass ?>" aria-current="page"><?= htmlspecialcharsbx($label) ?></span>
            <?php else: ?>
            <a href="<?= htmlspecialcharsbx($href) ?>" class="<?= $btnClass ?>"><?= htmlspecialcharsbx($label) ?></a>
            <?php endif; endforeach; ?>
        </div>
        <form class="filter-block__row" method="get" action="/mediacenter/video/">
            <?php if ($type !== ''): ?><input type="hidden" name="type" value="<?= htmlspecialcharsbx($type) ?>"><?php endif; ?>
            <?php if ($section !== ''): ?><input type="hidden" name="section" value="<?= htmlspecialcharsbx($section) ?>"><?php endif; ?>
            <div class="filter-block__left">
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
            <a href="/mediacenter/video/" class="filter-block__reset">Сбросить фильтры</a>
        </form>
    </div>
    <svg class="filter-block__line" viewBox="0 0 1920 28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M0 20.2858C104.542 13.1045 368.701 -0.827229 589.004 0.896286C864.382 3.05068 1124.46 26.75 1407.49 26.75C1633.91 26.75 1843.51 9.51419 1920 0.896286" stroke="#981B2F" stroke-width="1.5"/>
    </svg>
</section>

<?php
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'video_archive',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => VIDEO_IBLOCK_ID,
        'NEWS_COUNT' => '6',
        'SORT_BY1' => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'DESC',
        'SORT_BY2' => 'SORT',
        'SORT_ORDER2' => 'ASC',
        'FILTER_NAME' => 'arrFilterVideo',
        'FIELD_CODE' => ['NAME', 'PREVIEW_PICTURE', 'DATE_ACTIVE_FROM'],
        'PROPERTY_CODE' => ['LINK_TO_VIDEO', 'CATEGORY', 'PROJECT', 'EVENT'],
        'CHECK_DATES' => 'Y',
        'DETAIL_URL' => '',
        'AJAX_MODE' => 'N',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'CACHE_FILTER' => 'Y',
        'CACHE_GROUPS' => 'Y',
        'ACTIVE_DATE_FORMAT' => 'j F Y',
        'SET_TITLE' => 'N',
        'SET_BROWSER_TITLE' => 'N',
        'SET_META_KEYWORDS' => 'N',
        'SET_META_DESCRIPTION' => 'N',
        'SET_LAST_MODIFIED' => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'HIDE_LINK_WHEN_NO_DETAIL' => 'Y',
        'PARENT_SECTION' => '',
        'PARENT_SECTION_CODE' => $section,
        'INCLUDE_SUBSECTIONS' => 'Y',
        'STRICT_SECTION_CHECK' => 'N',
        'PAGER_TEMPLATE' => '.default',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'Y',
        'PAGER_TITLE' => 'Видео',
        'PAGER_SHOW_ALWAYS' => 'N',
        'PAGER_DESC_NUMBERING' => 'N',
        'PAGER_DESC_NUMBERING_CACHE_TIME' => 36000,
        'PAGER_SHOW_ALL' => 'N',
    ]
);

if ($playlists):
?>
<section class="video-playlists">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title">Плейлисты</h2>
            <a href="/mediacenter/video/" class="section__link">Смотреть все</a>
        </div>
        <div class="video-playlists__grid">
            <?php foreach ($playlists as $playlist):
                $picture = '';
                if (!empty($playlist['PICTURE'])) {
                    $file = CFile::GetFileArray($playlist['PICTURE']);
                    $picture = $file['SRC'] ?? '';
                }
                $count = (int)($playlist['ELEMENT_CNT'] ?? 0);
            ?>
            <a class="video-playlist" href="<?= htmlspecialcharsbx($videoUrl(['section' => $playlist['CODE'], 'type' => ''])) ?>">
                <div class="video-playlist__image">
                    <?php if ($picture): ?>
                    <img src="<?= htmlspecialcharsbx($picture) ?>" alt="" loading="lazy" decoding="async">
                    <?php endif; ?>
                    <?php if ($count): ?>
                    <span class="video-playlist__count"><?= $count ?> видео</span>
                    <?php endif; ?>
                </div>
                <h3 class="video-playlist__title"><?= htmlspecialcharsbx($playlist['NAME']) ?></h3>
                <?php if ($count): ?>
                <p class="video-playlist__note"><?= $count ?> видео</p>
                <?php endif; ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
