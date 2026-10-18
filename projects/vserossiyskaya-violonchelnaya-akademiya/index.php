<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Всероссийская виолончельная академия');
$APPLICATION->SetPageProperty('title', 'Всероссийская виолончельная академия — Проекты');
$img = '/projects/vserossiyskaya-violonchelnaya-akademiya/images';
?>
<link rel="stylesheet" href="/local/templates/main/template_styles.css">
<link rel="stylesheet" href="/projects/vserossiyskaya-violonchelnaya-akademiya/style.css">
<link rel="stylesheet" href="/projects/otkrytye-proslushivaniya/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1.15/dist/fancybox/fancybox.css">

<section class="hero-secondary vva-hero">
    <div class="hero-secondary__bg">
        <img src="<?= $img ?>/hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/projects/">Наши проекты</a> / IV выпуск · 26–29 марта 2026 · Москва</p>
        <h1 class="hero-secondary__title">Всероссийская виолончельная<br>академия</h1>
        <p class="vva-hero__name">имени А. П. Никитина</p>
        <p class="hero-secondary__subtitle">Главное образовательное событие для виолончелистов в России — ежегодный интенсив, объединяющий исполнителей, преподавателей и студентов.</p>
        <a href="#program" class="btn btn--primary">Смотреть программу</a>
    </div>
</section>

<section class="vva-intro">
    <div class="section__container vva-intro__grid">
        <div>
            <p>Всероссийская виолончельная академия — ежегодный интенсив, объединяющий исполнителей, преподавателей и студентов. Её цель — профессиональный рост, творческий обмен и вдохновение. Это виолончельный форум, который собирает виолончелистов России и мира.</p>
            <p>В программу входят мастер-классы, лекции и беседы, концерты, творческие лаборатории и пространство для общения.</p>
        </div>
        <aside>
            <h2 class="vva-focus__title">Форматы</h2>
            <div class="vva-tags">
                <span>Мастер-классы</span>
                <span>Лекции и беседы</span>
                <span>Концерты</span>
                <span>Творческие лаборатории</span>
                <span>Общение</span>
            </div>
            <p class="vva-muted">Первый медиапроект Академии</p>
        </aside>
    </div>
    <div class="section__container vva-stats">
        <article><p class="vva-stats__value">IV</p><p>выпуск</p></article>
        <article><p class="vva-stats__value">26–29 марта</p><p>четыре дня</p></article>
        <article><p class="vva-stats__value">2 площадки</p><p>Геликон-опера · консерватория</p></article>
        <article><p class="vva-stats__value">Бесплатно</p><p>для слушателей</p></article>
    </div>
</section>

<section class="vva-name">
    <div class="section__container vva-name__grid">
        <div class="vva-placeholder" aria-hidden="true"></div>
        <div>
            <p class="vva-kicker">Имя академии</p>
            <h2 class="section__title section__title--light">Анатолий Павлович<br>Никитин</h2>
            <p>В этом году академия носит имя Анатолия Павловича Никитина — виолончелиста и педагога, профессора Санкт-Петербургской консерватории. В июне 2026 года Академия стала хранителем его нотного архива.</p>
            <a href="#" class="section__link section__link--light">Нотный архив Никитина — Институт исследований и методологии</a>
        </div>
    </div>
</section>

