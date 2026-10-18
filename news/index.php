<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
$APPLICATION->SetAdditionalCSS("/assets/css/styles.afisha.css");
?>
<section class="hero-secondary hero-secondary--news">
    <div class="hero-secondary__bg">
        <img src="/assets/images/regions/kazan-2.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Новости</h1>
    </div>
</section>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "news",
    [
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => 3,
        "NEWS_COUNT" => "12",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "FIELD_CODE" => ["PREVIEW_PICTURE", "ACTIVE_FROM"],
        "PROPERTY_CODE" => ["DATE_LABEL"],
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "DETAIL_URL" => "/news/#ELEMENT_CODE#/",
        "SET_TITLE" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TEMPLATE" => "academy",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
    ]
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
