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
?>
<section class="events" id="events">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title"><?= htmlspecialcharsbx($arParams['SECTION_TITLE'] ?? 'Ближайшие события') ?></h2>
            <?php if (!empty($arParams['SECTION_LINK'])): ?>
            <a href="<?= htmlspecialcharsbx($arParams['SECTION_LINK']) ?>" class="section__link"><?= htmlspecialcharsbx($arParams['SECTION_LINK_TEXT'] ?? 'Смотреть все события') ?></a>
            <?php endif; ?>
        </div>
        <div class="events__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
                $img = $item['PREVIEW_PICTURE']['SRC'] ?? ($item['DETAIL_PICTURE']['SRC'] ?? '');
                $meta = [$item['DISPLAY_ACTIVE_FROM'] , $item['DISPLAY_PROPERTIES']['PLACE']['VALUE']]
                    ?? ($item['DISPLAY_ACTIVE_FROM'] ?? '');
                $ticketUrl = $item['DISPLAY_PROPERTIES']['TICKETS_URL']['VALUE'] ?? '';
            ?>
            <article class="event-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <?php if ($img): ?>
                <div class="event-card__image">
                    <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>">
                </div>
                <?php endif; ?>
                <div class="event-card__body">
                    <?php if ($meta): ?>
                    <p class="event-card__meta"><?= htmlspecialcharsbx(is_array($meta) ? implode(' • ', $meta) : $meta) ?></p>
                    <?php endif; ?>
                    <h3 class="event-card__title"><?= htmlspecialcharsbx($item['NAME']) ?></h3>
                    <?php if ($item['PREVIEW_TEXT']): ?>
                    <p class="event-card__desc"><?= $item['PREVIEW_TEXT'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="event-card__actions">
                    <a href="<?= htmlspecialcharsbx($item['DETAIL_PAGE_URL']) ?>" class="event-card__link">Подробнее</a>
                    <?php if ($ticketUrl): ?>
                    <a href="<?= htmlspecialcharsbx($ticketUrl) ?>" class="event-card__link event-card__link--accent" target="_blank" rel="noopener">Билеты</a>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
