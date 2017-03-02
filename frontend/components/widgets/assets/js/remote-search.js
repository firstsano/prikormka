(function ($) {

    var selectors = {
        input: '.search'
    };

    var initialize = function() {
        $('body').on('keyup change', selectors.input, function(e) {
            var previousValue = $(this).data('prev');
            var currentValue = $(this).val();
            if (previousValue != currentValue) {
                $(this).data('prev', currentValue);
                $(this).closest('form').submit();
            }
        })
    };

    $(document).ready(initialize);
})(jQuery);