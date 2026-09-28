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

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            if (!bindFancybox()) {
                setTimeout(bindFancybox, 100);
            }
        });
    } else if (!bindFancybox()) {
        setTimeout(bindFancybox, 100);
    }
})();
