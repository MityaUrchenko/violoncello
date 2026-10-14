<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);

$iblockId = (int)$arParams['IBLOCK_ID'];

$loadEnums = static function (int $iblockId, string $code): array {
    if ($iblockId <= 0 || $code === '' || !CModule::IncludeModule('iblock')) {
        return [];
    }
    $items = [];
    $res = CIBlockPropertyEnum::GetList(
        ['SORT' => 'ASC', 'VALUE' => 'ASC'],
        ['IBLOCK_ID' => $iblockId, 'CODE' => $code]
    );
    while ($row = $res->Fetch()) {
        $value = trim((string)$row['VALUE']);
        if ($value === '') {
            continue;
        }
        $items[] = $value;
    }
    return $items;
};

$enumCategories = $loadEnums($iblockId, 'CATEGORY');
$enumByLower = [];
foreach ($enumCategories as $value) {
    $enumByLower[mb_strtolower($value)] = $value;
}
$wanted = ['Педагоги', 'Студенты', 'Выпускники', 'Приглашённые артисты', 'Дирижёры'];
$categories = [];
foreach ($wanted as $label) {
    $categories[] = $enumByLower[mb_strtolower($label)] ?? $label;
}
foreach ($enumCategories as $value) {
    if (!in_array($value, $categories, true)) {
        $categories[] = $value;
    }
}

$countries = $loadEnums($iblockId, 'COUNTRY');
$cities = $loadEnums($iblockId, 'CITY');
$specs = $loadEnums($iblockId, 'SPECIALIZATION');
$projects = $loadEnums($iblockId, 'PROJECT');

$current = [
    'q' => isset($_GET['q']) ? trim((string)$_GET['q']) : '',
    'category' => isset($_GET['category']) ? trim((string)$_GET['category']) : '',
    'country' => isset($_GET['country']) ? trim((string)$_GET['country']) : '',
    'city' => isset($_GET['city']) ? trim((string)$_GET['city']) : '',
    'spec' => isset($_GET['spec']) ? trim((string)$_GET['spec']) : '',
    'project' => isset($_GET['project']) ? trim((string)$_GET['project']) : '',
];

$href = static function (array $override) use ($current): string {
    $query = $current;
    foreach ($override as $key => $value) {
        if ($value === '' || $value === null) {
            unset($query[$key]);
        } else {
            $query[$key] = $value;
        }
    }
    $query = array_filter($query, static function ($value) {
        return $value !== '';
    });
    return '/community/' . ($query ? '?' . http_build_query($query) : '');
};

$activeCategory = mb_strtolower($current['category']);
$hasFilter = $current['q'] !== '' || $current['category'] !== '' || $current['country'] !== '' || $current['city'] !== '' || $current['spec'] !== '' || $current['project'] !== '';

$select = static function (string $name, string $placeholder, array $options, string $selected): void {
    ?>
    <label class="filter-block__dropdown">
        <span class="filter-block__dropdown-label"><?= htmlspecialcharsbx($placeholder) ?></span>
        <select name="<?= htmlspecialcharsbx($name) ?>" class="filter-block__select" onchange="this.form.submit()">
            <option value=""><?= htmlspecialcharsbx($placeholder) ?></option>
            <?php foreach ($options as $option): ?>
            <option value="<?= htmlspecialcharsbx($option) ?>"<?= $selected === $option ? ' selected' : '' ?>><?= htmlspecialcharsbx($option) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <?php
};
?>
<section class="hero-secondary hero-secondary--community">
    <div class="hero-secondary__bg">
        <img src="/assets/images/academy_people.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Сообщество</h1>
        <p class="hero-secondary__subtitle">Педагоги, студенты, выпускники и приглашённые артисты Академии.</p>
    </div>
</section>

