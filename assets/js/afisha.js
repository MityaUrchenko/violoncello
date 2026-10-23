/* Фильтр афиши без перезагрузки: вкладки типа, прошедшие, месяц, город, проект, сброс.
   Карточки .event-card с data-type / data-month / data-city / data-project / data-past.
   На сервере фильтр также работает через GET-параметры (index.php). */
(function (init) {
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})(function () {
  var root = document.querySelector('.afisha-filters');
  var cards = Array.prototype.slice.call(document.querySelectorAll('.afisha-events .event-card'));
  if (!root || !cards.length) return;
  var empty = document.querySelector('.afisha-events__empty');
  var params = new URLSearchParams(window.location.search);
  var state = {
    type: params.get('type') || '',
    past: params.get('past') === '1',
    month: '',
    city: '',
    project: ''
  };

  function apply() {
    var shown = 0;
    cards.forEach(function (c) {
      var types = (c.dataset.type || '').split(' ');
      var ok = (!state.type || types.indexOf(state.type) > -1) &&
               (!state.past || c.dataset.past === '1') &&
               (!state.month || c.dataset.month === state.month) &&
               (!state.city || c.dataset.city === state.city) &&
               (!state.project || c.dataset.project === state.project);
      c.classList.toggle('is-hidden', !ok);
      if (ok) shown++;
    });
    if (empty) empty.style.display = shown ? 'none' : '';
  }

  function setTypeActive(type) {
    root.querySelectorAll('.afisha-filters__tab[data-type]').forEach(function (t) {
      t.classList.toggle('afisha-filters__tab--active', (t.dataset.type || '') === type);
    });
  }

  function setPastActive(on) {
    var pastTab = root.querySelector('.afisha-filters__tab[data-past]');
    if (pastTab) pastTab.classList.toggle('afisha-filters__tab--active', !!on);
  }

  root.querySelectorAll('.afisha-filters__tab[data-type]').forEach(function (tab) {
    tab.addEventListener('click', function (e) {
      e.preventDefault();
      state.type = tab.dataset.type || '';
      setTypeActive(state.type);
      apply();
    });
  });

  var pastTab = root.querySelector('.afisha-filters__tab[data-past]');
  if (pastTab) {
    pastTab.addEventListener('click', function (e) {
      e.preventDefault();
      state.past = !state.past;
      setPastActive(state.past);
      apply();
    });
  }

  root.querySelectorAll('.afisha-filters__dropdown select').forEach(function (sel) {
    sel.addEventListener('change', function () { state[sel.name] = sel.value; apply(); });
  });

  var reset = root.querySelector('.afisha-filters__reset');
  if (reset) reset.addEventListener('click', function (e) {
    e.preventDefault();
    state = { type: '', past: false, month: '', city: '', project: '' };
    setTypeActive('');
    setPastActive(false);
    root.querySelectorAll('.afisha-filters__dropdown select').forEach(function (s) { s.value = ''; });
    apply();
  });

  setTypeActive(state.type);
  setPastActive(state.past);
  apply();
});
