<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Новая школа');
$APPLICATION->SetPageProperty('title', 'Новая школа — Проекты');
?>
<link rel="stylesheet" href="/local/templates/main/template_styles.css">
<link rel="stylesheet" href="/projects/novaya-shkola/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1.15/dist/fancybox/fancybox.css">

<section class="hero-secondary">
    <div class="hero-secondary__bg">
        <img src="/projects/novaya-shkola/images/hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/projects/">Наши проекты</a> / Образовательный проект</p>
        <h1 class="hero-secondary__title">Новая школа</h1>
        <p class="hero-secondary__subtitle">Проект Виолончельной академии о новом поколении исполнителей и педагогов.
            Открытые мастер-классы музыкантов в возрасте от 20 до 35 лет.</p>
        <a href="#" class="btn btn--primary">Перейти на сайт проекта</a>
    </div>
</section>

<section class="section__container mt-5">
    <div class="academy-sections__grid">
        <div class="academy-section-card">
            <span class="academy-section-card__title">20 — 35 лет</span>
            <span class="about-directions__card-text">возраст педагогов</span>
            <span class="academy-section-card__line"></span>
        </div>
        <div class="academy-section-card">
            <span class="academy-section-card__title">15</span>
            <span class="about-directions__card-text">исполнителей и педагогов</span>
            <span class="academy-section-card__line"></span>
        </div>
        <div class="academy-section-card">
            <span class="academy-section-card__title">5</span>
            <span class="about-directions__card-text">специальностей</span>
            <span class="academy-section-card__line"></span>
        </div>
        <div class="academy-section-card">
            <span class="academy-section-card__title">2025-2026</span>
            <span class="about-directions__card-text">первый сезон</span>
            <span class="academy-section-card__line"></span>
        </div>
    </div>
</section>
<section class="ns-about">
    <div class="section__container ns-about__grid">
        <div class="ns-about__text">
            <p class="ns-about__lead">«Новая школа» объединяет музыкантов, которые уже заявили о себе на концертной
                сцене и в преподавании, и предоставляет им площадку для передачи профессионального опыта в формате
                открытых мастер-классов.</p>
            <p>Задача проекта — поддержать профессиональное становление молодых педагогов и познакомить учащихся,
                коллег и публику с их подходами к преподаванию. «Новая школа» продолжает традицию обмена
                исполнительским и педагогическим опытом, предоставляя слово музыкантам, которые сегодня активно
                выступают, развивают собственные методы работы и начинают формировать следующий круг учеников.</p>
            <p>Работа с молодыми педагогами позволяет получить свежий исполнительский взгляд на репертуар, обсудить
                технические и художественные задачи, а также обратиться к недавнему опыту обучения, конкурсной
                подготовки и концертных выступлений. Близость поколений способствует свободному профессиональному
                диалогу.</p>
            <p>Для слушателей, в том числе преподавателей, открытые занятия — возможность наблюдать за работой
                коллег и знакомиться с различными способами объяснения и решения исполнительских задач.</p>
        </div>
        <aside class="ns-notes">
            <article class="ns-note">
                <h2>Как проходят мастер-классы</h2>
                <p>Камерный зал Виолончельной академии, Москва. Индивидуальные занятия, открытые для слушателей.</p>
            </article>
            <article class="ns-note">
                <h2>Кто может участвовать</h2>
                <p>Учащиеся музыкальных школ, колледжей и училищ, студенты вузов, выпускники и работающие музыканты.
                    Отбор проводится по видеозаписям.</p>
            </article>
        </aside>
    </div>
</section>

