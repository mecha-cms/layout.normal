/* Toggle Mobile Navigation */

(function() {
    if (!document.querySelector) return;
    var base = document.body,
        toggle = document.querySelector('.aside-toggle');
    if (!toggle) return;
    function do_toggle(e) {
        this.classList.toggle('active');
        base.classList.toggle('aside-is-visible');
        base.scrollTop = 0;
        base.parentNode.scrollTop = 0;
        e.preventDefault();
    }
    toggle.addEventListener('click', do_toggle, false);
})();