<section class="community-page">
    <div class="section__container">
        <form class="filter-block" action="/community/" method="get">
            <?php if ($current['category'] !== ''): ?>
            <input type="hidden" name="category" value="<?= htmlspecialcharsbx($current['category']) ?>">
            <?php endif; ?>

            <div class="filter-block__search">
                <label class="filter-block__search-label" for="community-search">
                    <span class="filter-block__search-icon" aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <input
                        type="search"
                        id="community-search"
                        name="q"
                        class="filter-block__search-input"
                        placeholder="Поиск по имени"
                        autocomplete="off"
                        value="<?= htmlspecialcharsbx($current['q']) ?>"
                    >
                </label>
            </div>

            <div class="filter-block__roles">
                <a href="<?= htmlspecialcharsbx($href(['category' => ''])) ?>" class="btn <?= $activeCategory === '' ? 'btn--primary' : 'btn--outline' ?>">Все роли</a>
                <?php foreach ($categories as $label):
                    $isActive = $activeCategory === mb_strtolower($label);
                ?>
                <a href="<?= htmlspecialcharsbx($href(['category' => $label])) ?>" class="btn <?= $isActive ? 'btn--primary' : 'btn--outline' ?>"><?= htmlspecialcharsbx($label) ?></a>
                <?php endforeach; ?>
            </div>

            <div class="filter-block__row">
                <div class="filter-block__dropdowns">
                    <?php
                    $select('country', 'Страна', $countries, $current['country']);
                    $select('city', 'Город', $cities, $current['city']);
                    $select('spec', 'Специализация', $specs, $current['spec']);
                    $select('project', 'Проект', $projects, $current['project']);
                    ?>
                </div>
                <?php if ($hasFilter): ?>
                <a href="/community/" class="filter-block__reset">Сбросить фильтры</a>
                <?php else: ?>
                <a href="/community/" class="filter-block__reset">Сбросить фильтры</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
    <svg width="100%" height="" viewBox="0 0 1920 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 20.2858C104.542 13.1045 368.701 -0.827229 589.004 0.896286C864.382 3.05068 1124.46 26.75 1407.49 26.75C1633.91 26.75 1843.51 9.51419 1920 0.896286" stroke="#981B2F" stroke-width="1.5"></path>
    </svg>
    <div class="section__container">
        <?php
        $APPLICATION->IncludeComponent(
            'bitrix:news.list',
            'community_page',
            [
                'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                'NEWS_COUNT' => $arParams['NEWS_COUNT'],
                'SORT_BY1' => $arParams['SORT_BY1'],
                'SORT_ORDER1' => $arParams['SORT_ORDER1'],
                'SORT_BY2' => $arParams['SORT_BY2'],
                'SORT_ORDER2' => $arParams['SORT_ORDER2'],
                'FIELD_CODE' => $arParams['LIST_FIELD_CODE'],
                'PROPERTY_CODE' => $arParams['LIST_PROPERTY_CODE'],
                'DETAIL_URL' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['detail'],
                'SECTION_URL' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['section'],
                'IBLOCK_URL' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['news'],
                'SET_TITLE' => 'N',
                'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
                'MESSAGE_404' => $arParams['MESSAGE_404'],
                'SET_STATUS_404' => $arParams['SET_STATUS_404'],
                'SHOW_404' => $arParams['SHOW_404'],
                'FILE_404' => $arParams['FILE_404'],
                'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
                'ADD_SECTIONS_CHAIN' => 'N',
                'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                'CACHE_TIME' => $arParams['CACHE_TIME'],
                'CACHE_FILTER' => 'Y',
                'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                'DISPLAY_TOP_PAGER' => 'N',
                'DISPLAY_BOTTOM_PAGER' => 'Y',
                'PAGER_TITLE' => $arParams['PAGER_TITLE'],
                'PAGER_TEMPLATE' => '.default',
                'PAGER_SHOW_ALWAYS' => $arParams['PAGER_SHOW_ALWAYS'],
                'PAGER_DESC_NUMBERING' => $arParams['PAGER_DESC_NUMBERING'],
                'PAGER_DESC_NUMBERING_CACHE_TIME' => $arParams['PAGER_DESC_NUMBERING_CACHE_TIME'],
                'PAGER_SHOW_ALL' => $arParams['PAGER_SHOW_ALL'],
                'PAGER_BASE_LINK_ENABLE' => $arParams['PAGER_BASE_LINK_ENABLE'],
                'DISPLAY_DATE' => 'N',
                'DISPLAY_NAME' => 'Y',
                'DISPLAY_PICTURE' => 'Y',
                'DISPLAY_PREVIEW_TEXT' => 'N',
                'PREVIEW_TRUNCATE_LEN' => $arParams['PREVIEW_TRUNCATE_LEN'],
                'ACTIVE_DATE_FORMAT' => $arParams['LIST_ACTIVE_DATE_FORMAT'],
                'USE_PERMISSIONS' => $arParams['USE_PERMISSIONS'],
                'FILTER_NAME' => $arParams['FILTER_NAME'],
                'HIDE_LINK_WHEN_NO_DETAIL' => $arParams['HIDE_LINK_WHEN_NO_DETAIL'],
                'CHECK_DATES' => $arParams['CHECK_DATES'],
                'STRICT_SECTION_CHECK' => $arParams['STRICT_SECTION_CHECK'],
                'PARENT_SECTION' => '',
                'PARENT_SECTION_CODE' => '',
                'INCLUDE_SUBSECTIONS' => 'Y',
                'SET_BROWSER_TITLE' => 'N',
                'SET_META_KEYWORDS' => 'N',
                'SET_META_DESCRIPTION' => 'N',
            ],
            $component
        );
        ?>
    </div>
</section>
