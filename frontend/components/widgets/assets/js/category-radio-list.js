(function ($) {

    var events = {
        drawn: 'radio-list-drawn'
    };

    var selectors = {
        container: '.category-radio-list',
        radio: '.category-radio-list__radio',
        subContainer: '.category-radio-list__sub-categories',
    };

    var displaySubContainer = function (el) {
        $el = $(el).next().next();
        if ($el.hasClass('category-radio-list__sub-categories')) {
            $el.addClass('category-radio-list__sub-categories_active');
        }
    };

    var initialize = function () {
        $(selectors.subContainer).filter(function (i, el) {
            return ($(el).find(selectors.radio).filter(':checked').length > 0);
        }).addClass('category-radio-list__sub-categories_active');
        displaySubContainer($(selectors.radio).filter(':checked'));

        $('body').on('change', selectors.radio, function() {
            $(selectors.subContainer).filter(function (i, el) {
                return ($(el).find(selectors.radio).filter(':checked').length == 0);
            }).removeClass('category-radio-list__sub-categories_active');
            displaySubContainer(this);
            var self = this;
            $(this).trigger(events.drawn, {
                triggeredElement: self
            });
        });
    };

    $(document).ready(initialize);
})(jQuery);