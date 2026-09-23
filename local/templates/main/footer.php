<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
</main>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__top">
            <div class="footer__brand">
                <a href="<?= SITE_DIR ?>" class="footer__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/logo.svg" alt="Всероссийская виолончельная академия" class="footer__logo-img">
                </a>
                <div class="footer__socials">
                    <a href="#" class="footer__social" aria-label="VK">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/vk2.svg" alt="">
                    </a>
                    <a href="#" class="footer__social" aria-label="Rutube">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/rutube2.svg" alt="">
                    </a>
                    <a href="#" class="footer__social" aria-label="YouTube">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/youtube2.svg" alt="">
                    </a>
                    <a href="#" class="footer__social" aria-label="Dzen">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/dzen2.svg" alt="">
                    </a>
                </div>
            </div>

            <div class="footer__nav">
                <?php
                $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'footer',
                    [
                        'ROOT_MENU_TYPE' => 'bottom',
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
            </div>
        </div>

        <div class="footer__bottom">
            <p class="footer__copy">© <?= date('Y') ?> ВСЕРОССИЙСКАЯ ВИОЛОНЧЕЛЬНАЯ АКАДЕМИЯ</p>
            <a href="<?= SITE_DIR ?>privacy/" class="footer__policy">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a>
        </div>
    </div>
</footer>

</body>
</html>
