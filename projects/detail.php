<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Летняя резиденция для молодых виолончелистов');
$APPLICATION->SetPageProperty('title', 'Летняя резиденция — Проекты');
?>
<link rel="stylesheet" href="/local/templates/main/css/project-detail.css">

<section class="hero-secondary hero-secondary--project">
    <div class="hero-secondary__bg">
        <img src="/assets/images/project-detail/hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/projects/">Проекты</a></p>
        <h1 class="hero-secondary__title">Летняя резиденция<br>для молодых виолончелистов</h1>
        <p class="project-hero__kind">Образовательный интенсив</p>
        <p class="hero-secondary__subtitle">Десять дней интенсивной работы с педагогами Академии, ансамблевые репетиции и завершающий концерт.</p>
        <a href="#conditions" class="btn btn--outline">Условия отбора</a>
    </div>
</section>

<section class="project-about">
    <div class="section__container project-about__grid">
        <div class="project-about__text">
            <h2 class="project-about__heading">О проекте</h2>
            <p>Резиденция объединяет молодых виолончелистов 14–22 лет со всей России для интенсивной работы с педагогами-солистами Академии. Программа включает индивидуальные занятия, ансамблевые репетиции и подготовку к завершающему концерту.</p>

            <h2 class="project-about__heading">История</h2>
            <p>Проект запущен в 2023 году как летняя школа для 12 участников; к 2026 году программа выросла до трёх смен и собственной резиденции в Суздале.</p>
        </div>
        <aside class="project-details">
            <h2 class="project-details__title">Детали</h2>
            <dl class="project-details__list">
                <div>
                    <dt>Даты</dt>
                    <dd>3–14 сентября</dd>
                </div>
                <div>
                    <dt>Место</dt>
                    <dd>Суздаль</dd>
                </div>
                <div>
                    <dt>Участники</dt>
                    <dd>14–22 года</dd>
                </div>
                <div>
                    <dt>Формат</dt>
                    <dd>очно, отбор по заявке</dd>
                </div>
            </dl>
            <svg class="project-details__line" viewBox="0 0 420 80" fill="none" aria-hidden="true">
                <path d="M20 50C90 10 180 70 260 36C320 12 370 28 410 18" stroke="#981B2F" stroke-width="1.4"/>
            </svg>
        </aside>
    </div>
</section>

<section class="project-people">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title section__title--light">Участники и педагоги</h2>
            <a href="/community/" class="section__link section__link--light">Смотреть все</a>
        </div>
        <div class="project-people__grid">
            <article class="project-person">
                <a href="/community/" class="project-person__link">
                    <span class="project-person__photo"><img src="/assets/images/project-detail/person-ramm.jpg" alt="А. Рамм"></span>
                    <span class="project-person__name">А. Рамм <span aria-hidden="true">↗</span></span>
                    <span class="project-person__role">Педагог</span>
                </a>
            </article>
            <article class="project-person">
                <a href="/community/" class="project-person__link">
                    <span class="project-person__photo"><img src="/assets/images/project-detail/person-markevich.jpg" alt="А. Маркевич"></span>
                    <span class="project-person__name">А. Маркевич <span aria-hidden="true">↗</span></span>
                    <span class="project-person__role">Педагог</span>
                </a>
            </article>
            <article class="project-person">
                <a href="/community/" class="project-person__link">
                    <span class="project-person__photo"><img src="/assets/images/project-detail/person-andrianov.jpg" alt="Б. Андрианов"></span>
                    <span class="project-person__name">Б. Андрианов <span aria-hidden="true">↗</span></span>
                    <span class="project-person__role">Педагог</span>
                </a>
            </article>
            <article class="project-person">
                <a href="/community/" class="project-person__link">
                    <span class="project-person__photo"><img src="/assets/images/project-detail/person-evlanov.jpg" alt="Т. Евланов"></span>
                    <span class="project-person__name">Т. Евланов <span aria-hidden="true">↗</span></span>
                    <span class="project-person__role">Участник набора</span>
                </a>
            </article>
        </div>
    </div>
</section>

<section class="project-gallery">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title">Фотогалерея</h2>
            <a href="/mediacenter/photo/" class="section__link">Смотреть все</a>
        </div>
        <div class="project-gallery__row project-gallery__row--top">
            <img src="/assets/images/project-detail/gallery-1.jpg" alt="">
            <img src="/assets/images/project-detail/gallery-2.jpg" alt="">
            <img src="/assets/images/project-detail/gallery-3.jpg" alt="">
        </div>
        <div class="project-gallery__row project-gallery__row--bottom">
            <img src="/assets/images/project-detail/gallery-4.jpg" alt="">
            <img src="/assets/images/project-detail/gallery-5.jpg" alt="">
            <img src="/assets/images/project-detail/gallery-6.jpg" alt="">
        </div>
    </div>
