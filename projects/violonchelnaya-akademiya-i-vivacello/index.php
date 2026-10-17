<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Виолончельная академия и VIVACELLO');
$APPLICATION->SetPageProperty('title', 'Виолончельная академия и VIVACELLO — Проекты');
$img = '/projects/violonchelnaya-akademiya-i-vivacello/images';
?>
<link rel="stylesheet" href="/local/templates/main/template_styles.css">
<link rel="stylesheet" href="/projects/violonchelnaya-akademiya-i-vivacello/style.css">


<section class="hero-secondary viva-hero">
    <div class="hero-secondary__bg">
        <img src="<?= $img ?>/hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/projects/">Наши проекты</a> / Партнёрский проект · с 2025 года</p>
        <h1 class="hero-secondary__title">Виолончельная академия<br>и VIVACELLO</h1>
        <p class="hero-secondary__subtitle">Совместные проекты молодых исполнителей и опытных музыкантов.</p>
        <a href="#" class="btn btn--primary">Сайт фестиваля</a>
    </div>
</section>

<section class="viva-intro">
    <div class="section__container viva-intro__grid">
        <div>
            <p class="viva-lead">С 2025 года Виолончельная академия сотрудничает с Международным виолончельным фестивалем VIVACELLO. Совместные проекты объединяют молодых исполнителей и опытных музыкантов, открывают возможности для профессионального общения, творческих экспериментов и знакомства с разными подходами к виолончельному искусству.</p>
            <p>Художественный руководитель фестиваля Борис Андрианов — преподаватель Виолончельной академии с момента её основания. Его участие в образовательных и концертных программах Академии стало основой для развития сотрудничества двух проектов.</p>
        </div>
        <div class="viva-years">
            <article>
                <p class="viva-years__num">2025</p>
                <p>Лаборатория свободного творчества</p>
            </article>
            <article>
                <p class="viva-years__num">2026</p>
                <p>Мастер-классы Стюарта Пинкомба</p>
            </article>
        </div>
    </div>
</section>

<section class="viva-fest">
    <div class="section__container">
        <p class="viva-fest__label">О фестивале</p>
        <div class="viva-fest__grid">
            <img src="<?= $img ?>/logo.jpg" alt="VIVACELLO" class="viva-fest__logo">
            <div>
                <p><strong>VIVACELLO</strong> — Международный виолончельный фестиваль, проходящий в Москве с 2008 года. Его художественный руководитель — заслуженный артист России Борис Андрианов, организатор — культурно-благотворительный фонд «U-Art. Ты и искусство» Иветы и Тамаза Манашеровых.</p>
                <p>Фестиваль объединяет музыкантов из разных стран и представляет виолончель в разнообразных художественных контекстах: от академического репертуара до современных сочинений и проектов на пересечении искусств. Особое место в его программе занимают заказ новой музыки и мировые премьеры.</p>
            </div>
        </div>
        <a href="#" class="btn btn--primary">Сайт фестиваля</a>
    </div>
</section>

<section class="viva-lab">
    <div class="section__container">
        <p class="viva-date">9–17 ноября 2025</p>
        <h2 class="section__title">Лаборатория свободного творчества</h2>
        <div class="viva-lab__grid">
            <div>
                <p>Первым совместным проектом стала «Лаборатория свободного творчества», проходившая с 9 по 17 ноября 2025 года. Она объединила занятия с наставниками, репетиции, импровизацию и подготовку концертной программы. Молодые виолончелисты пробовали себя в непривычных музыкальных контекстах, работали с джазовой, этнической и электронной музыкой, исследовали возможности своего инструмента за пределами академического репертуара.</p>
                <p>16 ноября результаты этой работы были представлены в Рахманиновском зале. В программе соединились авторская музыка наставников и совместные эксперименты с молодыми виолончелистами. Концерт стал продолжением лаборатории на сцене — пространством встречи разных поколений, исполнительских традиций и музыкальных жанров.</p>
            </div>
            <aside class="viva-note">
                <h3>Концерт · 16 ноября</h3>
                <p class="viva-note__title">Рахманиновский зал Московской консерватории</p>
                <p>Авторская музыка наставников и совместные эксперименты с молодыми виолончелистами.</p>
            </aside>
        </div>
        <div class="viva-lists">
            <div>
                <h3>Наставники</h3>
                <ul>
                    <li>Борис Андрианов</li>
                    <li>Георгий Гусев</li>
                    <li>Леонид Винцкевич</li>
                    <li>Николай Винцкевич</li>
                    <li>Варвара Чиркина</li>
                    <li>Лейла Килани</li>
                </ul>
            </div>
            <div>
                <h3>Участники</h3>
                <ul>
                    <li>Михаил Васильев</li>
                    <li>Арина Деграве</li>
                    <li>Полина Тхай</li>
                    <li>Ариадна Соловьева</li>
                    <li>Ярослав Шмидт</li>
                </ul>
            </div>
        </div>
        <div class="viva-roles">
            <article class="viva-note">
                <h3>Виолончельная академия</h3>
                <p>Провела отбор молодых исполнителей, организовала занятия и предоставила пространство для работы лаборатории, обеспечила съёмку фильма и организацию концерта в Рахманиновском зале Московской консерватории.</p>
            </article>
            <article class="viva-note">
                <h3>Фестиваль VIVACELLO</h3>
                <p>Привлёк наставников, с которыми участники разрабатывали музыкальные идеи и готовили совместные выступления.</p>
            </article>
        </div>
    </div>
