(function($) {

    var timeoutBeforeHide = 0;
    var timeoutBeforeHideDelay = 5000;

    var events = {
        radioList: 'radio-list-drawn'
    };

    var selectors = {
        filter: '.filter',
        clickElements: '.filter input[type=checkbox]',
        eventElements: '.filter .category-radio-list__label',
        submit: '.filter__submit_additional'
    };

    var delayAndHide = function($submit, delay) {
        timeoutBeforeHide -= delay;
        if (timeoutBeforeHide <= 0) {
            timeoutBeforeHide = 0;
            // $submit.fadeOut('slow');
        }
    };

    var displayAdditionalSubmit = function(el) {
        timeoutBeforeHide += timeoutBeforeHideDelay;
        var $filter = $(el).closest(selectors.filter),
            offsetFilter = $filter.offset().top,
            offsetTop = $(el).offset().top - offsetFilter - 10,
            $submit = $(el).closest(selectors.filter).find(selectors.submit);
        $submit.hide().css({top: offsetTop}).fadeIn('slow');
        setTimeout(delayAndHide, timeoutBeforeHideDelay, $submit, timeoutBeforeHideDelay);
    };

    var initialize = function () {
        $('body').on('click', selectors.clickElements, function() {
            displayAdditionalSubmit(this);
        });
        $('body').on(events.radioList, function(e, data) {
            var $label = $(data.triggeredElement).next();
            displayAdditionalSubmit($label);
        });
    };

    $(document).ready(initialize);
})(jQuery);