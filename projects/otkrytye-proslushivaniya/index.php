<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Открытые прослушивания');
$APPLICATION->SetPageProperty('title', 'Открытые прослушивания — Проекты');
$img = '/projects/otkrytye-proslushivaniya/images';
?>
<link rel="stylesheet" href="/local/templates/main/template_styles.css">
<link rel="stylesheet" href="/projects/otkrytye-proslushivaniya/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1.15/dist/fancybox/fancybox.css">

<section class="hero-secondary aud-hero">
    <div class="hero-secondary__bg">
        <img src="<?= $img ?>/hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <p class="hero-secondary__breadcrumb"><a href="/projects/">Наши проекты</a> / Ежегодно · перед началом каждого сезона</p>
        <h1 class="hero-secondary__title">Открытые прослушивания</h1>
        <p class="hero-secondary__subtitle">Возможность заявить о себе, получить профессиональную обратную связь и открыть новые перспективы участия в проектах Академии.</p>
        <a href="https://cello-audition.ru" class="btn btn--primary">Перейти на сайт открытого прослушивания</a>
    </div>
</section>

<section class="aud-intro">
    <div class="section__container aud-intro__grid">
        <div>
            <p>Открытые прослушивания Виолончельной академии — возможность заявить о себе, получить профессиональную обратную связь и открыть новые перспективы участия в её проектах. Для Академии это способ познакомиться с новыми виолончелистами и найти музыкантов, чьё дальнейшее развитие она могла бы поддержать.</p>
            <p>Впервые прослушивания состоялись в 2026 году. Теперь они будут проходить ежегодно, перед началом каждого сезона, объединяя музыкантов разных возрастов и из разных городов в профессиональное сообщество.</p>
        </div>
        <aside class="aud-note">
            <h2>Подробнее — на сайте</h2>
            <p>Здесь мы рассказываем о прослушивании в целом. Условия, расписание и список участников текущего года — на отдельном сайте.</p>
            <a href="https://cello-audition.ru" class="section__link">cello-audition.ru</a>
        </aside>
    </div>
</section>

<section class="aud-who">
    <div class="section__container">
        <h2 class="section__title">Возможность быть услышанным</h2>
        <p class="aud-muted">Для участия достаточно желания выступить</p>
        <div class="aud-cards">
            <article>
                <p class="aud-cards__num">01</p>
                <h3>Любой виолончелист</h3>
                <p>Независимо от возраста, страны проживания, места обучения или педагога.</p>
            </article>
            <article>
                <p class="aud-cards__num">02</p>
                <h3>Без рекомендаций</h3>
                <p>Не нужны рекомендации, личные знакомства или предварительное приглашение.</p>
            </article>
            <article>
                <p class="aud-cards__num">03</p>
                <h3>Бесплатно</h3>
                <p>Участие бесплатное. Заявки принимаются через онлайн-анкету.</p>
            </article>
        </div>
        <p>Прослушивания открыты и для тех, кто впервые знакомится с Академией, и для участников её мастер-классов, концертов и других проектов. Это возможность встретиться вновь, представить результаты своей работы и обсудить дальнейшие творческие планы.</p>
    </div>
</section>

<section class="aud-how">
    <div class="section__container aud-how__grid">
        <div>
            <h2 class="section__title">Как проходят прослушивания</h2>
            <p class="aud-muted">Очный формат · свободная программа</p>
            <p>Участники выступают очно перед комиссией, в которую входят исполнители, педагоги и представители Академии. Программа свободная: каждый музыкант выбирает произведения, позволяющие представить себя и свои исполнительские возможности.</p>
            <p>Можно выступить со своим концертмейстером, воспользовавшись помощью концертмейстера Академии или исполнить сочинения для виолончели соло.</p>
            <p>После выступления проходит беседа с участником. Члены комиссии делятся впечатлениями, дают рекомендации по работе над программой и дальнейшему развитию. Такое общение помогает взглянуть на своё исполнение со стороны, определить направления работы и найти новые творческие ориентиры.</p>
            <p>Прослушивания могут посетить и слушатели. Для участников это также возможность услышать коллег, познакомиться с педагогами и другими музыкантами, погрузиться в атмосферу Академии.</p>
        </div>
        <aside>
            <p class="aud-time"><span>7–10</span> минут в среднем на выступление</p>
            <article class="aud-note">
                <h2>Что учесть</h2>
                <p>Можно играть по нотам. Комиссия может остановить выступление в любой момент. Отдельных репетиций с концертмейстером Академии не предусмотрено — договориться можно заранее. Иногородние участники организуют проезд и проживание самостоятельно.</p>
            </article>
            <a href="/academy/faq/" class="section__link">Частые вопросы</a>
        </aside>
    </div>
</section>

