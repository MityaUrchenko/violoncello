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
        if (window.initPhotoNav) {
            window.initPhotoNav();
        }
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

window.initPhotoNav = function () {
    var root = document.querySelector('[data-photo-nav]');
    if (!root || root.getAttribute('data-ready') === '1') {
        return;
    }
    var dataNode = root.querySelector('.photo-nav__data');
    var panel = root.querySelector('.photo-nav__panel');
    var grid = root.querySelector('.photo-nav__grid');
    var fab = root.querySelector('.photo-nav__fab');
    var back = root.querySelector('.photo-nav__back');
    var crumb = root.querySelector('.photo-nav__crumb');
    if (!dataNode || !panel || !grid || !fab) {
        return;
    }

    var data;
    try {
        data = JSON.parse(dataNode.textContent || '');
    } catch (e) {
        return;
    }
    if (!data || !data.sections || !data.roots) {
        return;
    }

    root.setAttribute('data-ready', '1');
    var stack = [];

    function pad(n) {
        return (n < 10 ? '0' : '') + n;
    }

    function section(id) {
        return data.sections[id] || data.sections[String(id)];
    }

    function siblings(sec) {
        if (!sec) {
            return data.roots;
        }
        if (!sec.parent) {
            return data.roots;
        }
        var parent = section(sec.parent);
        return parent && parent.children ? parent.children : data.roots;
    }

    function numberOf(sec) {
        var list = siblings(sec);
        var i;
        for (i = 0; i < list.length; i++) {
            if (String(list[i]) === String(sec.id)) {
                return pad(i + 1);
            }
        }
        return '';
    }

    function columns() {
        if (!stack.length) {
            return data.roots.map(section).filter(Boolean);
        }
        var current = section(stack[stack.length - 1]);
        if (!current) {
            return [];
        }
        if (current.children && current.children.length) {
            return current.children.map(section).filter(Boolean);
        }
        return [current];
    }

    function addItem(list, node) {
        var li = document.createElement('li');
        li.appendChild(node);
        list.appendChild(li);
    }

    function sectionButton(sec) {
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.setAttribute('data-section', String(sec.id));
        btn.textContent = sec.name;
        return btn;
    }

    function elementNode(el) {
        if (String(el.id) === String(data.currentId)) {
            var span = document.createElement('span');
            span.className = 'photo-nav__current';
            span.textContent = el.name;
            return span;
        }
        var link = document.createElement('a');
        link.href = el.url;
        link.textContent = el.name;
        return link;
    }

    function columnItems(sec) {
        var nodes = [];
        var i;
        if (!stack.length) {
            if (sec.children && sec.children.length) {
                for (i = 0; i < sec.children.length; i++) {
                    var child = section(sec.children[i]);
                    if (child) {
                        nodes.push(sectionButton(child));
                    }
                }
                return nodes;
            }
        } else if (sec.elements && sec.elements.length) {
            for (i = 0; i < sec.elements.length; i++) {
                nodes.push(elementNode(sec.elements[i]));
            }
            return nodes;
        } else if (sec.children && sec.children.length) {
            for (i = 0; i < sec.children.length; i++) {
                var nested = section(sec.children[i]);
                if (nested) {
                    nodes.push(sectionButton(nested));
                }
            }
            return nodes;
        }
        if (sec.elements) {
            for (i = 0; i < sec.elements.length; i++) {
                nodes.push(elementNode(sec.elements[i]));
            }
        }
        return nodes;
    }

    function render() {
        var drilled = stack.length > 0;
        panel.classList.toggle('is-drilled', drilled);
        if (back) {
            back.hidden = !drilled;
        }
        if (crumb) {
            if (!drilled) {
                crumb.textContent = '';
            } else {
                var parts = [];
                var i;
                for (i = 0; i < stack.length; i++) {
                    var sec = section(stack[i]);
                    if (!sec) {
                        continue;
                    }
                    parts.push(i === 0 ? (numberOf(sec) + ' → ' + sec.name) : sec.name);
                }
                crumb.textContent = parts.join(' → ');
            }
        }

        grid.innerHTML = '';
        var cols = columns();
        var c;
        for (c = 0; c < cols.length; c++) {
            var col = cols[c];
            var group = document.createElement('div');
            group.className = 'photo-nav__group';
            var title = document.createElement('div');
            title.className = 'photo-nav__title';
            if (!drilled) {
                var num = document.createElement('span');
                num.className = 'photo-nav__num';
                num.textContent = numberOf(col);
                title.appendChild(num);
            }
            title.appendChild(document.createTextNode(col.name));
            group.appendChild(title);

            var list = document.createElement('ul');
            list.className = 'photo-nav__list';
            var items = columnItems(col);
            var n;
            for (n = 0; n < items.length; n++) {
                addItem(list, items[n]);
            }
            group.appendChild(list);
            grid.appendChild(group);
        }
    }

    function openNav() {
        root.classList.add('photo-nav--open');
        panel.hidden = false;
        fab.setAttribute('aria-expanded', 'true');
    }

    function closeNav() {
        root.classList.remove('photo-nav--open');
        panel.hidden = true;
        fab.setAttribute('aria-expanded', 'false');
    }

    fab.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        if (root.classList.contains('photo-nav--open')) {
            closeNav();
        } else {
            openNav();
        }
    });

    if (back) {
        back.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            stack = [];
            render();
        });
    }

    grid.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-section]');
        if (!btn) {
            return;
        }
        e.preventDefault();
        // render() чистит grid.innerHTML и отцепляет кнопку от DOM.
        // Без stopPropagation событие доходит до document, а closest
        // на отцепленном e.target уже не находит [data-photo-nav] → closeNav().
        e.stopPropagation();
        stack.push(parseInt(btn.getAttribute('data-section'), 10));
        render();
    });

    document.addEventListener('click', function (e) {
        if (!root.classList.contains('photo-nav--open')) {
            return;
        }
        if (e.target.closest('[data-photo-nav]')) {
            return;
        }
        closeNav();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeNav();
        }
    });

    render();
};
