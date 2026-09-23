<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */

if (empty($arResult)) {
    return;
}

// Group by top-level items (columns)
$columns = [];
$current = null;
foreach ($arResult as $item) {
    if ((int)$item['DEPTH_LEVEL'] === 1) {
        $current = count($columns);
        $columns[$current] = [
            'title' => $item['TEXT'],
            'link' => $item['LINK'],
            'items' => [],
        ];
    } elseif ($current !== null && (int)$item['DEPTH_LEVEL'] === 2) {
        $columns[$current]['items'][] = $item;
    }
}
?>
<?php foreach ($columns as $col): ?>
<div class="footer__col">
    <h4 class="footer__col-title"><?= htmlspecialcharsbx($col['title']) ?></h4>
    <?php if (!empty($col['items'])): ?>
    <ul class="footer__list">
        <?php foreach ($col['items'] as $sub): ?>
        <li><a href="<?= htmlspecialcharsbx($sub['LINK']) ?>"><?= htmlspecialcharsbx($sub['TEXT']) ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>
<?php endforeach; ?>
