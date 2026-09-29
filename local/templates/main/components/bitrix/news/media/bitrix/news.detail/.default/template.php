<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);

$this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK_ID'], 'ELEMENT_EDIT'));
$this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);

$img = $arResult['DETAIL_PICTURE']['SRC'] ?? ($arResult['PREVIEW_PICTURE']['SRC'] ?? '');
$text = $arResult['DETAIL_TEXT'] ?: $arResult['PREVIEW_TEXT'];
$backUrl = $arParams['IBLOCK_URL'] ?: '/news/';
?>
<section class="news-detail" id="<?= $this->GetEditAreaId($arResult['ID']) ?>">
    <div class="section__container">
        <p class="news-detail__back">
            <a href="<?= htmlspecialcharsbx($backUrl) ?>">Все новости</a>
        </p>
        <div class="news-detail__grid">
            <div class="news-detail__media">
                <?php if ($img): ?>
                <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($arResult['NAME']) ?>">
                <?php endif; ?>
            </div>
            <div class="news-detail__content">
                <?php if ($arResult['DISPLAY_ACTIVE_FROM']): ?>
                <p class="news-detail__date"><?= htmlspecialcharsbx($arResult['DISPLAY_ACTIVE_FROM']) ?></p>
                <?php endif; ?>
                <h1 class="news-detail__title"><?= htmlspecialcharsbx($arResult['NAME']) ?></h1>
                <?php if ($text): ?>
                <div class="news-detail__text"><?= $text ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
