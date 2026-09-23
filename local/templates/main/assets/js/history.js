/* Слайдер годов на «Истории Академии».
   Индекс активного слайда (1…5) ставится в data-active на каждой
   .history-slider__line и на .history-slider__viewport — показ слайда
   и подсветку точки на линии делает CSS (styles.history.css).
   Шкала продублирована под слайдом: переключение из нижней копии
   возвращает читателя к началу блока.
   Управление: точки на линии, стрелки, ←/→, свайп. */
document.addEventListener('DOMContentLoaded', function () {
  var slider = document.querySelector('.history-slider');
  var viewport = document.querySelector('.history-slider__viewport');
  if (!slider || !viewport) return;

  var navs = Array.prototype.slice.call(slider.querySelectorAll('.history-slider__nav'));
  var lines = Array.prototype.slice.call(slider.querySelectorAll('.history-slider__line'));
  var slides = Array.prototype.slice.call(viewport.querySelectorAll('.history-slider__slide'));
  if (!navs.length || !slides.length) return;

  var current = 0;

  function show(i) {
    current = (i + slides.length) % slides.length;
    var value = String(current + 1);
    lines.forEach(function (line) { line.setAttribute('data-active', value); });
    viewport.setAttribute('data-active', value);
  }

  function scrollToSlider(change) {
    var top = slider.getBoundingClientRect().top + window.pageYOffset - 16;
    if (Math.abs(window.pageYOffset - top) < 40) { change(); return; }
    window.scrollTo({ top: top, behavior: 'smooth' });
    // слайд меняем только после прокрутки: иначе высота блока прыгает
    // на ходу и страницу дёргает
    var timer;
    var done = function () {
      clearTimeout(timer);
      window.removeEventListener('scrollend', done);
      change();
    };
    window.addEventListener('scrollend', done, { once: true });
    timer = setTimeout(done, 700);
  }

  navs.forEach(function (nav) {
    var up = nav.classList.contains('history-slider__nav--bottom');

    Array.prototype.slice.call(nav.querySelectorAll('.history-slider__mark'))
      .forEach(function (mark, i) {
        mark.addEventListener('click', function (e) {
          e.preventDefault();
          if (up) scrollToSlider(function () { show(i); });
          else show(i);
        });
      });

    var prev = nav.querySelector('.history-slider__arrow--prev');
    var next = nav.querySelector('.history-slider__arrow--next');
    if (prev) prev.addEventListener('click', function () {
      if (up) scrollToSlider(function () { show(current - 1); });
      else show(current - 1);
    });
    if (next) next.addEventListener('click', function () {
      if (up) scrollToSlider(function () { show(current + 1); });
      else show(current + 1);
    });
  });

  document.addEventListener('keydown', function (e) {
    // когда открыт лайтбокс, стрелки принадлежат ему
    var box = document.querySelector('.about-lightbox');
    if (box && box.style.display === 'flex') return;
    if (e.key === 'ArrowLeft') show(current - 1);
    if (e.key === 'ArrowRight') show(current + 1);
  });

  var touchX = null;
  viewport.addEventListener('touchstart', function (e) {
    touchX = e.touches[0].clientX;
  }, { passive: true });
  viewport.addEventListener('touchend', function (e) {
    if (touchX === null) return;
    var dx = e.changedTouches[0].clientX - touchX;
    touchX = null;
    if (Math.abs(dx) > 50) show(current + (dx < 0 ? 1 : -1));
  });

  show(0);
});
