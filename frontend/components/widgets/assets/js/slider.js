(function ($) {
    var initialize = function () {
        $('[data-nouislider]').each(function (i, el) {
            var options = $(el).data('nouislider');

            noUiSlider.create(el, {
                start: options.start,
                connect: true,
                tooltips: true,
                step: options.step,
                range: {
                    'min': options.min,
                    'max': options.max
                }
            });

            var $minInput = $(options.inputs.min);
            var $maxInput = $(options.inputs.max);

            $minInput.val(options.min);
            $maxInput.val(options.max);

            el.noUiSlider.on('update', function( values, handle ) {
                var value = values[handle];
                if ( handle ) {
                    $maxInput.val(value);
                } else {
                    $minInput.val(value);
                }
            });
        });
    };

    $(document).ready(initialize);
})(jQuery);