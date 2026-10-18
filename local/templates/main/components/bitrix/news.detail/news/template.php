<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/** Детальная новость. Поля: NAME, DETAIL_TEXT (HTML: <p class="academy-mission__text">…),
 *  DETAIL_PICTURE (фон героя), ACTIVE_FROM / свойство DATE_LABEL.
 *  Свойства: BUTTON_TEXT + BUTTON_URL (кнопка «Купить билеты»), ALBUM_URL (ссылка «Смотреть фотоальбом»),
 *  IMG_POSITION (object-position фото героя, напр. «center 30%»). */
$p = $arResult["PROPERTIES"];
$label = $p["DATE_LABEL"]["VALUE"] ?: $arResult["DISPLAY_ACTIVE_FROM"];
$pic = $arResult["DETAIL_PICTURE"] ?: $arResult["PREVIEW_PICTURE"];
$pos = $p["IMG_POSITION"]["VALUE"];
?>
<section class="hero-secondary hero-secondary--article">
    <?if($pic):?>
    <div class="hero-secondary__bg">
        <img src="<?=$pic["SRC"]?>" alt="" class="hero-secondary__bg-img" aria-hidden="true"<?=($pos ? ' style="object-position: '.htmlspecialcharsbx($pos).';"' : '')?>>
    </div>
    <?endif?>
    <div class="hero-secondary__content">
        <p class="news-detail__date"><?=$label?></p>
        <h1 class="hero-secondary__title"><?=$arResult["NAME"]?></h1>
    </div>
</section>
<section class="news-detail">
    <div class="section__container">
        <div class="news-detail__body">
            <?=$arResult["DETAIL_TEXT"]?>
            <?if($p["BUTTON_URL"]["VALUE"] || $p["ALBUM_URL"]["VALUE"]):?>
            <div class="news-detail__actions">
                <?if($p["BUTTON_URL"]["VALUE"]):?><a href="<?=$p["BUTTON_URL"]["VALUE"]?>" class="btn btn--primary" target="_blank" rel="noopener"><?=($p["BUTTON_TEXT"]["VALUE"] ?: "Купить билеты")?></a><?endif?>
                <?if($p["ALBUM_URL"]["VALUE"]):?><a href="<?=$p["ALBUM_URL"]["VALUE"]?>" class="section__link">Смотреть фотоальбом</a><?endif?>
            </div>
            <?endif?>
            <div class="news-detail__back">
                <a href="<?=$arResult["LIST_PAGE_URL"]?>" class="section__link">← Все новости</a>
            </div>
        </div>
    </div>
</section>
