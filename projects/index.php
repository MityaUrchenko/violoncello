<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Проекты');
$APPLICATION->SetPageProperty('title', 'Проекты — Всероссийская виолончельная академия');
?>

<section class="hero-secondary hero-secondary--projects">
    <div class="hero-secondary__bg">
        <img src="/assets/images/about-hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Проекты</h1>
        <p class="hero-secondary__subtitle">Образовательные, концертные и региональные инициативы Академии — от резиденций для молодых музыкантов до лаборатории свободного творчества</p>
    </div>
</section>

<section class="projects-page">
    <div class="section__container">
        <div class="projects-page__grid">

            <article class="project-tile">
                <a href="/projects/zvezdy-vva/" class="project-tile__link">
                    <div class="project-tile__image">
                        <img src="/assets/images/project1.jpg" alt="Звёзды Всероссийской виолончельной академии" loading="lazy">
                    </div>
                    <div class="project-tile__content">
                        <h2 class="project-tile__title">Звёзды Всероссийской виолончельной академии</h2>
                        <p class="project-tile__category">Концертный цикл</p>
                        <p class="project-tile__desc">Серия концертов с участием ведущих виолончелистов и молодых талантов.</p>
                        <span class="project-tile__more">Подробнее</span>
                    </div>
                </a>
            </article>

            <article class="project-tile">
                <a href="/projects/v-regionah/" class="project-tile__link">
                    <div class="project-tile__image">
                        <img src="/assets/images/about-space.jpg" alt="Всероссийская виолончельная академия в регионах" loading="lazy">
                    </div>
                    <div class="project-tile__content">
                        <h2 class="project-tile__title">Всероссийская виолончельная академия в регионах</h2>
                        <p class="project-tile__category">Региональная программа</p>
                        <p class="project-tile__desc">Гастроли, мастер-классы и образовательные проекты в городах России.</p>
                        <span class="project-tile__more">Подробнее</span>
                    </div>
                </a>
            </article>

            <article class="project-tile">
                <a href="/projects/mezhdunarodnye-obmeny/" class="project-tile__link">
                    <div class="project-tile__image">
                        <img src="/assets/images/project2.jpg" alt="Международные обмены" loading="lazy">
                    </div>
                    <div class="project-tile__content">
                        <h2 class="project-tile__title">Международные обмены</h2>
                        <p class="project-tile__category">Международный проект</p>
                        <p class="project-tile__desc">Партнёрства с зарубежными школами и совместные резиденции.</p>
                        <span class="project-tile__more">Подробнее</span>
                    </div>
                </a>
            </article>

            <article class="project-tile">
                <a href="/projects/letniy-festival/" class="project-tile__link">
                    <div class="project-tile__image">
                        <img src="/assets/images/project3.jpg" alt="Летний виолончельный фестиваль" loading="lazy">
                    </div>
                    <div class="project-tile__content">
                        <h2 class="project-tile__title">Летний виолончельный фестиваль</h2>
                        <p class="project-tile__category">Фестиваль</p>
                        <p class="project-tile__desc">Концерты, резиденция и завершающий гала-вечер.</p>
                        <span class="project-tile__more">Подробнее</span>
                    </div>
                </a>
            </article>

            <article class="project-tile">
                <a href="/projects/novaya-shkola/" class="project-tile__link">
                    <div class="project-tile__image">
                        <img src="/assets/images/about-ensemble.jpg" alt="Новая школа" loading="lazy">
                    </div>
                    <div class="project-tile__content">
                        <h2 class="project-tile__title">Новая школа</h2>
                        <p class="project-tile__category">Образовательная программа</p>
                        <p class="project-tile__desc">Современный образовательный подход для юных виолончелистов.</p>
                        <span class="project-tile__more">Подробнее</span>
                    </div>
                </a>
            </article>

            <article class="project-tile">
                <a href="/projects/secret-room/" class="project-tile__link">
                    <div class="project-tile__image">
                        <img src="/assets/images/academy_people.jpg" alt="Secret Room" loading="lazy">
                    </div>
                    <div class="project-tile__content">
                        <h2 class="project-tile__title">Secret Room</h2>
                        <p class="project-tile__category">Камерный формат</p>
                        <p class="project-tile__desc">Закрытые концерты в нестандартных пространствах.</p>
                        <span class="project-tile__more">Подробнее</span>
                    </div>
                </a>
            </article>

        </div>
    </div>
</section>

<section class="projects-banner">
    <div class="section__container">
        <div class="projects-banner__inner">
            <div class="projects-banner__text">
                <p class="projects-banner__label">Лаборатория свободного творчества</p>
                <h2 class="projects-banner__title">VIVACELLO</h2>
            </div>
            <div class="projects-banner__line" aria-hidden="true"></div>
            <a href="/projects/vivacello/" class="projects-banner__link">Подробнее</a>
        </div>
    </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
