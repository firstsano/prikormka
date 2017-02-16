(function ($) {

    var events = {
        add: 'product-added'
    };

    var selectors = {
        cart: '.cart',
        count: '.cart__count',
        cost: '.cart__cost'
    };

    var initialize = function () {
        $('body').on(events.add, function(event, params) {
            $cart = $('body').find(selectors.cart);
            $cart.find(selectors.count).text(params.cart.count);
            $cart.find(selectors.cost).text(params.cart.cost);
        });
    };

    $(document).ready(initialize);
})(jQuery);