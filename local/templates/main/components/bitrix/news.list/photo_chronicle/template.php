<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */
/** @var array $arParams */
$this->setFrameMode(true);

if (empty($arResult['ITEMS'])) {
    return;
}

$previewLimit = (int)($arParams['PHOTOS_PREVIEW_COUNT'] ?? 4);
if ($previewLimit < 1) {
    $previewLimit = 4;
}
?>
<section class="photo-chronicle">
    <div class="section__container">
        <div class="section__header photo-chronicle__header">
            <h1 class="section__title photo-chronicle__heading"><?= htmlspecialcharsbx($arParams['SECTION_TITLE'] ?? 'Фотохроника') ?></h1>
            <?php if (!empty($arParams['SECTION_LINK'])): ?>
            <a href="<?= htmlspecialcharsbx($arParams['SECTION_LINK']) ?>" class="section__link"><?= htmlspecialcharsbx($arParams['SECTION_LINK_TEXT'] ?? 'Смотреть все альбомы') ?></a>
            <?php endif; ?>
        </div>

        <?php foreach ($arResult['ITEMS'] as $item):
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);

            $photos = $item['PHOTOS'] ?? [];
            $total = (int)($item['PHOTOS_COUNT'] ?? count($photos));
            $preview = array_slice($photos, 0, $previewLimit);
            $rest = max(0, $total - $previewLimit);
            $url = $item['DETAIL_PAGE_URL'] ?: '#';
        ?>
        <article class="photo-album" id="<?= $this->GetEditAreaId($item['ID']) ?>">
            <h3 class="photo-album__title">
                <?= htmlspecialcharsbx($item['NAME']) ?>
                <span class="photo-album__count">• <?= $total ?> фото</span>
            </h3>
            <?php if ($preview): ?>
            <div class="photo-album__grid">
                <?php foreach ($preview as $index => $photo):
                    $isLast = ($index === count($preview) - 1);
                    $showMore = $isLast && $rest > 0;
                    $alt = $photo['DESCRIPTION'] ?: $item['NAME'];
                    $src = $photo['SRC'];
                    $itemClass = 'photo-album__item' . ($showMore ? ' photo-album__item--more' : '');
                ?>
                <a href="<?= htmlspecialcharsbx($url) ?>" class="<?= $itemClass ?>">
                    <img src="<?= htmlspecialcharsbx($src) ?>" alt="<?= htmlspecialcharsbx($alt) ?>">
                    <?php if ($showMore): ?>
                    <span class="photo-album__overlay">+<?= $rest ?></span>
                    <?php endif; ?>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </article>
        <?php endforeach; ?>
    </div>
</section>
