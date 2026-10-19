<?
// 19.10.2026: страница проекта временно закрыта заглушкой /soon/. Чтобы вернуть страницу, удалите эти 3 строки.
require $_SERVER['DOCUMENT_ROOT'] . '/soon/index.php';
exit;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("История виолончельного исполнительства");
$APPLICATION->SetAdditionalCSS("/assets/css/styles.lectures.css");
?>
<section class="hero-secondary hero-secondary--lectures hero-secondary--history">
    <div class="hero-secondary__bg">
        <img src="/assets/images/lectures/lukashina.png" alt="" class="hero-secondary__bg-img" aria-hidden="true">
    </div>
    <div class="hero-secondary__content">
        <h1 class="hero-secondary__title">История виолончельного исполнительства</h1>
    </div>
</section>
<section class="about-intro">
    <div class="section__container">
        <div class="about-intro__grid">
            <div class="lecture-text">
                <p class="academy-mission__text">«История виолончельного исполнительства» — авторский цикл лекций Татьяны Лукашиной. Проект посвящён истории инструмента и исполнительского искусства: от эпохи виолы да гамба и первых виолончелистов до современных музыкальных традиций.</p>
                <p class="academy-mission__text">В центре лекций — музыканты, чьи творческие открытия определили развитие виолончельного искусства. Через их судьбы, сочинения и педагогическую деятельность раскрывается история исполнительских школ, становления репертуара и расширения возможностей инструмента. Первые выпуски знакомят зрителей с зарождением виолончельного исполнительства и итальянскими мастерами Доменико Габриелли и Джованни Бонончини.</p>
                <p class="academy-mission__text">Цикл адресован учащимся, студентам, педагогам, профессиональным исполнителям и всем, кто интересуется виолончелью и историей музыки. Лекции помогают увидеть знакомые произведения в контексте своей эпохи и познакомиться с музыкантами, чьё наследие заслуживает большего внимания.</p>
            </div>
            <div class="about-intro__image">
                <img src="/assets/images/lectures/history-1.jpg" alt="Обложка цикла «История виолончельного исполнительства»">
            </div>
        </div>
    </div>
</section>
<section class="about-directions lecture-person">
    <div class="section__container">
        <div class="about-structure__grid">
            <div class="lecture-person__photo lecture-person__photo--portrait">
                <img src="/assets/images/lectures/lukashina.jpg" alt="Татьяна Алексеевна Лукашина">
            </div>
            <div class="lecture-text">
                <p class="about-directions__card-text"><b>Татьяна Алексеевна Лукашина</b> — виолончелистка, педагог, доцент кафедры истории и теории исполнительского искусства Московской государственной консерватории имени П. И. Чайковского и Государственного музыкально-педагогического института имени М. М. Ипполитова-Иванова. Окончила Московскую консерваторию и ассистентуру-стажировку по специальности «виолончель». Автор методических пособий, нотных сборников, учебных программ и научных статей, научный руководитель Института исследований и методологии виолончельного искусства Виолончельной академии.</p>
            </div>
        </div>
    </div>
</section>
<section class="about-intro">
    <div class="section__container">
        <div class="lecture-text">
            <p class="academy-mission__text">Первый сезон проекта уже опубликован, на данный момент идут съёмки второго. На этой странице собран плейлист вышедших лекций.</p>
        </div>
        <div class="lecture-playlist">
                <?/* iframe: плейлист «История виолончельного исполнительства», 1 сезон */?>
            </div>
    </div>
</section>
<section class="lecture-outro">
    <div class="section__container">
        <div class="lecture-text">
            <p class="academy-mission__text">Проект реализуется в рамках деятельности Института исследований и методологии виолончельного искусства Виолончельной академии. Узнать больше об институте, его задачах и проектах можно на отдельной странице.</p>
            <a href="/academy/institute/" class="btn btn--primary">Подробнее об институте →</a>
        </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
