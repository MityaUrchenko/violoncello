<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */
/** @var array $arParams */
/** @var CBitrixComponentTemplate $this */
$this->setFrameMode(true);

$filter = $arResult['FILTER'] ?? [];
$opts = $arResult['FILTER_OPTIONS'] ?? [];
$base = $arResult['FILTER_BASE'] ?: '/mediacenter/photo/';
?>
<section class="photo-filters">
    <div class="section__container">
        <form class="photo-filters__row" method="get" action="<?= htmlspecialcharsbx($base) ?>">
            <div class="photo-filters__left">
                <a href="<?= htmlspecialcharsbx($base) ?>" class="photo-filters__all">Все альбомы</a>
                <label class="photo-filters__dropdown">
                    Год
                    <select name="year" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($opts['year'] ?? [] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= ($filter['year'] ?? '') === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="photo-filters__dropdown">
                    Проект
                    <select name="project" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($opts['project'] ?? [] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= ($filter['project'] ?? '') === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="photo-filters__dropdown">
                    Мероприятие
                    <select name="event" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($opts['event'] ?? [] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= ($filter['event'] ?? '') === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <a href="<?= htmlspecialcharsbx($base) ?>" class="photo-filters__reset">Сбросить фильтры</a>
        </form>
    </div>
    <svg class="photo-filters__line" viewBox="0 0 1440 28" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 20 C 360 6, 820 26, 1440 10" fill="none" stroke="#981B2F" stroke-width="1.4"></path>
    </svg>
</section>

<section class="photo-chronicle">
    <div class="section__container">
        <?php if (empty($arResult['ITEMS'])): ?>
        <p class="photo-chronicle__empty">Альбомов по выбранным фильтрам нет.</p>
        <?php else: ?>
        <div class="photo-chronicle__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);

                $photos = $item['PHOTOS'] ?? [];
                $total = (int)($item['PHOTOS_COUNT'] ?? count($photos));
                $cover = $item['PREVIEW_PICTURE']['SRC'] ?? ($photos[0]['SRC'] ?? '');
                $detailUrl = $item['DETAIL_PAGE_URL'] ?: ('/mediacenter/photo/detail.php?ID=' . (int)$item['ID']);
                $preview = trim((string)($item['PREVIEW_TEXT'] ?? ''));
            ?>
            <article class="photo-album-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <a href="<?= htmlspecialcharsbx($detailUrl) ?>" class="photo-album-card__link">
                    <div class="photo-album-card__image">
                        <?php if ($cover): ?>
                        <img src="<?= htmlspecialcharsbx($cover) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>" loading="lazy" decoding="async">
                        <?php endif; ?>
                        <span class="photo-album-card__count"><?= $total ?> фото</span>
                    </div>
                    <h3 class="photo-album-card__title"><?= htmlspecialcharsbx($item['NAME']) ?></h3>
                    <?php if ($preview !== ''): ?>
                    <div class="photo-album-card__text">
                        <?php if (($item['PREVIEW_TEXT_TYPE'] ?? 'text') === 'html'): ?>
                            <?= $preview ?>
                        <?php else: ?>
                            <?= htmlspecialcharsbx($preview) ?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($arParams['DISPLAY_BOTTOM_PAGER'] !== 'N' && !empty($arResult['NAV_STRING'])): ?>
        <nav class="photo-chronicle__pager" aria-label="Страницы альбомов">
            <?= $arResult['NAV_STRING'] ?>
        </nav>
        <?php endif; ?>
    </div>
</section>