<section class="ns-videos">
    <div class="section__container">
        <div class="section__header">
            <div>
                <h2 class="section__title section__title--light">Видео-визитки педагогов</h2>
                <p class="ns-videos__lead">Небольшие интервью: творческий путь и профессиональные взгляды
                    музыкантов</p>
            </div>
            <a href="#" class="section__link section__link--light">Смотреть все</a>
        </div>
        <div class="ns-videos__grid">
            <?php
            $videos = [
                    'Мария Зайцева',
                    'Ключко',
                    'Иван Сендецкий',
                    'Усов',
                    'Павел Романенко',
                    'Василий Степанов',
            ];
            foreach ($videos as $name):
                ?>
                <article class="ns-video">
                    <a href="#" class="ns-video__media">
                        <img src="/projects/novaya-shkola/images/video.jpg" alt="">
                        <span class="ns-video__play" aria-hidden="true"></span>
                    </a>
                    <p class="ns-video__caption"><span>Видео-визитка</span> <?= htmlspecialcharsbx($name) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ns-teachers">
    <div class="section__container">
        <h2 class="section__title">Преподаватели «Новой школы»</h2>
        <p class="ns-teachers__season">Первый сезон, 2025–2026</p>
        <ul class="ns-teachers__list">
            <li class="ns-teacher">
                <img src="/projects/novaya-shkola/images/teacher-skanavi.jpg" alt="Иван Сканави">
                <div class="ns-teacher__who">
                    <a href="#" class="ns-teacher__name">Иван Сканави <span aria-hidden="true">↗</span></a>
                    <p>виолончель</p>
                </div>
                <p class="ns-teacher__bio">Преподаватель Венского университета музыки и исполнительского искусства,
                    победитель Grand-Prix Emanuel Feuermann 2022 в Берлине</p>
            </li>
            <li class="ns-teacher">
                <img src="/projects/novaya-shkola/images/teacher-zaitseva.jpg" alt="Мария Зайцева">
                <div class="ns-teacher__who">
                    <a href="#" class="ns-teacher__name">Мария Зайцева <span aria-hidden="true">↗</span></a>
                    <p>виолончель</p>
                </div>
                <p class="ns-teacher__bio">Победитель 73-го Международного музыкального конкурса ARD, лауреат II
                    премии XVII Международного конкурса имени П. И. Чайковского, лауреат Конкурса имени Королевы
                    Елизаветы (2026)</p>
            </li>
            <li class="ns-teacher">
                <img src="/projects/novaya-shkola/images/teacher-sendetsky.jpg" alt="Иван Сендецкий">
                <div class="ns-teacher__who">
                    <a href="#" class="ns-teacher__name">Иван Сендецкий <span aria-hidden="true">↗</span></a>
                    <p>виолончель</p>
                </div>
                <p class="ns-teacher__bio">Преподаватель РАМ имени Гнесиных и Центральной музыкальной школы —
                    Академии исполнительского искусства, лауреат VI премии XVII Международного конкурса имени П. И.
                    Чайковского</p>
            </li>
            <li class="ns-teacher">
                <img src="/projects/novaya-shkola/images/teacher-stepanov.jpg" alt="Василий Степанов">
                <div class="ns-teacher__who">
                    <a href="#" class="ns-teacher__name">Василий Степанов <span aria-hidden="true">↗</span></a>
                    <p>виолончель</p>
                </div>
                <p class="ns-teacher__bio">Лауреат Конкурса имени Королевы Елизаветы (2026), лауреат IV премии XVII
                    Международного конкурса имени П. И. Чайковского, аспирант Королевской академии музыки (Лондон,
                    Великобритания)</p>
            </li>
            <li class="ns-teacher">
                <img src="/projects/novaya-shkola/images/teacher-yashin.jpg" alt="Илья Яшин">
                <div class="ns-teacher__who">
                    <a href="#" class="ns-teacher__name">Илья Яшин <span aria-hidden="true">↗</span></a>
                    <p>виолончель</p>
                </div>
                <p class="ns-teacher__bio">Преподаватель Международной школы Цинхуа (Пекин, Китай), лауреат
                    международных конкурсов</p>
            </li>
        </ul>
    </div>
</section>

<section class="ns-more">
    <div class="section__container ns-more__inner">
        <div>
            <p class="ns-more__note">Ещё 10 педагогов · скрипка, альт, фортепиано, кларнет</p>
            <p class="ns-more__title">Остальных педагогов первого сезона <br>смотрите на сайте проекта</p>
        </div>
        <a href="/community/" class="btn btn--primary">Все педагоги</a>
    </div>
</section>

<section class="ns-photos">
    <div class="section__container">
        <div class="section__header">
            <div>
                <h2 class="section__title">Фотографии с мастер-классов первого сезона</h2>
                <p class="ns-photos__place">Камерный зал Виолончельной академии</p>
            </div>
            <a href="/mediacenter/photo/?year=2023&project=&event=7" class="section__link">Смотреть все</a>
        </div>
        <div class="ns-photos__grid">
            <a href="/projects/novaya-shkola/images/photo-main.jpg" data-fancybox="novaya-shkola-photos" data-caption="Фотографии с мастер-классов первого сезона">
                <img src="/projects/novaya-shkola/images/photo-main.jpg" alt="Фотографии с мастер-классов первого сезона">
            </a>
            <a href="/projects/novaya-shkola/images/photo-2.jpg" data-fancybox="novaya-shkola-photos" data-caption="Мастер-класс первого сезона">
                <img src="/projects/novaya-shkola/images/photo-2.jpg" alt="Мастер-класс первого сезона">
            </a>
            <a href="/projects/novaya-shkola/images/photo-3.jpg" data-fancybox="novaya-shkola-photos" data-caption="Мастер-класс первого сезона">
                <img src="/projects/novaya-shkola/images/photo-3.jpg" alt="Мастер-класс первого сезона">
            </a>
            <a href="/projects/novaya-shkola/images/photo-4.jpg" data-fancybox="novaya-shkola-photos" data-caption="Мастер-класс первого сезона">
                <img src="/projects/novaya-shkola/images/photo-4.jpg" alt="Мастер-класс первого сезона">
            </a>
            <a href="/projects/novaya-shkola/images/photo-5.jpg" data-fancybox="novaya-shkola-photos" data-caption="Мастер-класс первого сезона">
                <img src="/projects/novaya-shkola/images/photo-5.jpg" alt="Мастер-класс первого сезона">
            </a>
        </div>
    </div>
