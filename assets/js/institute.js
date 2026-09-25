/* Оглавление страницы «Институт исследований и методологии».

   Пока оглавление видно в потоке, скрипт ничего не делает. Как только
   страница прокручена ниже него (верх первой секции ушёл за верх окна),
   на .page ставится institute-page--toc-floating: та же разметка
   переезжает в фиксированную панель справа по центру экрана и
   сворачивается в кружок. Клик по кружку разворачивает панель
   (institute-page--toc-open), клик по ссылке или мимо панели — сворачивает.
   Показ и анимацию делает CSS (styles.institute.css). */
document.addEventListener('DOMContentLoaded', function () {
  var page = document.querySelector('.page');
  var toc = document.querySelector('.institute-toc');
  var fab = toc && toc.querySelector('.institute-toc__fab');
  var mark = document.getElementById('inst-mission');
  if (!page || !toc || !fab || !mark) return;

  function close() {
    page.classList.remove('institute-page--toc-open');
    fab.setAttribute('aria-expanded', 'false');
  }

  function sync() {
    var floating = mark.getBoundingClientRect().top < 0;
    if (floating === page.classList.contains('institute-page--toc-floating')) return;
    page.classList.toggle('institute-page--toc-floating', floating);
    close();
  }

  fab.addEventListener('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var open = page.classList.toggle('institute-page--toc-open');
    fab.setAttribute('aria-expanded', open ? 'true' : 'false');
  });

  toc.addEventListener('click', function (e) {
    if (e.target.closest('.institute-toc__title, .institute-toc__list a')) close();
  });

  document.addEventListener('click', function (e) {
    if (!page.classList.contains('institute-page--toc-open')) return;
    if (e.target.closest('.institute-toc')) return;
    close();
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') close();
  });

  window.addEventListener('scroll', sync, { passive: true });
  window.addEventListener('resize', sync);
  sync();
});
