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

    function lazyLoadImages() {
        var imgs = document.querySelectorAll('img.photo-album__img--lazy[data-src]');
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
            img.classList.remove('photo-album__img--lazy');
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

    function init() {
        lazyLoadImages();
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
