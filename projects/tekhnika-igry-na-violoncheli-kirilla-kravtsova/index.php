<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Техника игры на виолончели Кирилла Кравцова');
$APPLICATION->SetPageProperty('title', 'Техника игры на виолончели Кирилла Кравцова — Проекты');
$img = '/projects/tekhnika-igry-na-violoncheli-kirilla-kravtsova/images';
?>
<link rel="stylesheet" href="/local/templates/main/template_styles.css">
<link rel="stylesheet" href="/projects/tekhnika-igry-na-violoncheli-kirilla-kravtsova/style.css">

<section class="hero-secondary tech-hero">
    <div class="hero-secondary__bg">
        <img src="<?= $img ?>/hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/projects/">Наши проекты</a> / Медиапроект · 2025</p>
        <h1 class="hero-secondary__title">Техника игры на виолончели<br>Кирилла Кравцова</h1>
        <p class="hero-secondary__subtitle">Короткие видеоуроки о технических приёмах и основах работы правой и левой руки.</p>
        <a href="#lessons" class="btn btn--primary">Смотреть видеоуроки</a>
    </div>
</section>

<section class="tech-intro">
    <div class="section__container tech-intro__grid">
        <div>
            <p>«Техника игры на виолончели» — первый медиапроект Виолончельной академии, вышедший в 2025 году. В серии коротких видеоуроков Кирилл Кравцов простым языком объясняет технические приёмы и основы работы правой и левой руки. Практические пояснения и наглядный показ делают материал понятным и детям, и взрослым.</p>
            <p>Уроки можно использовать в самостоятельной работе и как дополнительный материал к занятиям с преподавателем.</p>
        </div>
        <aside>
            <h2 class="tech-focus__title">В фокусе</h2>
            <div class="tech-tags">
                <span>Правая рука</span>
                <span>Левая рука</span>
                <span>Технические приёмы</span>
            </div>
            <p class="tech-muted">Первый медиапроект Академии</p>
        </aside>
    </div>
</section>

<section class="tech-who">
    <div class="section__container">
        <h2 class="section__title">Для кого этот проект</h2>
        <p class="tech-muted">Проект адресован</p>
        <div class="tech-who__grid">
            <article>
                <p class="tech-who__num">01</p>
                <p>Учащимся музыкальных школ</p>
            </article>
            <article>
                <p class="tech-who__num">02</p>
                <p>Педагогам</p>
            </article>
            <article>
                <p class="tech-who__num">03</p>
                <p>Профессиональным виолончелистам</p>
            </article>
        </div>
        <p class="tech-who__note">Для тех, кто хочет вернуться к основам техники и внимательнее разобраться в привычных исполнительских движениях.</p>
    </div>
</section>

<section class="tech-lessons" id="lessons">
    <div class="section__container">
        <div class="section__header">
            <div>
                <h2 class="section__title">Видеоуроки</h2>
                <p class="tech-muted">Серия коротких видеоуроков Кирилла Кравцова</p>
            </div>
            <a href="#" class="section__link">Весь плейлист</a>
        </div>
        <div class="tech-lessons__grid">
            <article class="tech-lesson tech-lesson--main">
                <a href="#" class="tech-lesson__media">
                    <img src="<?= $img ?>/video-main.jpg" alt="">
                    <span class="tech-play" aria-hidden="true"></span>
                </a>
                <p class="tech-lesson__caption"><span>Видеоурок</span> Название видеоурока</p>
            </article>
            <div class="tech-lessons__side">
                <?php for ($i = 0; $i < 3; $i++): ?>
                <article class="tech-lesson">
                    <a href="#" class="tech-lesson__media">
                        <img src="<?= $img ?>/video-side.jpg" alt="">
                        <span class="tech-play" aria-hidden="true"></span>
                    </a>
                    <p class="tech-lesson__caption"><span>Видеоурок</span> Название видеоурока</p>
                </article>
                <?php endfor; ?>
            </div>
        </div>
        <a href="#" class="btn btn--primary">Смотреть весь плейлист</a>
    </div>
</section>

<section class="tech-watch">
    <div class="section__container">
        <h2 class="section__title">Где смотреть</h2>
        <p class="tech-muted">Видео опубликованы на площадках Академии</p>
        <div class="tech-watch__grid">
            <a href="#">ВКонтакте <span aria-hidden="true">↗</span></a>
            <a href="#">YouTube <span aria-hidden="true">↗</span></a>
            <a href="#">RUTUBE <span aria-hidden="true">↗</span></a>
            <a href="#">Яндекс Дзен <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>

<section class="tech-author">
    <div class="section__container tech-author__grid">
        <img src="<?= $img ?>/portrait.jpg" alt="Кирилл Кравцов">
        <div>
            <p class="tech-author__label">Автор и преподаватель курса</p>
            <h2 class="section__title section__title--light">Кирилл Кравцов</h2>
            <p>Виолончелист, педагог, лауреат международных конкурсов, создатель и руководитель Rastrelli Cello Quartet.</p>
            <p class="tech-author__bio">Выпускник Санкт-Петербургской консерватории по классу Анатолия Никитина, совершенствовал мастерство в Высшей школе музыки Штутгарта у Петера Бука.</p>
            <p class="tech-author__bio">Преподавал в Санкт-Петербургской консерватории и Санкт-Петербургском государственном университете культуры и искусств, проводил мастер-классы в Европе, США, Бразилии и Азии.</p>
            <p>Виолончелист, педагог, лауреат международных конкурсов, создатель и руководитель Rastrelli Cello Quartet.</p>
        </div>
    </div>
</section>

<section class="tech-follow">
    <div class="section__container tech-follow__grid">
        <div>
            <p class="tech-follow__label">Смотрите также</p>
            <a href="#" class="tech-chip">Видеоархив</a>
            <a href="#" class="tech-chip">Медиацентр</a>
            <a href="/afisha/" class="tech-chip">Афиша</a>
        </div>
        <article class="tech-manager">
            <p class="tech-manager__label">Менеджер проекта</p>
            <div class="tech-manager__row">
                <span class="tech-manager__avatar" aria-hidden="true"></span>
                <a href="#" class="tech-manager__name">Имя менеджера <span aria-hidden="true">↗</span></a>
            </div>
            <p class="tech-manager__role">Менеджер проекта</p>
            <a href="#" class="section__link">Руководство и команда Академии</a>
        </article>
    </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
