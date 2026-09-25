<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
$APPLICATION->SetAdditionalCSS('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
$APPLICATION->SetAdditionalCSS('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
$APPLICATION->AddHeadScript('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');
$APPLICATION->AddHeadScript('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Контакты');
$APPLICATION->SetPageProperty('title', 'Контакты — Всероссийская виолончельная академия');
?>
<!-- Contacts Hero -->
    <section class="hero-secondary">
        <div class="hero-secondary__bg">
            <img src="/assets/images/hero_img_dark.png" alt="" class="hero-secondary__bg-img" aria-hidden="true">
        </div>
        <div class="hero-secondary__content">
            <p class="hero-secondary__breadcrumb">Академия</p>
            <h1 class="hero-secondary__title">Контакты</h1>
            <p class="hero-secondary__subtitle">Мы на связи и рады ответить на ваши вопросы</p>
        </div>
    </section>

    <!-- How to get there -->
    <section class="how-to">
        <div class="section__container">
            <div class="how-to__grid">
                <div class="how-to__info">
                    <h2 class="section__title">Как добраться</h2>
                    <h3 class="how-to__place">Репетиторий Всероссийской виолончельной академии</h3>
                    <p class="how-to__address">Москва, Подкопаевский пер. 4 стр. 6</p>
                </div>
                <div class="how-to__map">
                    <img src="/assets/images/map.jpg" alt="Карта: Москва, Подкопаевский пер. 4 стр. 6"
                         class="how-to__map-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="team">
        <div class="section__container">
            <div class="team__header">
                <h2 class="section__title section__title--light">Команда</h2>
                <div class="team__nav">
                    <button type="button" class="team__nav-btn" aria-label="Предыдущий" disabled>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2">
                            <path d="M15 18l-6-6 6-6"/>
                        </svg>
                    </button>
                    <button type="button" class="team__nav-btn" aria-label="Следующий">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2">
                            <path d="M9 18l6-6-6-6"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="team__grid owl-carousel owl-theme" id="teamCarousel">
                <article class="team-card item">
                    <div class="team-card__avatar team-card__avatar--logo">
                        <div class="team-card__logo-mark">
                            <img src="/assets/images/logo_dark.svg" alt="">
                        </div>
                    </div>
                    <div class="team-card__body">
                        <h3 class="team-card__name">Менеджмент Академии</h3>
                        <p class="team-card__role">Общие и организационные вопросы</p>
                        <a href="mailto:org@cello-academy.ru" class="team-card__email">org@cello-academy.ru</a>
                    </div>
                </article>

                <article class="team-card item">
                    <div class="team-card__avatar">
                        <img src="/assets/images/team-ushakova.jpg" alt="Анастасия Ушакова">
                    </div>
                    <div class="team-card__body">
                        <h3 class="team-card__name">Анастасия Ушакова</h3>
                        <p class="team-card__role">Основатель и художественный руководитель</p>
                        <a href="mailto:ushakova@cello-academy.ru"
                           class="team-card__email">ushakova@cello-academy.ru</a>
                    </div>
                </article>

                <article class="team-card item">
                    <div class="team-card__avatar team-card__avatar--logo">
                        <div class="team-card__logo-mark">
                            <img src="/assets/images/logo_dark.svg" alt="">
                        </div>
                    </div>
                    <div class="team-card__body">
                        <h3 class="team-card__name">Менеджмент Академии</h3>
                        <p class="team-card__role">Общие и организационные вопросы</p>
                        <a href="mailto:org@cello-academy.ru" class="team-card__email">org@cello-academy.ru</a>
                    </div>
                </article>

                <article class="team-card item">
                    <div class="team-card__avatar">
                        <img src="/assets/images/team-ushakova.jpg" alt="Анастасия Ушакова">
                    </div>
                    <div class="team-card__body">
                        <h3 class="team-card__name">Анастасия Ушакова</h3>
                        <p class="team-card__role">Основатель и художественный руководитель</p>
                        <a href="mailto:ushakova@cello-academy.ru"
                           class="team-card__email">ushakova@cello-academy.ru</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Our space -->
    <section class="space">
        <div class="section__container">
            <div class="section__header">
                <h2 class="section__title">Наше пространство</h2>
                <a href="#" class="section__link">Смотреть все фото</a>
            </div>
            <div class="space__grid">
                <div class="space__item">
                    <img src="/assets/images/space1.jpg" alt="Репетиторий академии">
                </div>
                <div class="space__item">
                    <img src="/assets/images/space2.jpg" alt="Занятия в академии">
                </div>
                <div class="space__item">
                    <img src="/assets/images/space3.jpg" alt="Портрет в интерьере">
                </div>
                <div class="space__item">
                    <img src="/assets/images/space4.jpg" alt="Выступление участников">
                </div>
            </div>
        </div>
    </section>

    <!-- Socials -->
    <section class="socials">
        <div class="section__container">
            <h2 class="section__title">Мы в социальных сетях</h2>
            <div class="socials__grid">
                <a href="#" class="socials__item" target="_blank" rel="noopener">
            <span class="socials__icon">
              <img src="/assets/images/vk.svg" alt="">
            </span>
                    <span class="socials__name">ВКонтакте</span>
                </a>
                <a href="#" class="socials__item" target="_blank" rel="noopener">
            <span class="socials__icon">
              <img src="/assets/images/rutube.svg" alt="">
            </span>
                    <span class="socials__name">Rutube</span>
                </a>
                <a href="#" class="socials__item" target="_blank" rel="noopener">
            <span class="socials__icon">
              <img src="/assets/images/youtube.svg" alt="">
            </span>
                    <span class="socials__name">Youtube</span>
                </a>
                <a href="#" class="socials__item" target="_blank" rel="noopener">
            <span class="socials__icon">
              <img src="/assets/images/dzen.svg" alt="">
            </span>
                    <span class="socials__name">Яндекс Дзен</span>
                </a>
                <a href="#" class="socials__item" target="_blank" rel="noopener">
            <span class="socials__icon">
              <img src="/assets/images/telegram.svg" alt="">
            </span>
                    <span class="socials__name">Telegram</span>
                </a>
                <a href="#" class="socials__item socials__item--restricted" target="_blank" rel="noopener">
            <span class="socials__icon">
              <img src="/assets/images/instagram.svg" alt="">
            </span>
                    <span class="socials__name">Instagram</span>
                    <span class="socials__note">*деятельность META запрещена в РФ</span>
                </a>
            </div>
        </div>
    </section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
