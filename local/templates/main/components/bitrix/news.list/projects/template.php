<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
if (empty($arResult['ITEMS'])) {
    return;
}
?>
<section class="projects" id="projects">
    <div class="section__container">
        <div class="section__header section__header--light">
            <h2 class="section__title section__title--light"><?= htmlspecialcharsbx($arParams['SECTION_TITLE'] ?? 'Проекты') ?></h2>
            <?php if (!empty($arParams['SECTION_LINK'])): ?>
            <a href="<?= htmlspecialcharsbx($arParams['SECTION_LINK']) ?>" class="section__link section__link--light"><?= htmlspecialcharsbx($arParams['SECTION_LINK_TEXT'] ?? 'Смотреть все проекты') ?></a>
            <?php endif; ?>
        </div>
        <div class="projects__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
                $img = $item['PREVIEW_PICTURE']['SRC'] ?? ($item['DETAIL_PICTURE']['SRC'] ?? '');
            ?>
            <article class="project-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <?php if ($img): ?>
                <div class="project-card__image">
                    <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>">
                </div>
                <?php endif; ?>
                <div class="project-card__body">
                    <h3 class="project-card__title"><?= htmlspecialcharsbx($item['NAME']) ?></h3>
                    <?php if ($item['PREVIEW_TEXT']): ?>
                    <p class="project-card__desc"><?= $item['PREVIEW_TEXT'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="project-card__link">
                    <a href="<?= htmlspecialcharsbx($item['DETAIL_PAGE_URL']) ?>">Подробнее</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
