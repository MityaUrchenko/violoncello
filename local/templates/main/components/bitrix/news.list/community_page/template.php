<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */
/** @var array $arParams */
$this->setFrameMode(true);

$propText = static function (array $item, string $code): string {
    $prop = $item['DISPLAY_PROPERTIES'][$code] ?? ($item['PROPERTIES'][$code] ?? null);
    if (!is_array($prop)) {
        return '';
    }
    $value = $prop['DISPLAY_VALUE'] ?? ($prop['VALUE_ENUM'] ?? ($prop['VALUE'] ?? ''));
    if (is_array($value)) {
        $flat = [];
        foreach ($value as $part) {
            if (is_scalar($part) && trim((string)$part) !== '') {
                $flat[] = trim((string)$part);
            }
        }
        $value = implode(', ', $flat);
    }
    return trim(strip_tags((string)$value));
};
?>
<?php if (empty($arResult['ITEMS'])): ?>
<p class="community-page__empty">По выбранным фильтрам никого нет.</p>
<?php else: ?>
<div class="community-page__grid">
    <?php foreach ($arResult['ITEMS'] as $item):
        $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
        $img = $item['PREVIEW_PICTURE']['SRC'] ?? ($item['DETAIL_PICTURE']['SRC'] ?? '');
        $category = $propText($item, 'CATEGORY');
        $spec = $propText($item, 'SPECIALIZATION');
        $city = $propText($item, 'CITY');
        $second = $spec !== '' ? $spec : $city;
        if ($category !== '' && $second !== '') {
            $meta = $category . ' · ' . $second;
        } else {
            $meta = $category !== '' ? $category : $second;
        }
        $url = $item['DETAIL_PAGE_URL'] ?: '#';
    ?>
    <article class="community-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
        <a href="<?= htmlspecialcharsbx($url) ?>" class="community-card__link">
            <div class="community-card__photo">
                <?php if ($img): ?>
                <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>" loading="lazy">
                <?php endif; ?>
            </div>
            <h2 class="community-card__name"><?= htmlspecialcharsbx($item['NAME']) ?> <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
            <?php if ($meta !== ''): ?>
            <p class="community-card__meta"><?= htmlspecialcharsbx($meta) ?></p>
            <?php endif; ?>
        </a>
    </article>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<?php if ($arParams['DISPLAY_BOTTOM_PAGER'] !== 'N' && !empty($arResult['NAV_STRING'])): ?>
<nav class="community-pagination" aria-label="Страницы">
    <?= $arResult['NAV_STRING'] ?>
</nav>
<?php endif; ?>
