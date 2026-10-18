/* Фильтр афиши без перезагрузки: вкладки типа, месяц, город, проект, сброс.
   Карточки .event-card с data-type (несколько через пробел) / data-month / data-city / data-project.
   На сервере фильтр также работает через GET-параметры (index.php). */
(function (init) {
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})(function () {
  var root = document.querySelector('.afisha-filters');
  var cards = Array.prototype.slice.call(document.querySelectorAll('.afisha-events .event-card'));
  if (!root || !cards.length) return;
  var empty = document.querySelector('.afisha-events__empty');
  var state = { type: '', month: '', city: '', project: '' };

  function apply() {
    var shown = 0;
    cards.forEach(function (c) {
      var types = (c.dataset.type || '').split(' ');
      var ok = (!state.type || types.indexOf(state.type) > -1) &&
               (!state.month || c.dataset.month === state.month) &&
               (!state.city || c.dataset.city === state.city) &&
               (!state.project || c.dataset.project === state.project);
      c.classList.toggle('is-hidden', !ok);
      if (ok) shown++;
    });
    if (empty) empty.style.display = shown ? 'none' : '';
  }

  root.querySelectorAll('.afisha-filters__tab').forEach(function (tab) {
    tab.addEventListener('click', function (e) {
      e.preventDefault();
      root.querySelectorAll('.afisha-filters__tab').forEach(function (t) { t.classList.remove('afisha-filters__tab--active'); });
      tab.classList.add('afisha-filters__tab--active');
      state.type = tab.dataset.type || '';
      apply();
    });
  });
  root.querySelectorAll('.afisha-filters__dropdown select').forEach(function (sel) {
    sel.addEventListener('change', function () { state[sel.name] = sel.value; apply(); });
  });
  var reset = root.querySelector('.afisha-filters__reset');
  if (reset) reset.addEventListener('click', function (e) {
    e.preventDefault();
    state = { type: '', month: '', city: '', project: '' };
    root.querySelectorAll('.afisha-filters__tab').forEach(function (t, i) { t.classList.toggle('afisha-filters__tab--active', i === 0); });
    root.querySelectorAll('.afisha-filters__dropdown select').forEach(function (s) { s.value = ''; });
    apply();
  });
  apply();
});
