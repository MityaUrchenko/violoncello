<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetAdditionalCSS("/assets/css/styles.afisha.css");
$APPLICATION->SetAdditionalCSS("/assets/css/styles.news.css");
$code = isset($_REQUEST["CODE"]) ? preg_replace("/[^a-z0-9\-_]/i", "", $_REQUEST["CODE"]) : "";
$elementId = $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "news",
    [
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => 3,
        "ELEMENT_CODE" => $code,
        "FIELD_CODE" => ["DETAIL_PICTURE", "PREVIEW_PICTURE", "ACTIVE_FROM"],
        "PROPERTY_CODE" => ["DATE_LABEL", "BUTTON_TEXT", "BUTTON_URL", "ALBUM_URL", "IMG_POSITION"],
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "LIST_PAGE_URL" => "/news/",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
    ]
);
// «Другие новости»: 4 последние, кроме текущей
global $arrNewsMore;
$arrNewsMore = ["!CODE" => $code];
?>
<section class="news-more">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title section__title--light">Другие новости</h2>
        </div>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "news-more",
    [
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => 3,
        "NEWS_COUNT" => "4",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "FILTER_NAME" => "arrNewsMore",
        "FIELD_CODE" => ["PREVIEW_PICTURE", "ACTIVE_FROM"],
        "PROPERTY_CODE" => ["DATE_LABEL"],
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "DETAIL_URL" => "/news/#ELEMENT_CODE#/",
        "SET_TITLE" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_FILTER" => "Y",
    ]
);?>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
