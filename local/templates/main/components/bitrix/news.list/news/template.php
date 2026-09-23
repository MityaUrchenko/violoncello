<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
if (empty($arResult['ITEMS'])) {
    return;
}
?>
<section class="news" id="media">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title"><?= htmlspecialcharsbx($arParams['SECTION_TITLE'] ?? 'Новости и медиа') ?></h2>
            <?php if (!empty($arParams['SECTION_LINK'])): ?>
            <a href="<?= htmlspecialcharsbx($arParams['SECTION_LINK']) ?>" class="section__link"><?= htmlspecialcharsbx($arParams['SECTION_LINK_TEXT'] ?? 'Все новости') ?></a>
            <?php endif; ?>
        </div>
        <div class="news__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
                $img = $item['PREVIEW_PICTURE']['SRC'] ?? '';
            ?>
            <article class="news-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <?php if ($img): ?>
                <div class="news-card__image">
                    <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>">
                </div>
                <?php endif; ?>
                <div class="news-card__body">
                    <?php if ($item['DISPLAY_ACTIVE_FROM']): ?>
                    <p class="news-card__date"><?= htmlspecialcharsbx($item['DISPLAY_ACTIVE_FROM']) ?></p>
                    <?php endif; ?>
                    <h3 class="news-card__title"><?= htmlspecialcharsbx($item['NAME']) ?></h3>
                </div>
                <div class="news-card__link">
                    <a href="<?= htmlspecialcharsbx($item['DETAIL_PAGE_URL']) ?>">Читать</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
