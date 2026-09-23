<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
if (empty($arResult['ITEMS'])) {
    return;
}
?>
<section class="community" id="community">
    <div class="section__container">
        <div class="section__header section__header--light">
            <h2 class="section__title section__title--light"><?= htmlspecialcharsbx($arParams['SECTION_TITLE'] ?? 'Сообщество академии') ?></h2>
            <?php if (!empty($arParams['SECTION_LINK'])): ?>
            <a href="<?= htmlspecialcharsbx($arParams['SECTION_LINK']) ?>" class="section__link section__link--light"><?= htmlspecialcharsbx($arParams['SECTION_LINK_TEXT'] ?? 'Все участники') ?></a>
            <?php endif; ?>
        </div>
        <div class="community__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
                $img = $item['PREVIEW_PICTURE']['SRC'] ?? '';
                $role = $item['DISPLAY_PROPERTIES']['ROLE']['VALUE'] ?? '';
            ?>
            <article class="person-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <?php if ($img): ?>
                <div class="person-card__photo">
                    <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>">
                </div>
                <?php endif; ?>
                <h3 class="person-card__name"><?= htmlspecialcharsbx($item['NAME']) ?></h3>
                <?php if ($role): ?>
                <p class="person-card__role"><?= htmlspecialcharsbx(is_array($role) ? implode(', ', $role) : $role) ?></p>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
