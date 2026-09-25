<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
$APPLICATION->SetAdditionalCSS('/styles.about.css');
$APPLICATION->SetAdditionalCSS('/styles.coop.css');
$APPLICATION->AddHeadScript('/assets/js/about.js');
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Сотрудничество');
$APPLICATION->SetPageProperty('title', 'Сотрудничество — Всероссийская виолончельная академия');
?>
<section class="hero-secondary hero-secondary--coop">
      <div class="hero-secondary__bg">
        <img src="/assets/images/coop-hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true" />
      </div>
      <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Сотрудничество</h1>
        <div class="coop-hero__actions">
          <a href="/kontakty" class="btn btn--primary">КОНТАКТЫ</a>
        </div>
      </div>
    </section>

    <section class="about-intro about-intro--coop">
      <div class="section__container">

        <div class="about-structure__grid coop-intro__grid">
          <div class="coop-text">
            <p class="academy-mission__text"><strong>Виолончельная академия</strong> — частная культурная инициатива, которая создаёт и реализует собственные проекты, направленные на развитие виолончельной культуры. Наши приоритеты отражены в разделе «<a href="/missiya-i-tsennosti" class="coop-link">Цели и миссия</a>».</p>
            <p class="academy-mission__text">Мы рассматриваем предложения, которые представляют художественный и содержательный интерес для Академии и приносят пользу виолончельному сообществу. Возможность совместной работы зависит от решения художественного руководства, планов сезона и организационных ресурсов. Формат и условия сотрудничества обсуждаются индивидуально.</p>
          </div>
          <div class="about-structure__image">
            <img src="/assets/images/coop-photo.jpg" alt="Участники проекта Академии на сцене" />
          </div>
        </div>

        <div class="coop-gallery">
          <div class="mission-life__grid">
            <div class="mission-life__item"><img src="/assets/images/coop-life1.jpg" alt="Виолончелист и пианист на сцене" /></div>
            <div class="mission-life__item"><img src="/assets/images/coop-life2.jpg" alt="Участники и гости Академии в фойе" /></div>
            <div class="mission-life__item"><img src="/assets/images/coop-life3.jpg" alt="Печатные издания на стойках в фойе" /></div>
            <div class="mission-life__item"><img src="/assets/images/coop-life4.jpg" alt="Беседа с музыкантом на сцене перед публикой" /></div>
            <div class="mission-life__item mission-life__item--wide"><img src="/assets/images/coop-life5.jpg" alt="Показ фильма в зале" /></div>
          </div>
        </div>

      </div>
    </section>

    <section class="about-directions coop-directions">
      <div class="section__container">
        <div class="academy-sections__grid about-directions__grid">

          <div class="academy-section-card">
            <span class="academy-section-card__title">Музыкантам и педагогам</span>
            <p class="about-directions__card-text">Сотрудничество с музыкантами и педагогами строится вокруг участия в конкретных концертных и образовательных проектах Академии. Информация о возможностях участия публикуется на страницах проектов и в объявлениях об открытых наборах. Подробнее о прослушиваниях — в разделе «<a href="/otkrytye-proslushivaniya" class="coop-link coop-link--light">Открытые прослушивания</a>».</p>
            <p class="about-directions__card-text">Академия не оказывает услуги по индивидуальному продвижению и менеджменту артистов. Обращение с предложением само по себе не предполагает включения в концертные или образовательные программы.</p>
            <span class="academy-section-card__line"></span>
          </div>

          <div class="academy-section-card">
            <span class="academy-section-card__title">Учреждениям культуры, учебным заведениям и организаторам</span>
            <p class="about-directions__card-text">Мы рассматриваем предложения о проведении проектов Академии на новых площадках, совместных концертах, образовательных событиях и профессиональных встречах. Возможно участие Академии в фестивалях с отдельным проектом, разработка художественной программы в отдельно взятых случаях и информационное партнёрство.</p>
            <p class="about-directions__card-text">Поездки в регионы России организуются в рамках проекта «Виолончельная академия в регионах». Для проведения событий необходима принимающая сторона, готовая содействовать в предоставлении площадки и решении организационных вопросов на месте.</p>
            <p class="about-directions__card-text">Академия также открыта к обсуждению международных творческих и образовательных проектов.</p>
            <span class="academy-section-card__line"></span>
          </div>

          <div class="academy-section-card">
            <span class="academy-section-card__title">Авторам, исследователям и издателям</span>
            <p class="about-directions__card-text">В редакцию CelloЖурнала можно направить готовую статью или предложить тему публикации. Решение принимает редакционная комиссия с учётом содержания материала, тематики и объёма номера.</p>
            <p class="about-directions__card-text">С издательствами, библиотеками и владельцами архивов возможно сотрудничество в работе с историческими материалами, подготовке и издании книг и нот.</p>
            <span class="academy-section-card__line"></span>
          </div>

          <div class="academy-section-card">
            <span class="academy-section-card__title">СМИ и информационным партнёрам</span>
            <p class="about-directions__card-text">Возможные направления сотрудничества — освещение деятельности Академии, информационное партнёрство и подготовка совместных просветительских материалов.</p>
            <p class="about-directions__card-text">Предложить сторонний проект для публикации можно через сообщество Академии во «<a href="https://vk.ru/violoncello_music" class="coop-link coop-link--light" target="_blank" rel="noopener">ВКонтакте</a>». Размещение рассматривается индивидуально. На сайте и в других социальных сетях Академии сторонние анонсы не публикуются.</p>
            <span class="academy-section-card__line"></span>
          </div>

          <div class="academy-section-card">
            <span class="academy-section-card__title">Компаниям, фондам и мастерам</span>
            <p class="about-directions__card-text">Мы рассматриваем предложения о совместных культурных и просветительских инициативах. Сотрудничество с музыкальными мастерами, производителями и профильными компаниями возможно как в отдельных проектах, так и в рамках ежегодной Всероссийской виолончельной академии.</p>
            <span class="academy-section-card__line"></span>
          </div>

          <div class="academy-section-card">
            <span class="academy-section-card__title">Специалистам и волонтёрам</span>
            <p class="about-directions__card-text">Если вы хотите предложить свои профессиональные компетенции для работы над проектами Академии, можно направить предложение и портфолио на почту <a href="mailto:org@cello-academy.ru" class="coop-link coop-link--light">org@cello-academy.ru</a></p>
            <p class="about-directions__card-text">Набор волонтёров проводится для конкретных проектов. Объявления о таких возможностях публикуются в новостях Академии.</p>
            <span class="academy-section-card__line"></span>
          </div>

        </div>
      </div>
    </section>

    <section class="about-intro coop-contacts">
      <div class="section__container">
        <div class="section__header">
          <h3 class="section__title">Как связаться</h3>
        </div>
        <div class="coop-text">
          <p class="academy-mission__text">Идеи и предложения о сотрудничестве, материалы для редакции и вопросы о региональных проектах можно направлять на почту <a href="mailto:org@cello-academy.ru" class="coop-link">org@cello-academy.ru</a></p>
        </div>
        <div class="coop-contacts__actions">
          <a href="/kontakty" class="btn btn--primary">КОНТАКТЫ</a>
        </div>
      </div>
    </section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
