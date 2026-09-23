/* Лайтбокс фотополос раздела «Академия».
   Подключается на academy_about.html, academy_mission.html,
   academy_history.html после script.js.
   Полос на странице может быть несколько (на «Истории Академии» — своя
   в каждом слайде года): кадры берутся из той полосы, по которой
   кликнули, стрелки ‹ › ведут по ней. Один скрипт на все страницы
   раздела — лайтбокс не дублируется. */
document.addEventListener('DOMContentLoaded', function () {
  var grids = Array.prototype.slice.call(document.querySelectorAll('.mission-life__grid'));
  if (!grids.length) return;

  var box = document.createElement('div');
  box.className = 'about-lightbox';
  box.setAttribute('role', 'dialog');
  box.setAttribute('aria-modal', 'true');
  box.style.display = 'none';
  box.innerHTML =
    '<img class="about-lightbox__img" src="" alt="">' +
    '<button class="about-lightbox__btn about-lightbox__btn--prev" type="button" aria-label="Предыдущее фото">\u2039</button>' +
    '<button class="about-lightbox__btn about-lightbox__btn--next" type="button" aria-label="Следующее фото">\u203a</button>' +
    '<button class="about-lightbox__btn about-lightbox__btn--close" type="button" aria-label="Закрыть">\u00d7</button>' +
    '<p class="about-lightbox__counter"></p>';
  document.body.appendChild(box);

  var img = box.querySelector('.about-lightbox__img');
  var counter = box.querySelector('.about-lightbox__counter');
  var items = [];
  var current = -1;

  function show(i) {
    if (!items.length) return;
    current = (i + items.length) % items.length;
    img.src = items[current].getAttribute('src');
    img.alt = items[current].getAttribute('alt') || '';
    counter.textContent = (current + 1) + ' / ' + items.length;
    box.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function close() {
    box.style.display = 'none';
    document.body.style.overflow = '';
    current = -1;
  }

  grids.forEach(function (grid) {
    grid.addEventListener('click', function (e) {
      var item = e.target.closest('.mission-life__item');
      if (!item) return;
      items = Array.prototype.slice.call(grid.querySelectorAll('.mission-life__item img'));
      var i = items.indexOf(item.querySelector('img'));
      if (i > -1) show(i);
    });
  });

  box.querySelector('.about-lightbox__btn--prev').addEventListener('click', function (e) {
    e.stopPropagation();
    show(current - 1);
  });
  box.querySelector('.about-lightbox__btn--next').addEventListener('click', function (e) {
    e.stopPropagation();
    show(current + 1);
  });
  box.querySelector('.about-lightbox__btn--close').addEventListener('click', function (e) {
    e.stopPropagation();
    close();
  });
  box.addEventListener('click', function (e) {
    if (e.target === box) close();
  });

  document.addEventListener('keydown', function (e) {
    if (current < 0) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft') show(current - 1);
    if (e.key === 'ArrowRight') show(current + 1);
  });
});
