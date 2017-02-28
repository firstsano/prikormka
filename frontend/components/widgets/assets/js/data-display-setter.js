(function ($) {

    var selectors = {
        widget: '.data-display-setter',
        inputs: '.data-display-setter select',
    };

    var initialize = function () {
        $('body').on('change', selectors.inputs, function(e) {
            e.preventDefault();
            $form = $(this).closest(selectors.widget).find('form');
            $.ajax({
                url: $form.attr('action'),
                type: 'PUT',
                data: $form.serialize(),
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus);
                },
                success: function(data) {
                    location.reload();
                }
            });
        });
    };

    $(document).ready(initialize);
}(jQuery));