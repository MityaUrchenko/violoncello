<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
if (empty($arResult['ITEMS'])) {
    return;
}
?>
<section class="projects">
    <div class="section__container">
        <div class="section__header section__header--light">
            <h2 class="section__title section__title--light"><?= htmlspecialcharsbx($arParams['SECTION_TITLE'] ?? 'Проекты') ?></h2>
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
                    <a href="<?= htmlspecialcharsbx($item['DETAIL_PAGE_URL']) ?>">
                        <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>" loading="lazy" decoding="async">
                    </a>
                </div>
                <?php endif; ?>
                <div class="project-card__body">
                    <h3 class="project-card__title">
                        <a href="<?= htmlspecialcharsbx($item['DETAIL_PAGE_URL']) ?>"><?= htmlspecialcharsbx($item['NAME']) ?></a>
                    </h3>
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
        <?php if ($arParams['DISPLAY_BOTTOM_PAGER'] !== 'N' && !empty($arResult['NAV_STRING'])): ?>
        <nav class="projects__pager" aria-label="Страницы проектов">
            <?= $arResult['NAV_STRING'] ?>
        </nav>
        <?php endif; ?>
    </div>
</section>
