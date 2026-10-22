<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arResult */
/** @var array $arParams */
/** @var CBitrixComponentTemplate $this */
$this->setFrameMode(true);

$players = [];
?>
<section class="video-archive">
    <div class="section__container">
        <?php if (empty($arResult['ITEMS'])): ?>
        <p class="video-archive__empty">Видео по выбранным фильтрам нет.</p>
        <?php else: ?>
        <div class="video-archive__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);

                $linkProp = $item['DISPLAY_PROPERTIES']['LINK_TO_VIDEO']['VALUE']
                    ?? ($item['PROPERTIES']['LINK_TO_VIDEO']['VALUE'] ?? '');
                if (is_array($linkProp)) {
                    $file = trim((string)($linkProp['TEXT'] ?? reset($linkProp)));
                } else {
                    $file = trim((string)$linkProp);
                }

                $poster = $item['PREVIEW_PICTURE']['SRC'] ?? '';
                $playerId = 'video-player-' . (int)$item['ID'];
                if ($file !== '') {
                    $players[] = [
                        'id' => $playerId,
                        'file' => $file,
                        'poster' => $poster,
                    ];
                }

                $category = $item['DISPLAY_PROPERTIES']['CATEGORY']['VALUE']
                    ?? ($item['PROPERTIES']['CATEGORY']['VALUE'] ?? '');
                if (is_array($category)) {
                    $category = reset($category);
                }
                $category = trim((string)$category);
                $date = trim((string)($item['DISPLAY_ACTIVE_FROM'] ?? ''));
                $meta = array_filter([$category, $date]);
            ?>
            <article class="video-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <?php if ($file !== ''): ?>
                <div class="video-card__player" id="<?= htmlspecialcharsbx($playerId) ?>"></div>
                <?php elseif ($poster !== ''): ?>
                <div class="video-card__player">
                    <img src="<?= htmlspecialcharsbx($poster) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>" loading="lazy" decoding="async">
                </div>
                <?php endif; ?>
                <?php if ($meta): ?>
                <p class="video-card__meta"><?= htmlspecialcharsbx(implode(' · ', $meta)) ?></p>
                <?php endif; ?>
                <h3 class="video-card__title"><?= htmlspecialcharsbx($item['NAME']) ?></h3>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($arParams['DISPLAY_BOTTOM_PAGER'] !== 'N' && !empty($arResult['NAV_STRING'])): ?>
        <nav class="video-archive__pager" aria-label="Страницы видео">
            <?= $arResult['NAV_STRING'] ?>
        </nav>
        <?php endif; ?>
    </div>
</section>
<?php if ($players): ?>
<script src="<?= $this->GetFolder() ?>/playerjs.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Playerjs !== 'function') {
        return;
    }
    var items = <?= json_encode($players, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    items.forEach(function (item) {
        new Playerjs({
            id: item.id,
            file: item.file,
            poster: item.poster || ''
        });
    });
});
</script>
<?php endif; ?>
