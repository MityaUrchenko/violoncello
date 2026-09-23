document.addEventListener('DOMContentLoaded', () => {
  const burger = document.querySelector('.header__burger');
  const nav = document.querySelector('.header__nav');
  const header = document.querySelector('.header');

  if (burger && nav && header) {
    const toggleMenu = () => {
      const isOpen = nav.classList.toggle('is-open');
      burger.classList.toggle('is-active', isOpen);
      header.classList.toggle('is-menu-open', isOpen);
      burger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      document.body.style.overflow = isOpen ? 'hidden' : '';
    };

    burger.addEventListener('click', toggleMenu);

    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        if (nav.classList.contains('is-open')) {
          toggleMenu();
        }
      });
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        toggleMenu();
      }
    });

    header.addEventListener('click', (e) => {
      if (e.target === header && nav.classList.contains('is-open')) {
        toggleMenu();
      }
    });
  }

  // Team Owl Carousel (contacts page)
  if (typeof jQuery !== 'undefined' && jQuery.fn.owlCarousel) {
    const $carousel = jQuery('#teamCarousel');
    if ($carousel.length) {
      $carousel.owlCarousel({
        items: 2,
        margin: 24,
        loop: false,
        nav: false,
        dots: false,
        responsive: {
          0: { items: 1 },
          768: { items: 2 }
        }
      });

      const prevBtn = document.querySelector('.team__nav-btn[aria-label="Предыдущий"]');
      const nextBtn = document.querySelector('.team__nav-btn[aria-label="Следующий"]');

      if (prevBtn) {
        prevBtn.addEventListener('click', () => $carousel.trigger('prev.owl.carousel'));
      }
      if (nextBtn) {
        nextBtn.addEventListener('click', () => $carousel.trigger('next.owl.carousel'));
      }

      $carousel.on('changed.owl.carousel', function (e) {
        const items = e.item.count;
        const item = e.item.index;
        const pageSize = e.page.size || 2;
        if (prevBtn) prevBtn.disabled = item === 0;
        if (nextBtn) nextBtn.disabled = item + pageSize >= items;
      });
    }
  }
});
