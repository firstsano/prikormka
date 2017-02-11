(function ($) {
    var selectors = {
        container: '.selector',
        label: '.selector__label',
        select: '.selector__select'
    };

    var initialize = function () {
        $(selectors.container).each(function(i, el) {
            var value = $(el).find(selectors.select).find(':selected').text();
            $(el).find(selectors.label).text(value);
        });

        $('body').on('change', selectors.select, function() {
            var value = $(this).find(':selected').text();
            $(this).closest(selectors.container)
                .find(selectors.label).text(value);
        });
    };

    $(document).ready(initialize);
})(jQuery);