<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Звёзды Всероссийской виолончельной академии');
$APPLICATION->SetPageProperty('title', 'Звёзды Всероссийской виолончельной академии — Проекты');
$img = '/projects/zvyezdy-vserossiyskoy-violonchelnoy-akademii/images';
$soloists = [
    'Александр Князев',
    'Александр Рамм',
    'Михаил Пейсель',
    'Марк Фахрутдинов',
    'Даниэлла Гуреева',
    'Ярослав Шмидт',
    'Евгения Беляева',
    'Эмели Асланова',
    'Василий Степанов',
];
$program = [
    ['А. Вивальди', 'Концерт для двух виолончелей с оркестром соль минор, RV 531'],
    ['Д. Поппер', 'Венгерская рапсодия для виолончели с оркестром'],
    ['М. Брух', '«Кол Нидрей» для виолончели с оркестром'],
    ['П. Чайковский', 'Pezzo capriccioso для виолончели с оркестром. Вариации на тему рококо для виолончели с оркестром (ред. В. Фитценгагена)'],
    ['Т. Витали', 'Чакона (переложение для виолончели с оркестром)'],
    ['П. Сарасате', '«Цыганские напевы» (переложение для виолончели с оркестром)'],
    ['А. Саллинен', '«Ночные танцы Дон Жуан-Кихота» для виолончели и струнных, соч. 58'],
    ['К. Сен-Санс', 'Концерт № 1 для виолончели с оркестром ля минор, соч. 33'],
];
?>
<link rel="stylesheet" href="/local/templates/main/template_styles.css">
<link rel="stylesheet" href="/projects/zvyezdy-vserossiyskoy-violonchelnoy-akademii/style.css">
<link rel="stylesheet" href="/projects/otkrytye-proslushivaniya/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1.15/dist/fancybox/fancybox.css">

<section class="hero-secondary stars-hero">
    <div class="hero-secondary__bg">
        <img src="<?= $img ?>/hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/projects/">Наши проекты</a> / Цикл концертов</p>
        <h1 class="hero-secondary__title">Звёзды Всероссийской<br>виолончельной академии</h1>
        <p class="hero-secondary__subtitle">Известные виолончелисты с мировым именем и молодые таланты — на одной сцене.</p>
        <a href="#concert" class="btn btn--primary">Финальный концерт сезона</a>
    </div>
</section>

<section class="stars-intro">
    <div class="section__container stars-intro__grid">
        <div>
            <p>«Звёзды Всероссийской виолончельной академии» — цикл концертов, в которых сходятся выдающиеся исполнители и молодые музыканты Академии. Программы показывают выразительность виолончели и разнообразие её исполнительских направлений.</p>
            <p>Финальным концертом сезона стал вечер в Большом зале Московской консерватории, где солисты выступили вместе с Московским государственным академическим симфоническим оркестром.</p>
        </div>
        <blockquote class="stars-quote">
            <p>«Собрать на одной сцене как известных виолончелистов с мировым именем, так и молодых талантливых ребят»</p>
            <footer>Анастасия Ушакова, основатель и художественный руководитель Академии</footer>
        </blockquote>
    </div>
</section>

<section class="stars-concert" id="concert">
    <div class="section__container">
        <div class="stars-concert__head">
            <p class="stars-concert__date">2 июня</p>
            <div>
                <p class="stars-muted">Финальный концерт сезона · 2026 · 19:00</p>
                <h2 class="section__title">Звёзды Всероссийской виолончельной академии</h2>
            </div>
        </div>
        <div class="stars-facts">
            <article>
                <h3>Место</h3>
                <p>Большой зал Московской консерватории имени П. И. Чайковского</p>
            </article>
            <article>
                <h3>Оркестр</h3>
                <p>Московский государственный академический симфонический оркестр (МГАСО)</p>
            </article>
            <article>
                <h3>Дирижёр</h3>
                <p>Иван Никифорчин, художественный руководитель МГАСО</p>
            </article>
        </div>
    </div>
</section>

<section class="stars-soloists">
    <div class="section__container">
        <h2 class="section__title">Солисты</h2>
        <p class="stars-muted">Известные исполнители и молодые виолончелисты Академии</p>
        <div class="stars-soloists__grid">
            <?php foreach ($soloists as $name): ?>
            <article>
                <span class="stars-soloists__photo" aria-hidden="true"></span>
                <p><?= htmlspecialcharsbx($name) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="stars-program">
    <div class="section__container stars-program__grid">
        <div>
            <p class="stars-program__label">Программа</p>
            <h2 class="section__title section__title--light">Произведения композиторов разных эпох</h2>
            <p>От барокко до современной музыки: восемь композиторов, десять сочинений для виолончели с оркестром.</p>
        </div>
        <ul>
            <?php foreach ($program as $piece): ?>
            <li>
                <span><?= htmlspecialcharsbx($piece[0]) ?></span>
                <span><?= htmlspecialcharsbx($piece[1]) ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="stars-media">
    <div class="section__container">
        <div class="section__header">
            <div>
                <h2 class="section__title">Фото и видео концерта</h2>
                <p class="stars-muted">Большой зал Московской консерватории, 2 июня 2026</p>
            </div>
            <a href="/mediacenter/photo/detail.php?ID=19" class="section__link">Весь альбом</a>
        </div>
        <div class="stars-media__grid">
            <a href="#" class="stars-media__video">
                <img src="<?= $img ?>/photo-1.jpg" alt="">
                <span class="stars-play" aria-hidden="true"></span>
            </a>
            <img src="<?= $img ?>/photo-2.jpg" alt="">
            <img src="<?= $img ?>/photo-3.jpg" alt="">
        </div>
    </div>
</section>

<section class="stars-paris">
    <div class="section__container stars-paris__grid">
        <div class="stars-paris__photos" aria-hidden="true">
            <span></span><span></span><span></span>
        </div>
        <div>
            <p class="stars-kicker">Париж · январь 2026</p>
            <h2 class="section__title">«Звёзды Всероссийской виолончельной академии в Париже»</h2>
            <p>Фестиваль Les Vedettes de l'Académie russe de violoncelle: три концерта, в которых Академию представляли Мария Зайцева, Михаил Пейсель, Анна Фетри и Анастасия Кузаева.</p>
            <a href="/projects/mezhdunarodnye-obmeny/" class="section__link">Подробнее — в проекте «Международные проекты»</a>
        </div>
    </div>
</section>

<section class="stars-follow-cycle">
    <div class="section__container">
        <h2 class="section__title section__title--light">Следите за новыми концертами цикла</h2>
        <p>Анонсы концертов публикуются в разделах «Афиша» и «Новости».</p>
        <a href="/afisha/" class="btn btn--primary">Перейти в афишу</a>
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
    document.querySelectorAll('main img:not(.hero-secondary__bg-img):not([aria-hidden="true"])').forEach(function (img) {
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