<section class="aud-next">
    <div class="section__container">
        <p class="aud-next__label">Перспективы сотрудничества</p>
        <h2 class="section__title section__title--light">Знакомство на прослушивании может привести к приглашению в проекты Академии</h2>
        <div class="aud-pills">
            <span>Концерты</span>
            <span>Образовательные программы</span>
            <span>Камерные и ансамблевые проекты</span>
            <span>Съёмки и записи</span>
        </div>
        <div class="aud-next__grid">
            <div>
                <p>Академия развивает концертные, образовательные и медиапроекты, предлагая музыкантам разные формы творческого и профессионального взаимодействия.</p>
                <p>В сезоне 2025–2026 участники её проектов выступали в Московской консерватории и Большом зале Санкт-Петербургской филармонии, давали концерты в российских регионах — с оркестром, с сольными программами и в ансамблях. Они также участвовали в фестивалях во Франции и Италии, творческих лабораториях и закрытых мастер-классах.</p>
            </div>
            <div>
                <p>Среди направлений дальнейшей работы — региональные гастрольные программы, развитие постоянных виолончельных ансамблей и программы для молодых солистов.</p>
                <p>Возможны и другие формы поддержки: предоставление пространства для занятий в репетитории и инструментов из Инструментального фонда.</p>
            </div>
        </div>
    </div>
</section>

<section class="aud-offers">
    <div class="section__container">
        <div class="aud-offers__grid">
            <article class="aud-note">
                <h2>Предложения — индивидуально</h2>
                <p>Академии интересны музыканты с разным опытом: для каждого проекта важны свои исполнительские качества, интересы и готовность к совместной работе.</p>
            </article>
            <article class="aud-note">
                <h2>Сотрудничество — сразу или позднее</h2>
                <p>Оно может начаться как непосредственно после прослушивания, так и позднее — с появлением подходящей программы или творческой задачи. Знакомство создаёт основу для дальнейшего взаимодействия.</p>
            </article>
        </div>
        <p class="aud-offers__links">
            <a href="/academy/repetitory/" class="section__link">Репетиторий</a>
            <a href="/academy/fond/" class="section__link">Инструментальный фонд</a>
        </p>
    </div>
</section>

<section class="aud-first">
    <div class="section__container aud-first__grid">
        <div>
            <p class="aud-muted">29, 30 августа и 2 сентября 2026</p>
            <h2 class="section__title">Первые открытые прослушивания</h2>
            <p>Первые открытые прослушивания прошли 29, 30 августа и 2 сентября 2026 года в Москве, в пространстве Виолончельной академии.</p>
            <p>Всего за сутки на участие поступило свыше 90 заявок.</p>
            <p>Три дня выступлений и общения стали началом новых профессиональных знакомств. По их итогам Академия формирует предложения об участии музыкантов в своих программах и проектах.</p>
            <div class="aud-photos">
                <img src="<?= $img ?>/photo-1.jpg" alt="">
                <img src="<?= $img ?>/photo-2.jpg" alt="">
                <img src="<?= $img ?>/photo-3.jpg" alt="">
            </div>
        </div>
        <aside class="aud-commission">
            <h3>Комиссия</h3>
            <ul>
                <li>Александр Рамм</li>
                <li>Мария Зайцева</li>
                <li>Борис Андрианов</li>
                <li>Кирилл Кравцов</li>
                <li>Анастасия Ушакова <span>создатель и художественный руководитель академии</span></li>
            </ul>
        </aside>
    </div>
</section>

<section class="aud-cta">
    <div class="section__container">
        <h2 class="section__title section__title--light">Хотите принять участие<br>или прийти слушателем?</h2>
        <p>Условия, расписание и регистрация — на сайте открытого прослушивания.</p>
        <a href="https://cello-audition.ru" class="btn btn--primary">Перейти на сайт открытого прослушивания</a>
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
            if (existingLink.hasAttribute('data-fancybox')) {
                return;
            }

            const href = existingLink.getAttribute('href');
            if (href && href !== '#') {
                return;
            }

            existingLink.href = img.currentSrc || img.src;
            existingLink.setAttribute('data-fancybox', 'project-gallery');
            if (img.alt) {
                existingLink.setAttribute('data-caption', img.alt);
            }
            return;
        }

        const link = document.createElement('a');
        link.href = img.currentSrc || img.src;
        link.setAttribute('data-fancybox', 'project-gallery');
        link.style.cursor = 'zoom-in';
        if (img.alt) {
            link.setAttribute('data-caption', img.alt);
        }
        img.parentNode.insertBefore(link, img);
        link.appendChild(img);
    });

    if (window.Fancybox) {
        Fancybox.bind('[data-fancybox="project-gallery"]', { Hash: false });
    }
});
</script>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
