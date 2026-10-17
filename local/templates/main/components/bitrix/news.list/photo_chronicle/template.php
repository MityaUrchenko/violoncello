<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */
/** @var array $arParams */
/** @var CBitrixComponentTemplate $this */
$this->setFrameMode(true);

$filter = $arResult['FILTER'] ?? [];
$opts = $arResult['FILTER_OPTIONS'] ?? [];
$base = $arResult['FILTER_BASE'] ?: '/mediacenter/photo/';
?>
<section class="photo-chronicle">
    <div class="section__container">
        <?php if (empty($arResult['ITEMS'])): ?>
        <p class="photo-chronicle__empty">Альбомов по выбранным фильтрам нет.</p>
        <?php else: ?>
        <div class="photo-chronicle__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);

                $photos = $item['PHOTOS'] ?? [];
                $total = (int)($item['PHOTOS_COUNT'] ?? count($photos));
                $cover = $item['PREVIEW_PICTURE']['SRC'] ?? ($photos[0]['SRC'] ?? '');
                $detailUrl = $item['DETAIL_PAGE_URL'];
                $preview = trim($item['PREVIEW_TEXT']);
            ?>
            <article class="photo-album-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <a href="<?= htmlspecialcharsbx($detailUrl) ?>" class="photo-album-card__link">
                    <div class="photo-album-card__image">
                        <?php if ($cover): ?>
                        <img src="<?= htmlspecialcharsbx($cover) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>" loading="lazy" decoding="async">
                        <?php endif; ?>
                        <span class="photo-album-card__count"><?= $total ?> фото</span>
                    </div>
                    <h3 class="photo-album-card__title"><?= $item['NAME'] ?></h3>
                    <?php if ($preview !== ''): ?>
                    <div class="photo-album-card__text">
                        <?= $preview ?>
                    </div>
                    <?php endif; ?>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($arParams['DISPLAY_BOTTOM_PAGER'] !== 'N' && !empty($arResult['NAV_STRING'])): ?>
        <nav class="photo-chronicle__pager" aria-label="Страницы альбомов">
            <?= $arResult['NAV_STRING'] ?>
        </nav>
        <?php endif; ?>
    </div>
</section>