</section>

<section class="project-videos">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title">Видео</h2>
            <a href="#" class="section__link">Смотреть все</a>
        </div>
        <div class="project-videos__grid">
            <article class="project-video">
                <a href="#" class="project-video__media">
                    <img src="/assets/images/project-detail/video-1.jpg" alt="">
                    <span class="project-video__play" aria-hidden="true"></span>
                </a>
                <p class="news-card__date">14 августа 2026</p>
                <h3 class="project-video__title">«Летняя резиденция для молодых виолончелистов»</h3>
            </article>
            <article class="project-video">
                <a href="#" class="project-video__media">
                    <img src="/assets/images/project-detail/video-2.jpg" alt="">
                    <span class="project-video__play" aria-hidden="true"></span>
                </a>
                <p class="news-card__date">28 июня 2026</p>
                <h3 class="project-video__title">Видео с выступления участников Академии</h3>
            </article>
            <article class="project-video">
                <a href="#" class="project-video__media">
                    <img src="/assets/images/project-detail/video-3.jpg" alt="">
                    <span class="project-video__play" aria-hidden="true"></span>
                </a>
                <p class="news-card__date">28 июня 2026</p>
                <h3 class="project-video__title">Выступления участников Академии</h3>
            </article>
            <article class="project-video">
                <a href="#" class="project-video__media">
                    <img src="/assets/images/project-detail/video-4.jpg" alt="">
                    <span class="project-video__play" aria-hidden="true"></span>
                </a>
                <p class="news-card__date">28 июня 2026</p>
                <h3 class="project-video__title">Запись концерта «Летняя резиденция виолончелистов»</h3>
            </article>
        </div>
    </div>
</section>

<section class="project-news">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title section__title--light">Новости о проекте</h2>
            <a href="/news/" class="section__link section__link--light">Смотреть все</a>
        </div>
        <ul class="project-news__list">
            <li class="project-news__item">
                <div>
                    <p class="project-news__date">10 июля 2026</p>
                    <h3 class="project-news__title">Итоги весенней серии мастер-классов</h3>
                </div>
                <a href="/news/" class="btn btn--outline-sm project-news__more">Подробнее</a>
            </li>
            <li class="project-news__item">
                <div>
                    <p class="project-news__date">10 июля 2026</p>
                    <h3 class="project-news__title">Интервью с профессором Александром Князевым</h3>
                </div>
                <a href="/news/" class="btn btn--outline-sm project-news__more">Подробнее</a>
            </li>
            <li class="project-news__item">
                <div>
                    <p class="project-news__date">2 июля 2026</p>
                    <h3 class="project-news__title">Открыт набор в резиденцию 2026</h3>
                </div>
                <a href="/news/" class="btn btn--outline-sm project-news__more">Подробнее</a>
            </li>
        </ul>
    </div>
</section>

<section class="project-events" id="conditions">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title">Другие мероприятия</h2>
            <a href="/afisha/" class="section__link">Вся афиша</a>
        </div>
        <div class="project-events__grid">
            <article class="project-event">
                <a href="/afisha/" class="project-event__link">
                    <img src="/assets/images/project-detail/event-1.jpg" alt="">
                    <span>
                        <span class="project-event__title">Лекция: история виолончели</span>
                        <span class="project-event__text">Открытая лекция для широкой аудитории.</span>
                    </span>
                </a>
            </article>
            <article class="project-event">
                <a href="/afisha/" class="project-event__link">
                    <img src="/assets/images/project-detail/event-2.jpg" alt="">
                    <span>
                        <span class="project-event__title">ВВА в регионах: Казань</span>
                        <span class="project-event__text">Гастрольный концерт молодых лауреатов.</span>
                    </span>
                </a>
            </article>
            <article class="project-event">
                <a href="/afisha/" class="project-event__link">
                    <img src="/assets/images/project-detail/event-3.jpg" alt="">
                    <span>
                        <span class="project-event__title">Финал конкурса VIVACELLO</span>
                        <span class="project-event__text">Молодые виолончелисты со всей России.</span>
                    </span>
                </a>
            </article>
        </div>
    </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