</section>

<section class="viva-film">
    <div class="section__container viva-film__grid">
        <a href="#" class="viva-film__media">
            <img src="<?= $img ?>/film.jpg" alt="">
            <span class="viva-play" aria-hidden="true"></span>
        </a>
        <div>
            <p class="viva-muted">Фильм</p>
            <h2 class="section__title">Фильм о лаборатории</h2>
            <p>Короткий фильм о работе участников и наставников: от первых встреч и репетиций до совместного выступления на сцене.</p>
            <a href="#" class="section__link">Смотреть в медиатеке</a>
        </div>
    </div>
</section>

<section class="viva-media">
    <div class="section__container">
        <div class="section__header">
            <div>
                <h2 class="section__title">Концертные записи</h2>
                <p class="viva-muted">Выступления наставников и молодых виолончелистов — музыкальные результаты «Лаборатории свободного творчества»</p>
            </div>
            <a href="#" class="section__link">Весь плейлист</a>
        </div>
        <div class="viva-videos">
            <?php for ($i = 1; $i <= 4; $i++): ?>
            <article>
                <a href="#" class="viva-videos__media">
                    <img src="<?= $img ?>/video-<?= $i ?>.jpg" alt="">
                    <span class="viva-play" aria-hidden="true"></span>
                </a>
                <p class="viva-videos__caption"><span>Лаборатория свободного творчества</span> Запись <?= $i ?></p>
            </article>
            <?php endfor; ?>
        </div>

        <div class="section__header">
            <div>
                <h2 class="section__title">Фотографии лаборатории</h2>
                <p class="viva-muted">Альбом «Лаборатория свободного творчества» из медиатеки</p>
            </div>
            <a href="#" class="section__link">Весь альбом</a>
        </div>
        <div class="viva-photos viva-photos--top">
            <img src="<?= $img ?>/photo-1.jpg" alt="">
            <img src="<?= $img ?>/photo-2.jpg" alt="">
            <img src="<?= $img ?>/photo-3.jpg" alt="">
        </div>
        <div class="viva-photos viva-photos--bottom">
            <img src="<?= $img ?>/photo-4.jpg" alt="">
            <img src="<?= $img ?>/photo-5.jpg" alt="">
            <img src="<?= $img ?>/photo-6.jpg" alt="">
        </div>

        <p class="viva-date">17 и 19 ноября 2026</p>
        <h2 class="section__title">Мастер-классы Стюарта Пинкомба</h2>
        <div class="viva-master">
            <div>
                <p>В 2026 году сотрудничество Виолончельной академии и фестиваля VIVACELLO продолжится мастер-классами американского виолончелиста Стюарта Пинкомба в Санкт-Петербурге и Москве.</p>
                <p>Встречи со Стюартом Пинкомбом дадут молодым музыкантам возможность поработать над репертуаром с зарубежным исполнителем, познакомиться с его подходом к интерпретации и обсудить исполнительские задачи.</p>
            </div>
            <div class="viva-master__placeholder" aria-hidden="true"></div>
        </div>
        <div class="viva-dates">
            <article>
                <p class="viva-dates__day">17 ноября</p>
                <p class="viva-dates__city">Санкт-Петербург</p>
                <p>Санкт-Петербургская государственная консерватория имени Н. А. Римского-Корсакова</p>
                <a href="/afisha/" class="section__link">Анонс в афише</a>
            </article>
            <article>
                <p class="viva-dates__day">19 ноября</p>
                <p class="viva-dates__city">Москва</p>
                <p>Камерный зал Виолончельной академии</p>
                <a href="/afisha/" class="section__link">Анонс в афише</a>
            </article>
        </div>
    </div>
</section>

<section class="viva-open">
    <div class="section__container">
        <h2 class="section__title section__title--light">Мы открыты к новым совместным инициативам</h2>
        <p>Мы рады, что в России есть проекты и институции, которые развивают виолончельное искусство, поддерживают молодых музыкантов и создают пространство для новых творческих идей. Сотрудничество Виолончельной академии и фестиваля VIVACELLO позволяет объединить опыт, инициативу и ресурсы, воплощая замыслы в совместных проектах. Для нас особенно ценно, что это партнёрство продолжается и каждый год обретает новые формы — от творческих экспериментов до встреч с зарубежными исполнителями.</p>
    </div>
</section>

<section class="viva-follow">
    <div class="section__container viva-follow__grid">
        <div>
            <p class="viva-muted">Смотрите также</p>
            <a href="/afisha/" class="viva-chip">Афиша</a>
            <a href="#" class="viva-chip">Медиатека</a>
            <a href="/projects/mezhdunarodnye-obmeny/" class="viva-chip">Международные проекты</a>
        </div>
        <article class="viva-manager">
            <p class="viva-manager__label">Менеджер проекта</p>
            <div class="viva-manager__row">
                <span class="viva-manager__avatar" aria-hidden="true"></span>
                <a href="#" class="viva-manager__name">Имя менеджера <span aria-hidden="true">↗</span></a>
            </div>
            <p class="viva-manager__role">Менеджер проекта</p>
            <a href="#" class="section__link">Руководство и команда Академии</a>
        </article>
    </div>
</section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
