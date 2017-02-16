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
            });
        });
    };

    $(document).ready(initialize);
})(jQuery);