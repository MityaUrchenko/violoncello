<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Фотохроника');
$APPLICATION->SetPageProperty('title', 'Фотохроника — Всероссийская виолончельная академия');
?>
<!-- Hero -->
<section class="hero-secondary">
    <div class="hero-secondary__bg">
        <img src="/assets/images/academy-hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb">Академия</p>
        <h1 class="hero-secondary__title">Фотоархив</h1>
        <p class="hero-secondary__subtitle">Фотографии нашего сообщества</p>
    </div>
</section>

<?php
$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"photo_chronicle", 
	[
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "6",
		"NEWS_COUNT" => "6",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => [
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DATE_ACTIVE_FROM",
			4 => "DETAIL_PAGE_URL",
			5 => "",
		],
		"PROPERTY_CODE" => [
			0 => "",
			1 => "PHOTOS",
			2 => "",
		],
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/photo_chronicle/detail.php?ID=#ELEMENT_ID#",
		"AJAX_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Альбомы",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"SECTION_TITLE" => "Фотохроника",
		"SECTION_LINK" => "",
		"SECTION_LINK_TEXT" => "Смотреть все альбомы",
		"PHOTO_PROPERTY" => "PHOTOS",
		"PHOTOS_PREVIEW_COUNT" => "4",
		"COMPONENT_TEMPLATE" => "photo_chronicle",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	],
	false
);
?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
