(function($) {
    var selectors = {
        widget: '.quick-search',
        input: '.quick-search__input',
        results: '.quick-search__results'
    };

    var delay = (function(){
        var timer = 0;
        return function(callback, ms, params){
            clearTimeout (timer);
            timer = setTimeout(callback, ms, params);
        };
    })();

    var options = {
        delay: 1000,
        method: 'GET',
        url: '/'
    };

    var searchParams = function() {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var query = $(selectors.input).val();
        return {
            _csrf: csrfToken,
            query: query
        };
    };

    var displayResults = function($results) {
        var elements = $results.find('*').length;
        if (elements > 0) {
            $results.show();
        } else  {
            $results.hide();
        }
    };

    var search = function(params) {
        $.ajax({
            url: params.url,
            type: options.method,
            data: searchParams(),
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus);
            },
            success: function(data) {
                var items = $.map(data.items, function(value) {
                    return '<div><a class="quick-search__result-link" href="' + value.url + '">' + value.name + '</a></div>';
                });
                if (items.length != 0) {
                    items.push('<div><a class="quick-search__info-link" href="' + data.more_link + '">Смотреть еще результаты...</a></div>');
                } else {
                    items.push('<div>Результатов не найдено...</div>');
                }
                $(selectors.results).html(items.join(''));
                displayResults($(selectors.results));
            }
        })

    };

    var initialize = function() {
        $('body').on('keyup', selectors.input, function(e) {
            $this = $(this);
            if ($this.val()) {
                var url = $this.closest(selectors.widget).data('url');
                delay(search, options.delay, {url: url});
            } else {
                $this.closest(selectors.widget).find(selectors.results).html('');
            }
            displayResults($(selectors.results));
        });
        $('body').on('focus', selectors.input, function(e) {
            displayResults($(this).closest($(selectors.widget)).find(selectors.results));
        });
        $("body").on('click', function(e) {
            var $target = $(e.target);
            if ($target.closest($(selectors.widget)).length == 0){
                $(selectors.results).hide();
            }
        });
    };

    $(document).ready(initialize);
})(jQuery);