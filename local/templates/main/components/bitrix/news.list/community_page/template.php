<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */
/** @var array $arParams */
$this->setFrameMode(true);

$filter = $arResult['FILTER'] ?? [];
$tabs = $arResult['ROLE_TABS'] ?? [];
$paths = $arResult['ROLE_PATHS'] ?? [];
$opts = $arResult['FILTER_OPTIONS'] ?? [];
$currentRole = $filter['role'] ?? '';
$currentPosition = $filter['position'] ?? '';

$queryWithPosition = static function (string $path, string $position): string {
    if ($position === '') {
        return $path;
    }
    return $path . '?position=' . rawurlencode($position);
};
?>
<section class="community-filters">
    <div class="section__container">
        <div class="community-filters__types">
            <?php foreach ($tabs as $code => $label):
                $path = $paths[$code] ?? '/community/';
                $href = $queryWithPosition($path, $currentPosition);
                $active = $currentRole === $code;
            ?>
            <a href="<?= htmlspecialcharsbx($href) ?>"
               class="community-filters__tab<?= $active ? ' community-filters__tab--active' : '' ?>"><?= htmlspecialcharsbx($label) ?></a>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($opts['position'])): ?>
        <form class="community-filters__row" method="get" action="<?= htmlspecialcharsbx($paths[$currentRole] ?? '/community/') ?>">
            <div class="community-filters__dropdowns">
                <label class="community-filters__dropdown">
                    Роль
                    <select name="position" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($opts['position'] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= $currentPosition === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <?php if ($currentRole !== '' || $currentPosition !== ''): ?>
            <a href="/community/" class="community-filters__reset">Сбросить фильтры</a>
            <?php endif; ?>
        </form>
        <?php endif; ?>
    </div>
</section>

<section class="community community--page" id="community">
    <div class="section__container">
        <div class="section__header section__header--light">
            <h2 class="section__title section__title--light"><?= htmlspecialcharsbx($arParams['SECTION_TITLE'] ?? 'Сообщество академии') ?></h2>
        </div>
        <?php if (empty($arResult['ITEMS'])): ?>
        <p class="community__empty">По выбранным фильтрам никого нет.</p>
        <?php else: ?>
        <div class="community__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
                $img = $item['PREVIEW_PICTURE']['SRC'] ?? '';
                $role = $item['DISPLAY_PROPERTIES']['ROLE']['DISPLAY_VALUE']
                    ?? ($item['DISPLAY_PROPERTIES']['ROLE']['VALUE'] ?? '');
                $position = $item['DISPLAY_PROPERTIES']['POSITION']['DISPLAY_VALUE']
                    ?? ($item['DISPLAY_PROPERTIES']['POSITION']['VALUE'] ?? '');
                if (is_array($role)) {
                    $role = implode(', ', $role);
                }
                if (is_array($position)) {
                    $position = implode(', ', $position);
                }
                $subtitle = $position ?: $role;
            ?>
            <article class="person-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <?php if ($img): ?>
                <div class="person-card__photo">
                    <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>" loading="lazy" decoding="async">
                </div>
                <?php endif; ?>
                <h3 class="person-card__name"><?= htmlspecialcharsbx($item['NAME']) ?></h3>
                <?php if ($subtitle): ?>
                <p class="person-card__role"><?= htmlspecialcharsbx($subtitle) ?></p>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($arParams['DISPLAY_BOTTOM_PAGER'] !== 'N' && !empty($arResult['NAV_STRING'])): ?>
        <nav class="community__pager" aria-label="Страницы сообщества">
            <?= $arResult['NAV_STRING'] ?>
        </nav>
        <?php endif; ?>
    </div>
</section>
