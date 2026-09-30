<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Сообщество');
$APPLICATION->SetPageProperty('title', 'Сообщество — Всероссийская виолончельная академия');

global $arrFilterCommunity;
$arrFilterCommunity = [];

$role = isset($_REQUEST['role']) ? trim((string)$_REQUEST['role']) : '';
$position = isset($_REQUEST['position']) ? trim((string)$_REQUEST['position']) : '';

$roleLabels = [
    'members' => 'Участники',
    'alumni' => 'Выпускники',
    'trustees' => 'Попечители',
];

if ($role !== '') {
    $roleValue = $roleLabels[$role] ?? $role;
    $roleAliases = array_unique(array_filter([
        $role,
        $roleValue,
        rtrim($roleValue, 'и'),
        $role === 'members' ? 'Участник' : '',
        $role === 'alumni' ? 'Выпускник' : '',
        $role === 'trustees' ? 'Попечитель' : '',
    ]));
    $roleFilter = ['LOGIC' => 'OR', ['SECTION_CODE' => $role]];
    foreach ($roleAliases as $alias) {
        $roleFilter[] = ['PROPERTY_ROLE' => $alias];
        $roleFilter[] = ['PROPERTY_ROLE_VALUE' => $alias];
    }
    $arrFilterCommunity[] = $roleFilter;
}

if ($position !== '') {
    $arrFilterCommunity[] = [
        'LOGIC' => 'OR',
        ['PROPERTY_POSITION' => $position],
        ['PROPERTY_POSITION_VALUE' => $position],
    ];
}

if (isset($roleLabels[$role])) {
    $APPLICATION->SetTitle($roleLabels[$role]);
}
?>
<section class="hero-secondary">
    <div class="hero-secondary__bg">
        <img src="/assets/images/academy_people.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Сообщество</h1>
        <p class="hero-secondary__subtitle">Участники, выпускники и попечители Академии</p>
    </div>
</section>

<?php
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'community_page',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => 4,
        'NEWS_COUNT' => 12,
        'SORT_BY1' => 'SORT',
        'SORT_ORDER1' => 'ASC',
        'SORT_BY2' => 'NAME',
        'SORT_ORDER2' => 'ASC',
        'FILTER_NAME' => 'arrFilterCommunity',
        'FIELD_CODE' => ['NAME', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'DETAIL_PAGE_URL'],
        'PROPERTY_CODE' => ['ROLE', 'POSITION'],
        'CHECK_DATES' => 'Y',
        'DETAIL_URL' => '',
        'AJAX_MODE' => 'N',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'CACHE_FILTER' => 'Y',
        'CACHE_GROUPS' => 'Y',
        'SET_TITLE' => 'N',
        'SET_BROWSER_TITLE' => 'N',
        'SET_META_KEYWORDS' => 'N',
        'SET_META_DESCRIPTION' => 'N',
        'SET_LAST_MODIFIED' => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'HIDE_LINK_WHEN_NO_DETAIL' => 'N',
        'PARENT_SECTION' => '',
        'PARENT_SECTION_CODE' => $role !== '' && !isset($roleLabels[$role]) ? $role : '',
        'INCLUDE_SUBSECTIONS' => 'Y',
        'STRICT_SECTION_CHECK' => 'N',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'Y',
        'PAGER_TITLE' => 'Сообщество',
        'PAGER_SHOW_ALWAYS' => 'N',
        'PAGER_TEMPLATE' => '.default',
        'PAGER_DESC_NUMBERING' => 'N',
        'PAGER_DESC_NUMBERING_CACHE_TIME' => 36000,
        'PAGER_SHOW_ALL' => 'N',
        'SECTION_TITLE' => 'Сообщество академии',
        'ROLE_PROPERTY' => 'ROLE',
        'POSITION_PROPERTY' => 'POSITION',
    ],
    false
);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
