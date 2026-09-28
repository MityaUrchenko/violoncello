<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */
/** @var array $arParams */
/** @var CBitrixComponentTemplate $this */
$this->setFrameMode(true);

$this->addExternalCss('https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1.15/dist/fancybox/fancybox.css');
$this->addExternalJs('https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1.15/dist/fancybox/fancybox.umd.js');

$this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK_ID'], 'ELEMENT_EDIT'));
$this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);

$photos = $arResult['PHOTOS'] ?? [];
$total = (int)($arResult['PHOTOS_COUNT'] ?? count($photos));
$backUrl = $arParams['LIST_URL'] ?: '/photo_chronicle/';
$cover = $arResult['DETAIL_PICTURE']['SRC'] ?? ($arResult['PREVIEW_PICTURE']['SRC'] ?? ($photos[0]['SRC'] ?? '/assets/images/academy-hero.jpg'));
$gallery = 'album-' . (int)$arResult['ID'];
?>
<section class="hero-secondary">
    <div class="hero-secondary__bg">
        <img src="<?= htmlspecialcharsbx($cover) ?>" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb">
            <a href="<?= htmlspecialcharsbx($backUrl) ?>">Фотохроника</a>
        </p>
        <h1 class="hero-secondary__title"><?= htmlspecialcharsbx($arResult['NAME']) ?></h1>
        <p class="hero-secondary__subtitle"><?= $total ?> фото</p>
    </div>
</section>

<section class="photo-chronicle photo-chronicle--detail" id="<?= $this->GetEditAreaId($arResult['ID']) ?>">
    <div class="section__container">
        <div class="section__header photo-chronicle__header">
            <h2 class="section__title photo-chronicle__heading"><?= htmlspecialcharsbx($arResult['NAME']) ?></h2>
            <a href="<?= htmlspecialcharsbx($backUrl) ?>" class="section__link">Все альбомы</a>
        </div>

        <?php if (!empty($arResult['PREVIEW_TEXT'])): ?>
        <div class="photo-album__lead"><?= $arResult['PREVIEW_TEXT'] ?></div>
        <?php endif; ?>

        <?php if ($photos): ?>
        <div class="photo-album__grid photo-album__grid--all">
            <?php foreach ($photos as $photo):
                $alt = $photo['DESCRIPTION'] ?: $arResult['NAME'];
                $src = $photo['SRC'];
            ?>
            <a href="<?= htmlspecialcharsbx($src) ?>"
               class="photo-album__item"
               data-fancybox="<?= htmlspecialcharsbx($gallery) ?>"
               data-caption="<?= htmlspecialcharsbx($alt) ?>">
                <img src="<?= htmlspecialcharsbx($src) ?>" alt="<?= htmlspecialcharsbx($alt) ?>">
            </a>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p class="photo-album__empty">В этом альбоме пока нет фотографий.</p>
        <?php endif; ?>
    </div>
</section>
