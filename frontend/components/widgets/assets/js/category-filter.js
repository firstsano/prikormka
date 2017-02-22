(function($) {

    var selectors = {
        menu: '.filter-menu',
        submenu: '.filter-menu__submenu',
        link: '.filter-menu li a',
        active: '.active'
    };

    var initialize = function () {
        $('body').on('click', selectors.link, function() {
            $(this).closest(selectors.menu).find(selectors.active).removeClass('active');
            $(this).next(selectors.submenu).fadeIn();
            $(this).addClass('active');
        });
    };

    $(document).ready(initialize);
})(jQuery);