<section class="vva-program" id="program">
    <div class="section__container">
        <h2 class="section__title">Программа: четыре тематических дня</h2>
        <p class="vva-muted">26–29 марта 2026</p>
        <div class="vva-days">
            <article>
                <p class="vva-days__num">26</p>
                <p class="vva-days__when">марта · четверг</p>
                <h3>День традиций</h3>
                <p class="vva-days__sub">в посвящение Н. Шаховской и Н. Гутман</p>
                <ul>
                    <li>Мастер-классы Б. Андрианова и К. Родина</li>
                    <li>Беседа о Наталье Шаховской</li>
                    <li>Лаборатория старинной музыки А. Спиридонова</li>
                    <li>Беседа о старинной музыке и Н. Гутман</li>
                    <li>Мастер-класс О. Галочкиной и В. Степанова</li>
                    <li>Лекция Г. Гусева «Спасительный плот музыканта в океане музыки XXI века»</li>
                    <li>Концерт-открытие</li>
                </ul>
            </article>
            <article>
                <p class="vva-days__num">27</p>
                <p class="vva-days__when">марта · пятница</p>
                <h3>International Cello Day</h3>
                <ul>
                    <li>Мастер-класс Ф. Сольчи и Ф. Ариаса</li>
                    <li>Беседа «Виолончельные школы мира»</li>
                    <li>Cello Open Stage (jam session)</li>
                    <li>Лекция Д. Якуба</li>
                    <li>Мастер-класс Се Гуаньюй</li>
                    <li>Концерт «Cello Around The World»</li>
                </ul>
            </article>
            <article>
                <p class="vva-days__num">28</p>
                <p class="vva-days__when">марта · суббота</p>
                <h3>От мала до велика</h3>
                <ul>
                    <li>Мастер-класс М. Журавлевой и А. Васильева</li>
                    <li>Беседа «Путь к мастерству»</li>
                    <li>Лекция Т. Лукашиной «Петербургская виолончельная школа»</li>
                    <li>Лекция К. Кравцова «Психологическая и физическая подготовка к концерту»</li>
                    <li>Мастер-класс А. Рамма и К. Кравцова</li>
                    <li>Беседа «О концертной жизни»</li>
                </ul>
            </article>
            <article>
                <p class="vva-days__num">29</p>
                <p class="vva-days__when">марта · воскресенье</p>
                <h3>Виолончель нового времени</h3>
                <ul>
                    <li>Мастер-класс О. Бугаева и И. Сканави</li>
                    <li>Беседа «Будущее виолончельной школы»</li>
                    <li>Мастер-класс А. Князева и М. Зайцевой</li>
                    <li>Беседа «Философия музыканта»</li>
                    <li>Гала-концерт с премьерами сочинений современных композиторов</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="vva-gala">
    <div class="section__container vva-gala__grid">
        <div>
            <p class="vva-kicker">гала-концерт · 29 марта</p>
            <h2 class="section__title">Большой зал консерватории</h2>
            <p class="vva-gala__time">19.00–21.30</p>
            <p>Премьеры сочинений современных композиторов.</p>
            <a href="#" class="btn btn--primary">Купить билет</a>
        </div>
        <div class="vva-gala__photos" aria-hidden="true">
            <span></span><span></span><span></span>
        </div>
    </div>
</section>

<section class="vva-people">
    <div class="section__container">
        <h2 class="section__title">Преподаватели и участники</h2>
        <div class="vva-people__cols">
            <ul>
                <li>Александр Князев</li>
                <li>Кирилл Кравцов</li>
                <li>Олег Бугаев</li>
                <li>Фернандо Ариас — Испания</li>
                <li>Мария Журавлева</li>
                <li>Георгий Гусев</li>
                <li>Ольга Матиева</li>
            </ul>
            <ul>
                <li>Борис Андрианов</li>
                <li>Василий Степанов</li>
                <li>Кирилл Родин</li>
                <li>Иван Сканави</li>
                <li>Мария Зайцева</li>
                <li>Андрей Спиридонов</li>
            </ul>
            <ul>
                <li>Александр Рамм</li>
                <li>Се Гуаньюй — Китай</li>
                <li>Фаусто Сольчи — Италия</li>
                <li>Алексей Васильев</li>
                <li>Ольга Галочкина</li>
                <li>Геннадий Акимович</li>
            </ul>
        </div>
        <div class="vva-people__notes">
            <article>
                <h3>Лекторы</h3>
                <p>Габриэль Джебран Якуб<br>Татьяна Лукашина</p>
            </article>
            <article>
                <h3>Ведущие</h3>
                <p>Анастасия Ушакова — основатель Академии<br>Илья Михайлов</p>
            </article>
        </div>
        <p class="vva-muted">Ассистенты и наставники лаборатории старинной музыки — Г. Акимович и О. Матиева. В беседе 26 марта выступил декан ФИСИИ МГК Михаил Дубов.</p>
    </div>
</section>

<section class="vva-venues">
    <div class="section__container">
        <h2 class="section__title section__title--light">Места проведения</h2>
        <div class="vva-venues__grid">
            <article>
                <p class="vva-kicker">Основная площадка</p>
                <h3>Музыкальный театр «Геликон-опера»</h3>
                <p>ул. Большая Никитская, 19/16 · метро «Арбатская»</p>
            </article>
            <article>
                <p class="vva-kicker">Концерты 27 и 29 марта</p>
                <h3>Московская государственная консерватория имени П. И. Чайковского</h3>
                <p>ул. Большая Никитская, 13/6 · метро «Арбатская»</p>
            </article>
        </div>
    </div>
</section>

