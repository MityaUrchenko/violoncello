<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$asset->addCss('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
$asset->addCss(SITE_TEMPLATE_PATH . '/styles.css');
$asset->addJs('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/script.js');

$asset->addString('<link rel="preconnect" href="https://fonts.googleapis.com">');
$asset->addString('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>');
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <meta charset="<?= SITE_CHARSET ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?php $APPLICATION->ShowHead(); ?>
</head>
<body class="page">
<?php $APPLICATION->ShowPanel(); ?>

<header class="header">
    <div class="header__container">
        <a href="<?= SITE_DIR ?>" class="header__logo">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/logo.svg" alt="Всероссийская виолончельная академия" class="header__logo-img">
        </a>

        <button class="header__burger" type="button" aria-label="Открыть меню" aria-expanded="false">
            <span class="header__burger-line"></span>
            <span class="header__burger-line"></span>
            <span class="header__burger-line"></span>
        </button>

        <nav class="header__nav">
            <?php
            $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'header',
                    [
                            'ROOT_MENU_TYPE' => 'top',
                            'MAX_LEVEL' => 2,
                            'CHILD_MENU_TYPE' => 'left',
                            'USE_EXT' => 'Y',
                            'DELAY' => 'N',
                            'ALLOW_MULTI_SELECT' => 'N',
                            'MENU_CACHE_TYPE' => 'A',
                            'MENU_CACHE_TIME' => 3600,
                            'MENU_CACHE_USE_GROUPS' => 'Y',
                            'MENU_CACHE_GET_VARS' => [],
                    ],
                    false
            );
            ?>
            <div class="header__actions">
                <a href="?lang=en" class="header__lang">EN</a>
                <a href="<?= SITE_DIR ?>support/" class="header__support btn btn--primary">ПОДДЕРЖАТЬ АКАДЕМИЮ</a>
            </div>
        </nav>
    </div>
</header>

<main class="main">
