<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('История виолончельного исполнительства');
$APPLICATION->SetPageProperty('title', 'История виолончельного исполнительства — Проекты');
$img = '/projects/istoriya-violonchelnogo-ispolnitelstva/images';
?>
<link rel="stylesheet" href="/local/templates/main/template_styles.css">
<link rel="stylesheet" href="/projects/istoriya-violonchelnogo-ispolnitelstva/style.css">

<section class="hero-secondary hist-hero">
    <div class="hero-secondary__bg">
        <img src="<?= $img ?>/hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/projects/">Наши проекты</a> / Авторский цикл лекций Татьяны Лукашиной</p>
        <h1 class="hero-secondary__title">История виолончельного<br>исполнительства</h1>
        <p class="hero-secondary__subtitle">От эпохи виолы да гамба и первых виолончелистов до современных музыкальных традиций.</p>
        <a href="#lectures" class="btn btn--primary">Смотреть лекции</a>
    </div>
</section>

<section class="hist-intro">
    <div class="section__container hist-intro__grid">
        <div>
            <p class="hist-lead">«История виолончельного исполнительства» — авторский цикл лекций Татьяны Лукашиной. Проект посвящён истории инструмента и исполнительского искусства: от эпохи виолы да гамба и первых виолончелистов до современных музыкальных традиций.</p>
            <p>В центре лекций — музыканты, чьи творческие открытия определили развитие виолончельного искусства. Через их судьбы, сочинения и педагогическую деятельность раскрывается история исполнительских школ, становления репертуара и расширения возможностей инструмента. Первые выпуски знакомят зрителей с зарождением виолончельного исполнительства и итальянскими мастерами Доменико Габриелли и Джованни Бонончини.</p>
        </div>
        <div class="hist-seasons">
            <article class="hist-season hist-season--done">
                <h2>Первый сезон</h2>
                <p>Уже опубликован</p>
            </article>
            <article class="hist-season">
                <h2>Второй сезон</h2>
                <p>Идут съёмки</p>
            </article>
        </div>
    </div>
</section>

<section class="hist-who">
    <div class="section__container">
        <h2 class="section__title">Для кого этот цикл</h2>
        <p class="hist-muted">Цикл адресован</p>
        <div class="hist-tags">
            <span>Учащимся</span>
            <span>Студентам</span>
            <span>Педагогам</span>
            <span>Профессиональным исполнителям</span>
            <span class="hist-tags__wide">Всем, кто интересуется виолончелью и историей музыки</span>
        </div>
        <p>Лекции помогают увидеть знакомые произведения в контексте своей эпохи и познакомиться с музыкантами, чьё наследие заслуживает большего внимания.</p>
    </div>
</section>

<section class="hist-lectures" id="lectures">
    <div class="section__container">
        <div class="section__header">
            <div>
                <h2 class="section__title">Лекции первого сезона</h2>
                <p class="hist-muted">Плейлист вышедших лекций</p>
            </div>
            <a href="#" class="section__link">Весь плейлист</a>
        </div>
        <div class="hist-lectures__grid">
            <article class="hist-lecture hist-lecture--main">
                <a href="#" class="hist-lecture__media">
                    <img src="<?= $img ?>/video-main.jpg" alt="">
                    <span class="hist-play" aria-hidden="true"></span>
                </a>
                <p class="hist-lecture__caption"><span>Выпуск 1</span> Название лекции</p>
            </article>
            <div class="hist-lectures__side">
                <?php foreach ([2, 3, 4] as $n): ?>
                <article class="hist-lecture">
                    <a href="#" class="hist-lecture__media">
                        <img src="<?= $img ?>/video-side.jpg" alt="">
                        <span class="hist-play" aria-hidden="true"></span>
                    </a>
                    <p class="hist-lecture__caption"><span>Выпуск <?= $n ?></span> Название лекции</p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <a href="#" class="btn btn--primary">Смотреть весь плейлист</a>
    </div>
</section>

<section class="hist-author">
    <div class="section__container hist-author__grid">
        <img src="<?= $img ?>/portrait.jpg" alt="Татьяна Алексеевна Лукашина">
        <div>
            <p class="hist-author__label">Лектор</p>
            <h2 class="section__title section__title--light">Татьяна Алексеевна<br>Лукашина</h2>
            <p>Виолончелистка, педагог, доцент кафедры истории и теории исполнительского искусства Московской государственной консерватории имени П. И. Чайковского и Государственного музыкально-педагогического института имени М. М. Ипполитова-Иванова.</p>
            <p class="hist-author__bio">Окончила Московскую консерваторию и ассистентуру-стажировку по специальности «виолончель».</p>
            <p>Автор методических пособий, нотных сборников, учебных программ и научных статей, научный руководитель Института исследований и методологии виолончельного искусства Виолончельной академии.</p>
        </div>
    </div>
</section>

<section class="hist-photos">
    <div class="section__container">
        <div class="section__header">
            <div>
                <h2 class="section__title">Фотографии</h2>
                <p class="hist-muted">Съёмки цикла</p>
            </div>
            <a href="#" class="section__link">Весь альбом</a>
        </div>
        <div class="hist-photos__grid">
            <img src="<?= $img ?>/photo-1.jpg" alt="">
            <img src="<?= $img ?>/photo-2.jpg" alt="">
            <img src="<?= $img ?>/photo-3.jpg" alt="">
        </div>
    </div>
</section>

<section class="hist-follow">
    <div class="section__container hist-follow__grid">
        <div>
            <p class="hist-follow__label">Институт исследований и методологии</p>
            <h2 class="section__title">Проект Института виолончельного искусства</h2>
            <p>Проект реализуется в рамках деятельности Института исследований и методологии виолончельного искусства Виолончельной академии. Узнать больше об институте, его задачах и проектах можно на отдельной странице.</p>
            <a href="/academy/institute/" class="btn btn--primary">Подробнее об институте</a>
        </div>
        <article class="hist-manager">
            <p class="hist-manager__label">Менеджер проекта</p>
            <div class="hist-manager__row">
                <span class="hist-manager__avatar" aria-hidden="true"></span>
                <a href="#" class="hist-manager__name">Имя менеджера <span aria-hidden="true">↗</span></a>
            </div>
            <p class="hist-manager__role">Менеджер проекта</p>
            <a href="#" class="section__link">Руководство и команда Академии</a>
        </article>
    </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
