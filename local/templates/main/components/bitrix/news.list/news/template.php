<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/** Шаблон списка «Новости». Дата — ACTIVE_FROM; если задано свойство
 *  DATE_LABEL (строка, напр. «Январь 2026»), выводится оно. */
?>
<section class="news-list">
    <div class="section__container">
        <div class="news__grid">
            <?foreach($arResult["ITEMS"] as $arItem):
                $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => "Удалить новость?"]);
                $label = $arItem["PROPERTIES"]["DATE_LABEL"]["VALUE"] ?: $arItem["DISPLAY_ACTIVE_FROM"];
            ?>
            <div class="news-card" id="<?=$this->GetEditAreaId($arItem["ID"])?>">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news-card__image">
                    <?if($arItem["PREVIEW_PICTURE"]):?>
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=htmlspecialcharsbx($arItem["NAME"])?>">
                    <?endif?>
                </a>
                <p class="news-card__date"><?=$label?></p>
                <h3 class="news-card__title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
                <p class="news-card__link"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать</a></p>
            </div>
            <?endforeach?>
        </div>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><?=$arResult["NAV_STRING"]?><?endif?>
    </div>
</section>
