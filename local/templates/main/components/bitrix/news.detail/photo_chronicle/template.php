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
$initial = (int)($arResult['PHOTOS_INITIAL'] ?? 17);
$step = (int)($arResult['PHOTOS_STEP'] ?? 24);
$backUrl = $arParams['LIST_URL'] ?: '/mediacenter/photo/';
$cover = $arResult['DETAIL_PICTURE']['SRC'] ?? ($arResult['PREVIEW_PICTURE']['SRC'] ?? ($photos[0]['SRC'] ?? '/assets/images/photo-archive-hero.jpg'));
$gallery = 'album-' . (int)$arResult['ID'];
$preview = trim((string)($arResult['PREVIEW_TEXT'] ?? ''));
$others = $arResult['OTHER_ALBUMS'] ?? [];
?>
<section class="hero-secondary hero-secondary--photo">
    <div class="hero-secondary__bg">
        <img src="<?= htmlspecialcharsbx($cover) ?>" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb">
            <a href="/news/">Медиацентр</a> / <a href="<?= htmlspecialcharsbx($backUrl) ?>">Фотоархив</a>
        </p>
        <h1 class="hero-secondary__title"><?= $arResult['NAME'] ?></h1>
        <?php if ($preview !== ''): ?>
        <div class="hero-secondary__subtitle">
            <?php if (($arResult['PREVIEW_TEXT_TYPE'] ?? 'text') === 'html'): ?>
                <?= $preview ?>
            <?php else: ?>
                <?= htmlspecialcharsbx($preview) ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="photo-detail" id="<?= $this->GetEditAreaId($arResult['ID']) ?>">
    <div class="section__container">
        <?php if ($photos): ?>
        <div class="photo-detail__grid"
             data-initial="<?= $initial ?>"
             data-step="<?= $step ?>">
            <?php foreach ($photos as $i => $photo):
                $alt = $photo['DESCRIPTION'] ?: $arResult['NAME'];
                $src = $photo['SRC'];
                $isHero = $i === 0;
                $visible = $i < $initial;
                $eager = $i < 8;
                $itemClass = 'photo-detail__item';
                if ($isHero) {
                    $itemClass .= ' photo-detail__item--hero';
                }
                if (!$visible) {
                    $itemClass .= ' is-hidden';
                }
            ?>
            <a href="<?= htmlspecialcharsbx($src) ?>"
               class="<?= $itemClass ?>"
               data-fancybox="<?= htmlspecialcharsbx($gallery) ?>"
               data-caption="<?= htmlspecialcharsbx($alt) ?>">
                <img src="<?= $eager ? htmlspecialcharsbx($src) : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' ?>"
                     <?= $eager ? '' : 'data-src="' . htmlspecialcharsbx($src) . '"' ?>
                     alt="<?= htmlspecialcharsbx($alt) ?>"
                     class="<?= $eager ? '' : 'photo-detail__img--lazy' ?>"
                     <?= $eager ? '' : 'loading="lazy"' ?>
                     decoding="async"
                     <?= !empty($photo['WIDTH']) ? 'width="' . (int)$photo['WIDTH'] . '"' : '' ?>
                     <?= !empty($photo['HEIGHT']) ? 'height="' . (int)$photo['HEIGHT'] . '"' : '' ?>>
            </a>
            <?php endforeach; ?>
        </div>
        <?php if ($total > $initial): ?>
        <div class="photo-detail__more-wrap">
            <button type="button" class="photo-detail__more">Показать ещё фото</button>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <p class="photo-detail__empty">В этом альбоме пока нет фотографий.</p>
        <?php endif; ?>

        <?php if ($others): ?>
        <div class="photo-detail__others">
            <h2 class="photo-detail__others-title">Другие альбомы</h2>
            <div class="photo-detail__others-grid">
                <?php foreach ($others as $album):
                    $albumPreview = trim((string)($album['PREVIEW_TEXT'] ?? ''));
                ?>
                <article class="photo-album-card">
                    <a href="<?= htmlspecialcharsbx($album['DETAIL_PAGE_URL']) ?>" class="photo-album-card__link">
                        <div class="photo-album-card__image">
                            <?php if (!empty($album['COVER'])): ?>
                            <img src="<?= htmlspecialcharsbx($album['COVER']) ?>" alt="<?= htmlspecialcharsbx($album['NAME']) ?>" loading="lazy" decoding="async">
                            <?php endif; ?>
                            <span class="photo-album-card__count"><?= (int)$album['PHOTOS_COUNT'] ?> фото</span>
                        </div>
                        <h3 class="photo-album-card__title"><?= $album['NAME'] ?></h3>
                        <?php if ($albumPreview !== ''): ?>
                        <div class="photo-album-card__text">
                            <?php if (($album['PREVIEW_TEXT_TYPE'] ?? 'text') === 'html'): ?>
                                <?= $albumPreview ?>
                            <?php else: ?>
                                <?= htmlspecialcharsbx($albumPreview) ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </a>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
