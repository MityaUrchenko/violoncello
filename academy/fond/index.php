<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
$APPLICATION->SetAdditionalCSS('/styles.about.css');
$APPLICATION->SetAdditionalCSS('/styles.fond.css');
$APPLICATION->AddHeadScript('/assets/js/about.js');
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Инструментальный фонд');
$APPLICATION->SetPageProperty('title', 'Инструментальный фонд — Всероссийская виолончельная академия');
?>
<section class="hero-secondary hero-secondary--fond">
      <div class="hero-secondary__bg">
        <img src="/assets/images/fond-hero.jpg" alt="" class="hero-secondary__bg-img" aria-hidden="true" />
      </div>
      <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">Инструментальный фонд</h1>
      </div>
    </section>

    <section class="about-intro about-intro--fond">
      <div class="section__container">

        <div class="about-people__photo">
          <img src="/assets/images/fond-photo.jpg" alt="Виолончель работы Габриэля Джебрана Якуба, созданная для Виолончельной академии" />
        </div>

        <div class="fond-text">
          <p class="academy-mission__text">Инструментальный фонд Виолончельной академии — одно из направлений системной поддержки профессионального развития виолончелистов.</p>
          <p class="academy-mission__text">Академия по собственной инициативе предоставляет инструменты из своего фонда музыкантам, чьё профессиональное развитие считает важным поддержать: постоянным участникам проектов Академии, молодым перспективным виолончелистам и другим артистам, связанным с её деятельностью.</p>
          <p class="academy-mission__text">Особое место в фонде занимают инструменты, созданные мастерами специально для Виолончельной академии.</p>
          <p class="academy-mission__text">В 2026 году мастер <strong>Роман Наумов</strong> изготовил для Академии виолончель, которая вошла в постоянную коллекцию Инструментального фонда.</p>
          <p class="academy-mission__text">Ещё один уникальный инструмент фонда — виолончель работы <strong>Габриэля Джебрана Якуба</strong>, также созданная специально для Виолончельной академии. Первым музыкантом, сыгравшим на новом инструменте, стал Александр Рамм.</p>
        </div>

        <div class="fond-gallery">
          <div class="mission-life__grid">
            <div class="mission-life__item"><img src="/assets/images/fond-life1.jpg" alt="Инкрустация с эмблемой Виолончельной академии на корпусе инструмента" /></div>
            <div class="mission-life__item"><img src="/assets/images/fond-life2.jpg" alt="Эф и корпус виолончели крупным планом" /></div>
            <div class="mission-life__item"><img src="/assets/images/fond-life3.jpg" alt="Колки виолончели с инкрустацией" /></div>
            <div class="mission-life__item"><img src="/assets/images/fond-life4.jpg" alt="Головка виолончели с колками" /></div>
          </div>
        </div>

      </div>
    </section>

    <section class="about-directions fond-master">
      <div class="section__container">
        <div class="section__header">
          <h3 class="section__title section__title--light">Габриэль Джебран Якуб</h3>
        </div>
        <div class="about-structure__grid">
          <div class="about-structure__image">
            <img src="/assets/images/fond-life5.jpg" alt="Александр Рамм играет на виолончели Габриэля Джебрана Якуба" />
          </div>
          <div class="fond-text">
            <p class="about-directions__card-text">Габриэль Джебран Якуб — виолончелист и всемирно известный мастер струнно-смычковых инструментов, учившийся и работавший в Кремоне. Его инструменты звучат в ведущих оркестрах мира, а среди музыкантов, с которыми мастер работал, — Наталия Гутман, Гидон Кремер, Миша Майский, Йо-Йо Ма, Жанин Янсен, Александр Бузлов и Александр Рамм. Якуб также является главным хранителем инструментов Фонда Даниэля Баренбойма в Берлине и сотрудничает с рядом крупных международных музыкальных фондов.</p>
            <p class="about-directions__card-text">Виолончельная академия не только приобретает инструменты для своего фонда, но и выступает инициатором создания новых инструментов специально для Академии. Так фонд постепенно формирует собственную коллекцию современных мастеровых инструментов, каждый из которых создаётся для активной профессиональной жизни — концертов, проектов Академии и работы молодых музыкантов.</p>
          </div>
        </div>
      </div>
    </section>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
