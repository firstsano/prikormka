(function ($) {

    var selectors = {
        mainContainer: '.w-order',
        observable: '[data-product-quantity]',
        observer: '[data-product-order]'
    };

    var initialize = function() {
        $('body').on('quantity-changed', selectors.observable, function() {
            var orderElement = $(this).closest(selectors.mainContainer).find(selectors.observer);
            var orderParams = orderElement.data('params');
            orderParams.quantity = $(this).val();
            orderElement.data('params', orderParams);
        });

    };

    $(document).ready(initialize);

})(jQuery);