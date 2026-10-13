<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Сообщество');
$APPLICATION->SetPageProperty('title', 'Сообщество — Всероссийская виолончельная академия');
?>

<section class="hero-secondary hero-secondary--community">
    <div class="hero-secondary__bg">
        <img src="/assets/images/academy_people.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Сообщество</h1>
        <p class="hero-secondary__subtitle">Педагоги, студенты, выпускники и приглашённые артисты Академии.</p>
    </div>
</section>

<section class="community-page">
    <div class="section__container">

        <form class="community-filters" action="/community/" method="get">
            <div class="community-filters__search">
                <label class="community-filters__search-label" for="community-search">
                    <span class="community-filters__search-icon" aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <input
                        type="search"
                        id="community-search"
                        name="q"
                        class="community-filters__search-input"
                        placeholder="Поиск по имени"
                        autocomplete="off"
                    >
                </label>
            </div>

            <div class="community-filters__roles">
                <a href="/community/" class="community-filters__role community-filters__role--active">Все роли</a>
                <a href="/community/?role=teachers" class="community-filters__role">Педагоги</a>
                <a href="/community/?role=students" class="community-filters__role">Студенты</a>
                <a href="/community/?role=alumni" class="community-filters__role">Выпускники</a>
                <a href="/community/?role=artists" class="community-filters__role">Приглашённые артисты</a>
                <a href="/community/?role=conductors" class="community-filters__role">Дирижёры</a>
            </div>

            <div class="community-filters__row">
                <div class="community-filters__dropdowns">
                    <label class="community-filters__dropdown">
                        <span class="community-filters__dropdown-label">Страна</span>
                        <select name="country" class="community-filters__select">
                            <option value="">Страна</option>
                            <option value="ru">Россия</option>
                            <option value="other">Другие</option>
                        </select>
                    </label>
                    <label class="community-filters__dropdown">
                        <span class="community-filters__dropdown-label">Город</span>
                        <select name="city" class="community-filters__select">
                            <option value="">Город</option>
                            <option value="moscow">Москва</option>
                            <option value="spb">Санкт-Петербург</option>
                        </select>
                    </label>
                    <label class="community-filters__dropdown">
                        <span class="community-filters__dropdown-label">Специализация</span>
                        <select name="spec" class="community-filters__select">
                            <option value="">Специализация</option>
                            <option value="cello">Виолончель</option>
                            <option value="ensemble">Ансамбль</option>
                        </select>
                    </label>
                    <label class="community-filters__dropdown">
                        <span class="community-filters__dropdown-label">Проект</span>
                        <select name="project" class="community-filters__select">
                            <option value="">Проект</option>
                            <option value="vva">ВВА</option>
                            <option value="stars">Звёзды ВВА</option>
                        </select>
                    </label>
                </div>
                <a href="/community/" class="community-filters__reset">Сбросить фильтры</a>
            </div>
        </form>

        <div class="community-page__line" aria-hidden="true"></div>

        <div class="community-page__grid">
            <article class="community-card">
                <a href="/community/ramm/" class="community-card__link">
                    <div class="community-card__photo">
                        <img src="/assets/images/academy-ushakova.jpg" alt="А. Рамм" loading="lazy">
                    </div>
                    <h2 class="community-card__name">А. Рамм <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
                    <p class="community-card__meta">Педагог · Виолончель</p>
                </a>
            </article>

            <article class="community-card">
                <a href="/community/markevich/" class="community-card__link">
                    <div class="community-card__photo">
                        <img src="/assets/images/academy-markevich.jpg" alt="А. Маркевич" loading="lazy">
                    </div>
                    <h2 class="community-card__name">А. Маркевич <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
                    <p class="community-card__meta">Педагог · Виолончель</p>
                </a>
            </article>

            <article class="community-card">
                <a href="/community/andrianov/" class="community-card__link">
                    <div class="community-card__photo">
                        <img src="/assets/images/academy-andrianov.jpg" alt="Б. Андрианов" loading="lazy">
                    </div>
                    <h2 class="community-card__name">Б. Андрианов <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
                    <p class="community-card__meta">Педагог · Ансамбль</p>
                </a>
            </article>

            <article class="community-card">
                <a href="/community/evlanov/" class="community-card__link">
                    <div class="community-card__photo">
                        <img src="/assets/images/academy-evlanov.jpg" alt="Т. Евланов" loading="lazy">
                    </div>
                    <h2 class="community-card__name">Т. Евланов <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
                    <p class="community-card__meta">Дирижёр</p>
                </a>
            </article>

            <article class="community-card">
                <a href="/community/markevich-2/" class="community-card__link">
                    <div class="community-card__photo">
                        <img src="/assets/images/person1.jpg" alt="А. Маркевич" loading="lazy">
                    </div>
                    <h2 class="community-card__name">А. Маркевич <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
                    <p class="community-card__meta">Выпускник · Москва</p>
                </a>
            </article>

            <article class="community-card">
                <a href="/community/andrianov-2/" class="community-card__link">
                    <div class="community-card__photo">
                        <img src="/assets/images/person2.jpg" alt="Б. Андрианов" loading="lazy">
                    </div>
                    <h2 class="community-card__name">Б. Андрианов <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
                    <p class="community-card__meta">Студент · Москва</p>
                </a>
            </article>

            <article class="community-card">
                <a href="/community/evlanov-2/" class="community-card__link">
                    <div class="community-card__photo">
                        <img src="/assets/images/person3.jpg" alt="Т. Евланов" loading="lazy">
                    </div>
                    <h2 class="community-card__name">Т. Евланов <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
                    <p class="community-card__meta">Студент · Москва</p>
                </a>
            </article>

            <article class="community-card">
                <a href="/community/ramm-2/" class="community-card__link">
                    <div class="community-card__photo">
                        <img src="/assets/images/person4.jpg" alt="А. Рамм" loading="lazy">
                    </div>
                    <h2 class="community-card__name">А. Рамм <span class="community-card__arrow" aria-hidden="true">↗</span></h2>
                    <p class="community-card__meta">Выпускник · Москва</p>
                </a>
            </article>
        </div>

        <nav class="community-pagination" aria-label="Страницы">
            <a href="/community/?page=1" class="community-pagination__item community-pagination__item--active">1</a>
            <a href="/community/?page=2" class="community-pagination__item">2</a>
            <a href="/community/?page=3" class="community-pagination__item">3</a>
        </nav>

    </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
