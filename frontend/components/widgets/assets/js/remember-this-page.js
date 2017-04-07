(function($){
    var initialize = function () {
        if(History !== null) {
            History.pushState({});
        }
    };

    $(document).ready(initialize);
})(jQuery);