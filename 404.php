<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Скоро");
$APPLICATION->SetAdditionalCSS("/assets/css/styles.soon.css");
?>
<section class="hero hero--soon">
    <div class="hero__bg">
        <img src="/assets/images/soon-hero.jpg" alt="" class="hero__bg-img" aria-hidden="true">
    </div>
    <div class="hero__content">
        <h1 class="hero__title">Скоро здесь появится кое-что интересное!</h1>
        <div class="hero__text">
            <p>Мы работаем над этой страницей, чтобы совсем скоро поделиться с вами новыми возможностями, проектами и событиями Виолончельной академии.</p>
            <p>Совсем скоро здесь появится вся информация.</p>
            <p>А пока предлагаем познакомиться с другими разделами нашего сайта.</p>
        </div>
        <div class="hero__buttons">
            <a href="/" class="btn btn--primary">Вернуться на главную</a>
        </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