</section>

<section class="ns-albums">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title">Альбомы мастер-классов</h2>
            <a href="/mediacenter/photo/?project=3&amp;event=7" class="section__link">Смотреть все</a>
        </div>
    </div>
    <?php
    global $arrFilterNovayaShkolaAlbums;
    $arrFilterNovayaShkolaAlbums = [
        [
            'LOGIC' => 'OR',
            ['PROPERTY_PROJECT' => '3'],
            ['PROPERTY_PROJECT_VALUE' => '3'],
        ],
        [
            'LOGIC' => 'OR',
            ['PROPERTY_EVENT' => '7'],
            ['PROPERTY_EVENT_VALUE' => '7'],
        ],
    ];

    $APPLICATION->IncludeComponent(
        'bitrix:news.list',
        'photo_chronicle',
        [
            'IBLOCK_TYPE' => 'content',
            'IBLOCK_ID' => '6',
            'NEWS_COUNT' => '3',
            'SORT_BY1' => 'ACTIVE_FROM',
            'SORT_ORDER1' => 'DESC',
            'SORT_BY2' => 'SORT',
            'SORT_ORDER2' => 'ASC',
            'FILTER_NAME' => 'arrFilterNovayaShkolaAlbums',
            'FIELD_CODE' => ['NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DATE_ACTIVE_FROM', 'DETAIL_PAGE_URL'],
            'PROPERTY_CODE' => ['PHOTOS', 'PROJECT', 'EVENT'],
            'CHECK_DATES' => 'Y',
            'DETAIL_URL' => '/mediacenter/photo/detail.php?ID=#ELEMENT_ID#',
            'AJAX_MODE' => 'N',
            'CACHE_TYPE' => 'A',
            'CACHE_TIME' => '3600',
            'CACHE_FILTER' => 'Y',
            'CACHE_GROUPS' => 'Y',
            'PREVIEW_TRUNCATE_LEN' => '',
            'ACTIVE_DATE_FORMAT' => 'j F Y',
            'SET_TITLE' => 'N',
            'SET_BROWSER_TITLE' => 'N',
            'SET_META_KEYWORDS' => 'N',
            'SET_META_DESCRIPTION' => 'N',
            'SET_LAST_MODIFIED' => 'N',
            'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
            'ADD_SECTIONS_CHAIN' => 'N',
            'HIDE_LINK_WHEN_NO_DETAIL' => 'N',
            'PARENT_SECTION' => '',
            'PARENT_SECTION_CODE' => '',
            'INCLUDE_SUBSECTIONS' => 'Y',
            'STRICT_SECTION_CHECK' => 'N',
            'PAGER_TEMPLATE' => '.default',
            'DISPLAY_TOP_PAGER' => 'N',
            'DISPLAY_BOTTOM_PAGER' => 'N',
            'PAGER_TITLE' => 'Альбомы',
            'PAGER_SHOW_ALWAYS' => 'N',
            'PAGER_DESC_NUMBERING' => 'N',
            'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000',
            'PAGER_SHOW_ALL' => 'N',
            'PHOTO_PROPERTY' => 'PHOTOS',
            'PROJECT_PROPERTY' => 'PROJECT',
            'EVENT_PROPERTY' => 'EVENT',
            'SET_STATUS_404' => 'N',
            'SHOW_404' => 'N',
            'MESSAGE_404' => '',
        ],
        false
    );
    ?>
</section>

<section class="ns-next">
    <div class="section__container aud-follow__grid">
        <div>
            <p class="ns-next__label">Продолжение следует</p>
            <h2 class="ns-next__title">Второй сезон «Новой школы»</h2>
            <p>Проект получит продолжение. Сроки проведения и программа будут объявлены позднее.</p>
        </div>
        <article class="aud-manager">
            <p class="aud-manager__label">Менеджер проекта</p>
            <div class="aud-manager__row">
                <span class="aud-manager__avatar" aria-hidden="true"></span>
                <a href="#" class="aud-manager__name">Имя менеджера <span aria-hidden="true">↗</span></a>
            </div>
            <p class="aud-manager__role">Менеджер проекта</p>
            <a href="#" class="section__link">Руководство и команда Академии</a>
        </article>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1.15/dist/fancybox/fancybox.umd.js"></script>
<script>
    if (window.Fancybox) {
        Fancybox.bind('[data-fancybox="novaya-shkola-photos"]', {
            Hash: false
        });
    }
</script>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
