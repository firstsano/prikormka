(function ($) {

    var selectors = {
        input: '.search'
    };

    var initialize = function() {
        $('body').on('keyup change', selectors.input, function(e) {
            var previousValue = $(this).data('prev');
            var currentValue = $(this).val();
            selectors.container = $(this).data('container');
            var $container = $(selectors.container);
            if (previousValue != currentValue) {
                $(this).data('prev', currentValue);
                var $form = $(this).closest('form');
                $.ajax({
                    url: $form.attr('action'),
                    type: 'get',
                    data: $form.serialize(),
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus);
                    },
                    success: function(response) {
                        var updateHtml = $(response).find(selectors.container).html();
                        $container.html(updateHtml);
                    }
                });
            }
        })
    };

    $(document).ready(initialize);
})(jQuery);