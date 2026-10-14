<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);

$this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK_ID'], 'ELEMENT_EDIT'));
$this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);

$APPLICATION->SetTitle($arResult['NAME']);
$APPLICATION->SetPageProperty('title', $arResult['NAME'] . ' — Сообщество');

$img = $arResult['DETAIL_PICTURE']['SRC'] ?? ($arResult['PREVIEW_PICTURE']['SRC'] ?? '');

$propText = static function (array $result, string $code): string {
    $prop = $result['DISPLAY_PROPERTIES'][$code] ?? ($result['PROPERTIES'][$code] ?? null);
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

$bits = array_filter([
    $propText($arResult, 'CATEGORY'),
    $propText($arResult, 'SPECIALIZATION'),
    $propText($arResult, 'CITY'),
    $propText($arResult, 'COUNTRY'),
    $propText($arResult, 'PROJECT'),
]);
?>
<section class="community-detail" id="<?= $this->GetEditAreaId($arResult['ID']) ?>">
    <div class="section__container">
        <p class="community-detail__back"><a href="/community/">Все участники</a></p>
        <div class="community-detail__grid">
            <div class="community-detail__media">
                <?php if ($img): ?>
                <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($arResult['NAME']) ?>">
                <?php endif; ?>
            </div>
            <div class="community-detail__content">
                <h1 class="community-detail__title"><?= htmlspecialcharsbx($arResult['NAME']) ?></h1>
                <?php if ($bits): ?>
                <p class="community-detail__meta"><?= htmlspecialcharsbx(implode(' · ', $bits)) ?></p>
                <?php endif; ?>
                <?php if ($arResult['DETAIL_TEXT'] !== ''): ?>
                <div class="community-detail__text">
                    <?php if ($arResult['DETAIL_TEXT_TYPE'] === 'html'): ?>
                        <?= $arResult['DETAIL_TEXT'] ?>
                    <?php else: ?>
                        <?= nl2br(htmlspecialcharsbx($arResult['DETAIL_TEXT'])) ?>
                    <?php endif; ?>
                </div>
                <?php elseif ($arResult['PREVIEW_TEXT'] !== ''): ?>
                <div class="community-detail__text">
                    <?php if ($arResult['PREVIEW_TEXT_TYPE'] === 'html'): ?>
                        <?= $arResult['PREVIEW_TEXT'] ?>
                    <?php else: ?>
                        <?= nl2br(htmlspecialcharsbx($arResult['PREVIEW_TEXT'])) ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
