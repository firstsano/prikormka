(function ($) {

    var selectors = {
        form: '.wholesale-filter',
        inputs: '.wholesale-filter input'
    };

    var initialize = function() {
        $('body').on('keyup change', selectors.inputs, function(e) {
            $form = $(this).closest(selectors.form);
            var previousValue = $form.data('prev');
            var currentValue = $form.serialize();
            if (previousValue != currentValue) {
                $form.data('prev', currentValue);
                $form.submit();
            }
        })
    };

    $(document).ready(initialize);
})(jQuery);