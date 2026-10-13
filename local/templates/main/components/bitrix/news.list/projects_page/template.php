<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
if (empty($arResult['ITEMS'])) {
    return;
}
?>
<section class="projects-page">
    <div class="section__container">
        <div class="projects-page__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
                $img = $item['PREVIEW_PICTURE']['SRC'] ?? ($item['DETAIL_PICTURE']['SRC'] ?? '');
                $category = '';
                foreach (['CATEGORY', 'TYPE'] as $propCode) {
                    if (!empty($item['DISPLAY_PROPERTIES'][$propCode]['DISPLAY_VALUE'])) {
                        $val = $item['DISPLAY_PROPERTIES'][$propCode]['DISPLAY_VALUE'];
                        $category = is_array($val) ? implode(', ', $val) : (string)$val;
                        break;
                    }
                    if (!empty($item['PROPERTIES'][$propCode]['VALUE'])) {
                        $val = $item['PROPERTIES'][$propCode]['VALUE'];
                        $category = is_array($val) ? implode(', ', $val) : (string)$val;
                        break;
                    }
                }
                $desc = trim(strip_tags((string)($item['PREVIEW_TEXT'] ?? '')));
                $url = $item['DETAIL_PAGE_URL'] ?? '#';
            ?>
            <article class="project-tile" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <a href="<?= htmlspecialcharsbx($url) ?>" class="project-tile__link">
                    <div class="project-tile__image">
                        <?php if ($img): ?>
                        <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>" loading="lazy" decoding="async">
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
        <?php if ($arParams['DISPLAY_BOTTOM_PAGER'] && !empty($arResult['NAV_STRING'])): ?>
        <div class="projects-page__pager">
            <?= $arResult['NAV_STRING'] ?>
        </div>
        <?php endif; ?>
    </div>
</section>
