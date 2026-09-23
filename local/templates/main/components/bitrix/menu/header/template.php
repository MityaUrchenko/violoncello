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
<?php foreach ($arResult as $item): ?>
    <li class="header__menu-item<?= $item['SELECTED'] ? ' is-active' : '' ?>">
        <a href="<?= htmlspecialcharsbx($item['LINK']) ?>" class="header__menu-link"><?= htmlspecialcharsbx($item['TEXT']) ?></a>
    </li>
<?php endforeach; ?>
</ul>
