/* ============================================================
   assets/js/faq.js — спойлеры «Часто задаваемых вопросов»
   ------------------------------------------------------------
   Открывает и закрывает ответ по клику на вопрос.

   Что делает скрипт (ровно то, чего ждёт styles.faq.css):
   - высота ответа — inline-стилем max-height прямо на .faq-item__a
     (0px закрыт / scrollHeight внутренней обёртки открыт);
     переход max-height браузер проигрывает только при смене
     самого свойства, от смены css-переменной он не срабатывает;
   - значок «плюс → минус» — переменные --faq-rot и --faq-op
     на .faq-item, их читает .faq-item__icon::after;
   - aria-expanded на кнопке-вопросе — для скринридеров.

   Один открытый ответ в списке: открытие нового закрывает
   предыдущий в той же группе. Атрибут data-faq-multi
   на .faq-list разрешает держать открытыми несколько.
   ============================================================ */
(function () {
  function setOpen(item, open) {
    var panel = item.querySelector('.faq-item__a');
    var inner = item.querySelector('.faq-item__a-inner');
    if (panel) panel.style.maxHeight = open && inner ? inner.scrollHeight + 'px' : '0px';
    item.style.setProperty('--faq-rot', open ? '90deg' : '0deg');
    item.style.setProperty('--faq-op', open ? '0' : '1');
    var q = item.querySelector('.faq-item__q');
    if (q) q.setAttribute('aria-expanded', open ? 'true' : 'false');
  }

  function isOpen(item) {
    return item.style.getPropertyValue('--faq-rot') === '90deg';
  }

  function init(scope) {
    var lists = (scope || document).querySelectorAll('.faq-list');
    Array.prototype.forEach.call(lists, function (list) {
      if (list.dataset.faqReady) return;
      list.dataset.faqReady = '1';
      list.addEventListener('click', function (e) {
        var btn = e.target.closest('.faq-item__q');
        if (!btn || !list.contains(btn)) return;
        var item = btn.closest('.faq-item');
        var wasOpen = isOpen(item);
        if (!list.hasAttribute('data-faq-multi')) {
          Array.prototype.forEach.call(list.querySelectorAll('.faq-item'), function (other) {
            if (other !== item && isOpen(other)) setOpen(other, false);
          });
        }
        setOpen(item, !wasOpen);
      });
      // высота пересчитывается при смене ширины окна: текст ответа
      // перевёрстывается, и зафиксированный max-height начинает резать
      window.addEventListener('resize', function () {
        Array.prototype.forEach.call(list.querySelectorAll('.faq-item'), function (item) {
          if (isOpen(item)) setOpen(item, true);
        });
      });
    });
  }

  window.initFaq = init;

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () { init(document); });
  } else {
    init(document);
  }
})();
