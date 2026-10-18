<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Техника игры на виолончели Кирилла Кравцова");
$APPLICATION->SetAdditionalCSS("/assets/css/styles.lectures.css");
?>
<section class="hero-secondary hero-secondary--lectures hero-secondary--kravtsov">
    <div class="hero-secondary__bg">
        <img src="/assets/images/lectures/kravtsov.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Техника игры на виолончели Кирилла Кравцова</h1>
    </div>
</section>
<section class="about-intro">
    <div class="section__container">
        <div class="lecture-text">
            <p class="academy-mission__text">«Техника игры на виолончели» — первый медиапроект Виолончельной академии, вышедший в 2025 году. В серии коротких видеоуроков Кирилл Кравцов простым языком объясняет технические приёмы и основы работы правой и левой руки. Практические пояснения и наглядный показ делают материал понятным и детям, и взрослым.</p>
            <p class="academy-mission__text">Проект адресован учащимся музыкальных школ, педагогам и профессиональным виолончелистам, которые хотят вернуться к основам техники и внимательнее разобраться в привычных исполнительских движениях. Уроки можно использовать в самостоятельной работе и как дополнительный материал к занятиям с преподавателем. Видео опубликованы на площадках Академии во ВКонтакте, YouTube, RUTUBE и Дзене.</p>
        </div>
        <div class="lecture-playlist">
                <?/* iframe: видеоплейлист «Техника игры на виолончели» */?>
            </div>
    </div>
</section>
<section class="about-directions lecture-person">
    <div class="section__container">
        <div class="about-structure__grid">
            <div class="lecture-person__photo lecture-person__photo--landscape">
                <img src="/assets/images/lectures/kravtsov.jpg" alt="Кирилл Кравцов">
            </div>
            <div class="lecture-text">
                <p class="about-directions__card-text"><b>Кирилл Кравцов</b> — виолончелист, педагог, лауреат международных конкурсов, создатель и руководитель Rastrelli Cello Quartet. Выпускник Санкт-Петербургской консерватории по классу Анатолия Никитина, он совершенствовал мастерство в Высшей школе музыки Штутгарта у Петера Бука. Преподавал в Санкт-Петербургской консерватории и Санкт-Петербургском государственном университете культуры и искусств, проводил мастер-классы в Европе, США, Бразилии и Азии. В видеоуроках для Академии музыкант делится опытом своей исполнительской и педагогической работы.</p>
            </div>
        </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
