<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
?>
<section class="projects-page">
    <div class="section__container">
        <?php if (empty($arResult['ITEMS'])): ?>
        <p class="projects-page__empty">Проектов пока нет.</p>
        <?php else: ?>
        <div class="projects-page__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
                $img = $item['PREVIEW_PICTURE']['SRC'] ?? '';
                $category = $item['DISPLAY_PROPERTIES']['CATEGORY']['DISPLAY_VALUE']
                    ?? ($item['PROPERTIES']['CATEGORY']['VALUE'] ?? '');
                if (is_array($category)) {
                    $category = implode(', ', $category);
                }
                $category = trim(strip_tags((string)$category));
                $desc = trim(strip_tags((string)($item['PREVIEW_TEXT'] ?? '')));
                $url = $item['DETAIL_PAGE_URL'] ?: '#';
            ?>
            <article class="project-tile" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <a href="<?= htmlspecialcharsbx($url) ?>" class="project-tile__link">
                    <div class="project-tile__image">
                        <?php if ($img): ?>
                        <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="project-tile__content">
                        <h2 class="project-tile__title"><?= htmlspecialcharsbx($item['NAME']) ?></h2>
                        <?php if ($category !== ''): ?>
                        <p class="project-tile__category"><?= htmlspecialcharsbx($category) ?></p>
                        <?php endif; ?>
                        <?php if ($desc !== ''): ?>
                        <p class="project-tile__desc"><?= htmlspecialcharsbx($desc) ?></p>
                        <?php endif; ?>
                        <span class="project-tile__more">Подробнее</span>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
