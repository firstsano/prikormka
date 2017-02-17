(function ($) {

    var selectors = {
        cart: '.cart',
        menu: '.header-info',
    };

    var initialize = function () {
        var topOffset = $(selectors.menu).height() + 50;
        $(document).ready(function(){
            $(selectors.cart).pushpin({
                top: topOffset,
                offset: 20
            });
        });
    };

    $(document).ready(initialize);
})(jQuery);