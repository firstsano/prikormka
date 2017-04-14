(function ($) {

    var events = {
        add: 'product-added'
    };

    var selectors = {
        add: '[data-product-add]'
    };

    var defaultOptions = {
        method: 'POST',
    };

    var getOptionsFromElement = function ($el) {
        var data = $el.data('product-add');
        var $storage = $el.closest(data.storage);
        var storageData = $storage.data('storage');
        if (!storageData) {
            var input = $storage.find('.quantity-setter__input')[0];
            (new $.quantitySetter(input)).initializeStorage();
            storageData = $storage.data('storage');
        }
        var params = {
            id: data.product,
            quantity: storageData.quantity
        };
        return {
            url: $el.attr('href'),
            method: data.method,
            params: params
        };
    };

    var getOptions = function ($el) {
        return $.extend({}, defaultOptions, getOptionsFromElement($el));
    };

    var initialize = function() {
        $('body').on('click submit', selectors.add, function(e) {
            e.preventDefault();
            $this = $(this);
            var options = getOptions($this);
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.extend(options.params, {_csrf: csrfToken});
            $.ajax({
                url: options.url,
                type: options.method,
                data: options.params,
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus);
                },
                success: function(data) {
                    $this.trigger(events.add, data);
                }
            });
        });
    };

    $(document).ready(initialize);
})(jQuery);