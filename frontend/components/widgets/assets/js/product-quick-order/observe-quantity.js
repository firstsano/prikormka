(function ($) {

    var selectors = {
        mainContainer: '.q-order',
        observable: '[data-product-quantity]',
        observer: '[data-product-order]'
    };

    var initialize = function() {
        $('body').on('quantity-changed', selectors.observable, function() {
            var orderElement = $(this).closest(selectors.mainContainer).find(selectors.observer);
            var orderParams = orderElement.data('product-add');
            orderParams.params.quantity = $(this).val();
            orderElement.data('product-add', orderParams);
        });

    };

    $(document).ready(initialize);

})(jQuery);