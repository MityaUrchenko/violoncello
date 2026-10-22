<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/** Шаблон списка «Афиша». Свойства инфоблока:
 *  DATE_EVENT (дата), TIME (строка «19:00»), DATE_LABEL (строка, напр. «19–21 декабря 2026» — если задана, выводится вместо даты),
 *  CITY (список, XML_ID: msk | spb | klin | kaliningrad), TYPE (список, множественный, XML_ID: concert | masterclass | special),
 *  PROJECT (список, XML_ID: stars | regions | vivacello), BUY_URL (ссылка на билеты), MORE_URL (ссылка «Подробнее»),
 *  POSTER (флажок Y — вертикальный макет афиши). Анонс — PREVIEW_TEXT, картинка — PREVIEW_PICTURE. */
$typeOne = ["concert" => "Концерт", "masterclass" => "Мастер-класс", "special" => "Специальное мероприятие"];
?>
<section class="afisha-events">
    <div class="section__container">
        <p class="afisha-events__empty"<?=(count($arResult["ITEMS"]) ? ' style="display: none;"' : '')?>>По выбранным параметрам событий пока нет.</p>
        <?if(count($arResult["ITEMS"])):?>
        <div class="events__grid">
            <?foreach($arResult["ITEMS"] as $arItem):
                $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => "Удалить событие?"]);
                $p = $arItem["PROPERTIES"];
                $ts = MakeTimeStamp($p["DATE_EVENT"]["VALUE"]);
                $date = implode(", ", $p["DATE_LABEL"]["VALUE"]) ?: FormatDate("j F Y", $ts);
                if ($p["TIME"]["VALUE"]) $date .= ", ".$p["TIME"]["VALUE"];
                $types = (array)$p["TYPE"]["VALUE_XML_ID"];
                $firstType = $types ? $typeOne[$types[0]] : "";
                $poster = $p["POSTER"]["VALUE"] ? " event-card__image--poster" : "";
            ?>
            <div class="event-card" id="<?=$this->GetEditAreaId($arItem["ID"])?>" data-type="<?=htmlspecialcharsbx(implode(" ", $types))?>" data-month="<?=date("Y-m", $ts)?>" data-city="<?=htmlspecialcharsbx($p["CITY"]["VALUE_XML_ID"])?>" data-project="<?=htmlspecialcharsbx($p["PROJECT"]["VALUE_XML_ID"])?>">
                <div class="event-card__image<?=$poster?>">
                    <?if($arItem["PREVIEW_PICTURE"]):?>

                    <?if($p["MORE_URL"]["VALUE"]){?>
                        <a href="<?=$p["MORE_URL"]["VALUE"]?>">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=htmlspecialcharsbx($arItem["NAME"])?>">
                        </a>
                    <?}else{?>
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=htmlspecialcharsbx($arItem["NAME"])?>">
                    <?}?>

                    <?endif?>
                    <?if($firstType):?><span class="event-card__type"><?=$firstType?></span><?endif?>
                </div>
                <p class="event-card__meta"><?=$date?><?=($p["CITY"]["VALUE"] ? " · ".$p["CITY"]["VALUE"] : "")?></p>
                <h3 class="event-card__title">
                    <?if($p["MORE_URL"]["VALUE"]){?>
                        <a href="<?=$p["MORE_URL"]["VALUE"]?>"><?=$arItem["NAME"]?></a>
                    <?}else{?>
                        <?=$arItem["NAME"]?>
                    <?}?>
                </h3>
                <?if($arItem["PREVIEW_TEXT"]):?><p class="event-card__desc"><?=$arItem["PREVIEW_TEXT"]?></p><?endif?>
                <?if($p["PROJECT"]["VALUE"]):?><p class="event-card__place"><?=$p["PROJECT"]["VALUE"]?></p><?endif?>
                <?if($p["MORE_URL"]["VALUE"] || $p["BUY_URL"]["VALUE"]):?>
                <div class="event-card__actions">
                    <?if($p["MORE_URL"]["VALUE"]):?><a href="<?=$p["MORE_URL"]["VALUE"]?>" class="event-card__link event-card__link--accent">Подробнее</a><?endif?>
                    <?if($p["BUY_URL"]["VALUE"]):?><a href="<?=$p["BUY_URL"]["VALUE"]?>" class="btn btn--primary" target="_blank" rel="noopener">Купить билет</a><?endif?>
                </div>
                <?endif?>
            </div>
            <?endforeach?>
        </div>
        <?endif?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><?=$arResult["NAV_STRING"]?><?endif?>
    </div>
</section>
