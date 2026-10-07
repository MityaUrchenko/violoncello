(function () {
    function bindFancybox() {
        if (!window.Fancybox) {
            return false;
        }
        Fancybox.bind('[data-fancybox]', {
            Hash: false,
        });
        return true;
    }

    function lazyLoadImages(root) {
        var scope = root || document;
        var imgs = scope.querySelectorAll('img.photo-detail__img--lazy[data-src]');
        if (!imgs.length) {
            return;
        }

        var load = function (img) {
            var src = img.getAttribute('data-src');
            if (!src) {
                return;
            }
            img.src = src;
            img.removeAttribute('data-src');
            img.classList.remove('photo-detail__img--lazy');
        };

        if (!('IntersectionObserver' in window)) {
            imgs.forEach(load);
            return;
        }

        var observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }
                load(entry.target);
                obs.unobserve(entry.target);
            });
        }, {
            rootMargin: '300px 0px',
            threshold: 0.01
        });

        imgs.forEach(function (img) {
            observer.observe(img);
        });
    }

    function bindShowMore() {
        var grid = document.querySelector('.photo-detail__grid');
        var btn = document.querySelector('.photo-detail__more');
        if (!grid || !btn) {
            return;
        }

        var step = parseInt(grid.getAttribute('data-step') || '24', 10);
        if (step < 1) {
            step = 24;
        }

        btn.addEventListener('click', function () {
            var hidden = grid.querySelectorAll('.photo-detail__item.is-hidden');
            var i;
            for (i = 0; i < hidden.length && i < step; i++) {
                hidden[i].classList.remove('is-hidden');
            }
            lazyLoadImages(grid);
            if (!grid.querySelector('.photo-detail__item.is-hidden')) {
                var wrap = btn.closest('.photo-detail__more-wrap');
                if (wrap) {
                    wrap.remove();
                } else {
                    btn.remove();
                }
            }
        });
    }

    function init() {
        lazyLoadImages();
        bindShowMore();
        if (!bindFancybox()) {
            setTimeout(bindFancybox, 100);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
