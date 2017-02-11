(function ($) {

    var events = {
        add: 'product-added'
    };

    var selectors = {
        add: '[data-product-add]'
    };

    var defaultOptions = {
        method: 'POST'
    };

    var getOptionsFromElement = function ($el) {
        var data = $el.data('product-add');
        return {
            url: $el.attr('href'),
            method: data.method,
            params: data.params
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