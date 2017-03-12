(function ($) {

    var selectors = {
        toTop: '.to-top',
    };

    var initialize = function () {
        var top = $(window).height() / 2;
        $(document).ready(function(){
            $(selectors.toTop).pushpin({
                top: top,
                // offset: 'auto'
            });
        });
    };

    $(document).ready(initialize);
})(jQuery);