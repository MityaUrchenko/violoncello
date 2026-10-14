<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Ольга Галочкина');
$APPLICATION->SetPageProperty('title', 'Ольга Галочкина — Сообщество');
?>
<link rel="stylesheet" href="/local/templates/main/css/community-page.css">

<section class="hero-secondary hero-secondary--community">
    <div class="hero-secondary__bg">
        <img src="/assets/images/about-ensemble.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/community/">Сообщество</a></p>
        <h1 class="hero-secondary__title">Ольга Галочкина</h1>
    </div>
</section>

<section class="community-profile">
    <div class="section__container">
        <div class="community-profile__head">
            <div class="community-profile__photo">
                <img src="/assets/images/person1.jpg" alt="Ольга Галочкина">
            </div>
            <div class="community-profile__intro">
                <div class="community-profile__badges">
                    <span class="community-profile__badge community-profile__badge--accent">Педагог</span>
                    <span class="community-profile__badge">Приглашённый артист</span>
                </div>
                <h2 class="community-profile__name">Ольга Галочкина</h2>
                <p class="community-profile__roles">Виолончель · Солистка · Педагог мастер-классов</p>
                <p class="community-profile__bio">Лауреат международных конкурсов, выпускница Московской консерватории. С 2023 года — педагог программы «Летняя резиденция» Всероссийской виолончельной академии.</p>
                <p class="community-profile__links">
                    <a href="#" class="section__link">Сайт</a>
                    <a href="#" class="section__link">Telegram</a>
                    <a href="#" class="section__link">ВКонтакте</a>
                </p>
            </div>
        </div>

        <div class="community-profile__split">
            <div>
                <h3 class="community-profile__heading">Образование</h3>
                <p>Московская государственная консерватория им. П. И. Чайковского, класс виолончели.</p>
            </div>
            <div>
                <h3 class="community-profile__heading">Роли в академии</h3>
                <p>Педагог программы «Летняя резиденция».<br>Член жюри конкурса VIVACELLO.</p>
            </div>
        </div>

        <div class="community-profile__projects">
            <h3 class="community-profile__heading">Проекты</h3>
            <div class="community-profile__tags">
                <a href="/projects/" class="community-profile__tag">Летняя резиденция</a>
                <a href="/projects/" class="community-profile__tag">Vivacello</a>
                <a href="/projects/" class="community-profile__tag">Новая школа</a>
            </div>
        </div>
    </div>
</section>

<section class="community-band">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title section__title--light">Мероприятия</h2>
            <a href="/afisha/" class="section__link section__link--light">Все мероприятия</a>
        </div>
        <div class="community-band__events">
            <article class="community-event">
                <a href="/afisha/" class="community-event__link">
                    <img src="/assets/images/event1.jpg" alt="" class="community-event__image" loading="lazy">
                    <span class="community-event__body">
                        <span class="community-event__title">Мастер-класс О. Галочкиной</span>
                        <span class="community-event__meta">25 июля · Москва</span>
                    </span>
                </a>
            </article>
            <article class="community-event">
                <a href="/afisha/" class="community-event__link">
                    <img src="/assets/images/event2.jpg" alt="" class="community-event__image" loading="lazy">
                    <span class="community-event__body">
                        <span class="community-event__title">Летняя резиденция 2026</span>
                        <span class="community-event__meta">3–14 сентября · Суздаль</span>
                    </span>
                </a>
            </article>
            <article class="community-event">
                <a href="/afisha/" class="community-event__link">
                    <img src="/assets/images/event3.jpg" alt="" class="community-event__image" loading="lazy">
                    <span class="community-event__body">
                        <span class="community-event__title">Финал конкурса VIVACELLO</span>
                        <span class="community-event__meta">30 июля · Москва</span>
                    </span>
                </a>
            </article>
        </div>
    </div>
</section>

<section class="community-videos">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title">Избранные видео</h2>
            <a href="#" class="section__link">Смотреть все</a>
        </div>
        <div class="community-videos__grid">
            <article class="community-video">
                <a href="#" class="community-video__media">
                    <img src="/assets/images/about-life1.jpg" alt="" loading="lazy">
                    <span class="community-video__play" aria-hidden="true"></span>
                </a>
                <p class="news-card__date">14 августа 2026</p>
                <h3 class="community-video__title">«Летняя резиденция для молодых виолончелистов»</h3>
                <a href="#" class="section__link">Смотреть</a>
            </article>
            <article class="community-video">
                <a href="#" class="community-video__media">
                    <img src="/assets/images/event4.jpg" alt="" loading="lazy">
                    <span class="community-video__play" aria-hidden="true"></span>
                </a>
                <p class="news-card__date">28 июня 2026</p>
                <h3 class="community-video__title">Видео с выступления участников Академии</h3>
                <a href="#" class="section__link">Смотреть</a>
            </article>
            <article class="community-video">
                <a href="#" class="community-video__media">
                    <img src="/assets/images/event5.jpg" alt="" loading="lazy">
                    <span class="community-video__play" aria-hidden="true"></span>
                </a>
                <p class="news-card__date">28 июня 2026</p>
                <h3 class="community-video__title">Выступления участников Академии</h3>
                <a href="#" class="section__link">Смотреть</a>
            </article>
        </div>
    </div>
</section>

<section class="community-band community-band--videos">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title section__title--light">Все связанные видео</h2>
            <a href="#" class="section__link section__link--light">Смотреть все</a>
        </div>
        <div class="community-videos__grid community-videos__grid--wide">
            <?php
            $related = ['event1.jpg', 'event2.jpg', 'event3.jpg', 'event4.jpg', 'event5.jpg', 'event6.jpg'];
            foreach ($related as $file):
            ?>
            <article class="community-video community-video--compact">
                <a href="#" class="community-video__media">
                    <img src="/assets/images/<?= htmlspecialcharsbx($file) ?>" alt="" loading="lazy">
                    <span class="community-video__play" aria-hidden="true"></span>
                </a>
                <h3 class="community-video__title community-video__title--light">Видео с выступления участников Академии</h3>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="community-pubs">
    <div class="section__container">
        <div class="section__header">
            <h2 class="section__title">Публикации</h2>
            <a href="/news/" class="section__link">Смотреть все</a>
        </div>
        <ul class="community-pubs__list">
            <li class="community-pubs__item">
                <div>
                    <p class="news-card__date">10 июля 2026</p>
                    <h3 class="community-pubs__title">Итоги весенней серии мастер-классов</h3>
                </div>
                <a href="/news/" class="btn btn--outline-sm">Подробнее</a>
            </li>
            <li class="community-pubs__item">
                <div>
                    <p class="news-card__date">10 июля 2026</p>
                    <h3 class="community-pubs__title">Интервью с профессором Александром Князевым</h3>
                </div>
                <a href="/news/" class="btn btn--outline-sm">Подробнее</a>
            </li>
            <li class="community-pubs__item">
                <div>
                    <p class="news-card__date">2 июля 2026</p>
                    <h3 class="community-pubs__title">Открыт набор в резиденцию 2026</h3>
                </div>
                <a href="/news/" class="btn btn--outline-sm">Подробнее</a>
            </li>
        </ul>
    </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
