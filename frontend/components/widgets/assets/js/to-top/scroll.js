(function ($) {

    var selectors = {
        toTop: '.to-top',
    };

    var initialize = function () {
        $('body').on('click', selectors.toTop, function(e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });
    };

    $(document).ready(initialize);
})(jQuery);