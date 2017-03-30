(function($) {
    var initialize = function() {
        $.each($(".custom-carousel .custom-carousel__item"), function(i, el) {
            var $el = $(el),
                src = $el.data('src');
            if (src) {
                $el.css('background-image', "url('" + src + "')");
            }
        });

        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            dots: false
        });
    };

    $(document).ready(initialize);
} (jQuery));