<section class="vva-join">
    <div class="section__container">
        <h2 class="section__title">Как принять участие</h2>
        <p class="vva-muted">Участие в Академии бесплатное</p>
        <div class="vva-join__grid">
            <article>
                <h3>Студентам</h3>
                <p>Заявка на активное участие в мастер-классах подаётся через заявку. Результаты отбора публикуются в сообществе «Виолончельная академия» ВКонтакте.</p>
                <a href="#" class="section__link">Подать заявку</a>
            </article>
            <article>
                <h3>Слушателям</h3>
                <p>Регистрация на открытые мероприятия по ссылке. Участие бесплатное.</p>
                <a href="#" class="section__link">Зарегистрироваться</a>
            </article>
            <article>
                <h3>Педагогам из регионов</h3>
                <p>Конкурс для педагогов из регионов: результаты публикуются в сообществе ВКонтакте.</p>
                <a href="#" class="section__link">Результаты конкурса</a>
            </article>
        </div>
        <p class="vva-muted">Музыканты могут также попасть на мастер-классы по специальным призам Академии — подробнее в проекте «Виолончельная академия в регионах».</p>
    </div>
</section>

<section class="vva-stream">
    <div class="section__container vva-stream__grid">
        <a href="#" class="vva-stream__media">
            <img src="<?= $img ?>/stream.jpg" alt="">
            <span class="vva-play" aria-hidden="true"></span>
        </a>
        <div>
            <p class="vva-kicker">Трансляции</p>
            <h2 class="section__title section__title--light">Смотрите Академию онлайн</h2>
            <p>Трансляция ведётся в социальных сетях Академии.</p>
            <div class="vva-platforms">
                <a href="#">ВКонтакте <span aria-hidden="true">↗</span></a>
                <a href="#">YouTube <span aria-hidden="true">↗</span></a>
                <a href="#">RUTUBE <span aria-hidden="true">↗</span></a>
                <a href="#">Дзен <span aria-hidden="true">↗</span></a>
            </div>
        </div>
    </div>
</section>

<section class="vva-partners">
    <div class="section__container">
        <h2 class="section__title">Партнёры</h2>
        <p class="vva-muted">Партнёры IV выпуска</p>
        <div class="vva-partners__list">
            <?php foreach ([
                'РГМЦ «Орфей»',
                'ClassicalMusicNews.Ru',
                'Москонцерт',
                'Геликон-опера',
                'Евразия сегодня',
                'Московская консерватория',
                'Music live',
                'Санкт-Петербургская консерватория',
                'Amadeus',
            ] as $partner): ?>
            <span><?= htmlspecialcharsbx($partner) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="vva-next">
    <div class="section__container">
        <h2 class="section__title section__title--light">Следите за следующей Академией</h2>
        <p>Анонсы, открытые прослушивания и наборы публикуются на сайте, в «Новостях» и «Афише».</p>
        <div class="vva-next__actions">
            <a href="/afisha/" class="btn btn--primary">Афиша</a>
            <a href="#" class="vva-outline">Открытые прослушивания</a>
        </div>
    </div>
</section>

<section class="aud-follow">
    <div class="section__container aud-follow__grid">
        <div>
            <p class="aud-follow__label">Смотрите также</p>
            <div class="aud-chips">
                <a href="/media/video/" class="aud-chip">Видеоархив</a>
                <a href="/mediacenter/" class="aud-chip">Медиацентр</a>
                <a href="/afisha/" class="aud-chip">Афиша</a>
            </div>
        </div>
        <article class="aud-manager">
            <p class="aud-manager__label">Менеджер проекта</p>
            <div class="aud-manager__row">
                <span class="aud-manager__avatar" aria-hidden="true"></span>
                <div>
                    <a href="#" class="aud-manager__name">Имя менеджера <span aria-hidden="true">↗</span></a>
                    <p class="aud-manager__role">Менеджер проекта</p>
                </div>
            </div>
            <a href="/academy/team/" class="section__link">Руководство и команда Академии</a>
        </article>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1.15/dist/fancybox/fancybox.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('img:not(.hero-secondary__bg-img):not([aria-hidden="true"])').forEach(function (img) {
        const existingLink = img.closest('a');
        if (existingLink) {
            if (existingLink.hasAttribute('data-fancybox')) return;
            const href = existingLink.getAttribute('href');
            if (href && href !== '#') return;
            existingLink.href = img.currentSrc || img.src;
            existingLink.setAttribute('data-fancybox', 'project-gallery');
            if (img.alt) existingLink.setAttribute('data-caption', img.alt);
            return;
        }
        const link = document.createElement('a');
        link.href = img.currentSrc || img.src;
        link.setAttribute('data-fancybox', 'project-gallery');
        link.style.cursor = 'zoom-in';
        if (img.alt) link.setAttribute('data-caption', img.alt);
        img.parentNode.insertBefore(link, img);
        link.appendChild(img);
    });
    if (window.Fancybox) Fancybox.bind('[data-fancybox="project-gallery"]', { Hash: false });
});
</script>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
