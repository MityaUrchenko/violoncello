<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Афиша");
$APPLICATION->SetAdditionalCSS("/assets/css/styles.afisha.css");
$APPLICATION->AddHeadScript("/assets/js/afisha.js");

const AFISHA_IBLOCK_ID = 1;

// Серверный фильтр по GET: ?type=concert|masterclass|special, ?past=1
$type = isset($_GET["type"]) ? preg_replace("/[^a-z]/", "", $_GET["type"]) : "";
$past = isset($_GET["past"]) && (string)$_GET["past"] === "1";

global $arrAfishaFilter;
$arrAfishaFilter = [];

if ($past) {
    // Прошедшие: DATE_EVENT строго меньше текущей даты
    $arrAfishaFilter["<PROPERTY_DATE_EVENT"] = date("Y-m-d 00:00:00");
}

if ($type !== "" && CModule::IncludeModule("iblock")) {
    $enum = CIBlockPropertyEnum::GetList([], ["IBLOCK_ID" => AFISHA_IBLOCK_ID, "CODE" => "TYPE", "XML_ID" => $type])->Fetch();
    $arrAfishaFilter["PROPERTY_TYPE"] = $enum ? $enum["ID"] : -1;
}

$afishaQuery = static function (array $params): string {
    $query = array_filter($params, static function ($value) {
        return $value !== "" && $value !== null && $value !== false;
    });
    return $query ? "?" . http_build_query($query) : "?";
};
?>
<section class="hero-secondary hero-secondary--afisha">
    <div class="hero-secondary__bg">
        <img src="/assets/images/news/otkrytie-sezona.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Афиша</h1>
    </div>
</section>
<section class="afisha-filters">
    <div class="section__container">
        <div class="afisha-filters__types">
            <a href="<?=$afishaQuery(["type" => "", "past" => $past ? "1" : ""])?>" class="afisha-filters__tab<?=($type===''?' afisha-filters__tab--active':'')?>" data-type="">Все события</a>
            <a href="<?=$afishaQuery(["type" => "concert", "past" => $past ? "1" : ""])?>" class="afisha-filters__tab<?=($type==='concert'?' afisha-filters__tab--active':'')?>" data-type="concert">Концерты</a>
            <a href="<?=$afishaQuery(["type" => "masterclass", "past" => $past ? "1" : ""])?>" class="afisha-filters__tab<?=($type==='masterclass'?' afisha-filters__tab--active':'')?>" data-type="masterclass">Мастер-классы</a>
            <a href="<?=$afishaQuery(["type" => "special", "past" => $past ? "1" : ""])?>" class="afisha-filters__tab<?=($type==='special'?' afisha-filters__tab--active':'')?>" data-type="special">Специальные мероприятия</a>
            <a href="<?=$afishaQuery(["type" => $type, "past" => $past ? "" : "1"])?>" class="afisha-filters__tab<?=($past?' afisha-filters__tab--active':'')?>" data-past="1">Прошедшие мероприятия</a>
        </div>
        <div class="afisha-filters__row">
            <div class="afisha-filters__dropdowns">
                <label class="afisha-filters__dropdown">Месяц
                    <select name="month">
                        <option value="">Все месяцы</option>
                        <option value="2026-10">Октябрь 2026</option>
                        <option value="2026-11">Ноябрь 2026</option>
                        <option value="2026-12">Декабрь 2026</option>
                    </select>
                </label>
                <label class="afisha-filters__dropdown">Город
                    <select name="city">
                        <option value="">Все города</option>
                        <option value="msk">Москва</option>
                        <option value="spb">Санкт-Петербург</option>
                        <option value="klin">Клин</option>
                        <option value="kaliningrad">Калининград</option>
                    </select>
                </label>
                <label class="afisha-filters__dropdown">Проект
                    <select name="project">
                        <option value="">Все проекты</option>
                        <option value="stars">Звёзды Виолончельной академии</option>
                        <option value="regions">Виолончельная академия в регионах</option>
                        <option value="vivacello">Виолончельная академия и VIVACELLO</option>
                    </select>
                </label>
            </div>
            <a href="?" class="afisha-filters__reset">Сбросить фильтры</a>
        </div>
    </div>
</section>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "afisha",
    [
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => AFISHA_IBLOCK_ID,
        "NEWS_COUNT" => "12",
        "SORT_BY1" => "PROPERTY_DATE_EVENT",
        "SORT_ORDER1" => "DESC",
        "FILTER_NAME" => "arrAfishaFilter",
        "FIELD_CODE" => ["PREVIEW_TEXT", "PREVIEW_PICTURE"],
        "PROPERTY_CODE" => ["DATE_EVENT", "TIME", "DATE_LABEL", "CITY", "TYPE", "PROJECT", "BUY_URL", "MORE_URL", "POSTER"],
        "CHECK_DATES" => "N",
        "DETAIL_URL" => "/afisha/#ELEMENT_CODE#/",
        "SET_TITLE" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TEMPLATE" => "academy",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_FILTER" => "Y",
    ]
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
