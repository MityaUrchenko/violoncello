<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/** Пагинация списков: классы .afisha-pagination* из template_styles.css. */
if ($arResult["NavPageCount"] <= 1) return;
$q = $arResult["NavQueryString"] ? $arResult["NavQueryString"]."&amp;" : "";
$base = $arResult["sUrlPath"]."?".$q."PAGEN_".$arResult["NavNum"]."=";
?>
<nav class="afisha-pagination" aria-label="Страницы">
    <?for($i = 1; $i <= $arResult["NavPageCount"]; $i++):?>
        <?if($i == $arResult["NavPageNomer"]):?>
            <span class="afisha-pagination__item afisha-pagination__item--active" aria-current="page"><?=$i?></span>
        <?else:?>
            <a href="<?=$base.$i?>" class="afisha-pagination__item"><?=$i?></a>
        <?endif?>
    <?endfor?>
</nav>
