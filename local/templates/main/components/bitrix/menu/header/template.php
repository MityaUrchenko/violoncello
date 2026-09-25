<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */
if (empty($arResult)) {
    return;
}
?>
<ul class="header__menu">
<?php
$i = 0;
$n = count($arResult);
while ($i < $n):
    $item = $arResult[$i];
    if ((int)$item['DEPTH_LEVEL'] > 1) {
        $i++;
        continue;
    }
    $children = [];
    $j = $i + 1;
    while ($j < $n && (int)$arResult[$j]['DEPTH_LEVEL'] > 1) {
        if ((int)$arResult[$j]['DEPTH_LEVEL'] === 2) {
            $children[] = $arResult[$j];
        }
        $j++;
    }
    $selected = !empty($item['SELECTED']);
    $parentClass = $children ? ' header__menu-item--parent' : '';
    $activeClass = $selected ? ' is-active' : '';
?>
    <li class="header__menu-item<?= $activeClass . $parentClass ?>">
        <a href="<?= htmlspecialcharsbx($item['LINK']) ?>" class="header__menu-link"><?= htmlspecialcharsbx($item['TEXT']) ?></a>
        <?php if ($children): ?>
        <ul class="header__submenu">
            <?php foreach ($children as $child): ?>
            <li class="header__submenu-item<?= !empty($child['SELECTED']) ? ' is-active' : '' ?>">
                <a href="<?= htmlspecialcharsbx($child['LINK']) ?>" class="header__submenu-link"><?= htmlspecialcharsbx($child['TEXT']) ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </li>
<?php
    $i = $j;
endwhile;
?>
</ul>
