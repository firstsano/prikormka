(function ($) {

    var selectors = {
        container: '.product-image',
        image: '.product-image__image',
        thumbnail: '.product-image__thumbnail',
        thumbnailImage: '.product-image__thumbnail-image'
    };

    var initialize = function() {
        $('body').on('click', selectors.thumbnailImage, function(e) {
            e.preventDefault();
            $container = $(this).closest(selectors.container);
            $image = $container.find(selectors.image);
            $thumbnails = $container.find(selectors.thumbnail);

            $thumbnails.removeClass('product-image__thumbnail_active');
            $(this).closest(selectors.thumbnail).addClass('product-image__thumbnail_active');
            $image.attr('src', $(this).attr('src'));
        })
    };

    $(document).ready(initialize);
})(jQuery);