<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Всероссийская виолончельная академия');
$APPLICATION->SetPageProperty('title', 'Всероссийская виолончельная академия');
?>

<!-- Hero (можно вынести в включаемую область / include) -->
<section class="hero">
    <div class="hero__bg">
        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/hero2.jpg" alt="" class="hero__bg-img" aria-hidden="true">
    </div>
    <div class="hero__content">
        <h1 class="hero__title">Развиваем<br>виолончельное<br>искусство</h1>
        <p class="hero__text">Создаем возможности для роста молодых музыкантов. <br>
            Поддерживаем профессиональное сообщество и развиваем культуру
            виолончельного искусства в России.</p>
        <div class="hero__buttons">
            <a href="<?= SITE_DIR ?>events/" class="btn btn--primary">Ближайшие события</a>
            <a href="<?= SITE_DIR ?>academy/" class="btn btn--outline">Об Академии</a>
        </div>
    </div>
</section>

<?php
// События — инфоблок (укажите свой IBLOCK_ID)
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'events',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => 1,
        'NEWS_COUNT' => 3,
        'SORT_BY1' => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'ASC',
        'SORT_BY2' => 'SORT',
        'SORT_ORDER2' => 'ASC',
        'FILTER_NAME' => '',
        'FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL', 'DATE_ACTIVE_FROM'],
        'PROPERTY_CODE' => ['PLACE', 'TICKETS_URL'],
        'CHECK_DATES' => 'Y',
        'DETAIL_URL' => '',
        'AJAX_MODE' => 'N',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'CACHE_FILTER' => 'N',
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
        'PAGER_TEMPLATE' => '',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'N',
        'SECTION_TITLE' => 'Ближайшие события',
        'SECTION_LINK' => SITE_DIR . 'events/',
        'SECTION_LINK_TEXT' => 'Смотреть все события',
    ],
    false
);

// Проекты
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'projects',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => 2,
        'NEWS_COUNT' => 3,
        'SORT_BY1' => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'DESC',
        'SORT_BY2' => 'SORT',
        'SORT_ORDER2' => 'ASC',
        'FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'DETAIL_PAGE_URL'],
        'PROPERTY_CODE' => [],
        'CHECK_DATES' => 'Y',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'SET_TITLE' => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'N',
        'SECTION_TITLE' => 'Проекты',
        'SECTION_LINK' => SITE_DIR . 'projects/',
        'SECTION_LINK_TEXT' => 'Смотреть все проекты',
    ],
    false
);

// Новости
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'news',
    [
        'IBLOCK_TYPE' => 'news',
        'IBLOCK_ID' => 3,
        'NEWS_COUNT' => 4,
        'SORT_BY1' => 'ACTIVE_FROM',
        'SORT_ORDER1' => 'DESC',
        'SORT_BY2' => 'SORT',
        'SORT_ORDER2' => 'ASC',
        'FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL', 'DATE_ACTIVE_FROM'],
        'PROPERTY_CODE' => [],
        'CHECK_DATES' => 'Y',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'SET_TITLE' => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'ACTIVE_DATE_FORMAT' => 'j F Y',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'N',
        'SECTION_TITLE' => 'Новости и медиа',
        'SECTION_LINK' => SITE_DIR . 'news/',
        'SECTION_LINK_TEXT' => 'Все новости',
    ],
    false
);

// Сообщество
$APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'community',
    [
        'IBLOCK_TYPE' => 'content',
        'IBLOCK_ID' => 4,
        'NEWS_COUNT' => 4,
        'SORT_BY1' => 'SORT',
        'SORT_ORDER1' => 'ASC',
        'FIELD_CODE' => ['NAME', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL'],
        'PROPERTY_CODE' => ['ROLE', 'POSITION'],
        'CHECK_DATES' => 'Y',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => 3600,
        'SET_TITLE' => 'N',
        'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'N',
        'SECTION_TITLE' => 'Сообщество академии',
        'SECTION_LINK' => SITE_DIR . 'community/',
        'SECTION_LINK_TEXT' => 'Все участники',
    ],
    false
);
?>

<!-- Подписка (можно вынести во включаемую область) -->
<section class="subscribe" id="support">
    <div class="section__container">
        <div class="subscribe__inner">
            <h2 class="subscribe__title">Подписаться на новости</h2>
            <div class="subscribe__line">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/hero_line_mini.svg" alt="">
            </div>
            <form class="subscribe__form" action="<?= SITE_DIR ?>ajax/subscribe.php" method="post">
                <input type="email" name="email" class="subscribe__input" placeholder="Ваш e-mail" required>
                <button type="submit" class="btn btn--primary">Подписаться</button>
            </form>
        </div>
    </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
