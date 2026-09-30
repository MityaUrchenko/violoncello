<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);

$this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK_ID'], 'ELEMENT_EDIT'));
$this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);

$img = $arResult['DETAIL_PICTURE']['SRC'] ?? ($arResult['PREVIEW_PICTURE']['SRC'] ?? '');
$text = $arResult['DETAIL_TEXT'] ?: $arResult['PREVIEW_TEXT'];
$backUrl = $arParams['IBLOCK_URL'] ?: '/projects/';
?>
<section class="project-detail" id="<?= $this->GetEditAreaId($arResult['ID']) ?>">
    <div class="section__container">
        <p class="project-detail__back">
            <a href="<?= htmlspecialcharsbx($backUrl) ?>">Все проекты</a>
        </p>
        <div class="project-detail__grid">
            <div class="project-detail__media">
                <?php if ($img): ?>
                <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($arResult['NAME']) ?>">
                <?php endif; ?>
            </div>
            <div class="project-detail__content">
                <h1 class="project-detail__title"><?= htmlspecialcharsbx($arResult['NAME']) ?></h1>
                <?php if ($text): ?>
                <div class="project-detail__text"><?= $text ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
