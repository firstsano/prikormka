(function ($) {

    var defaults = {
        step: 1,
        minQuantity: 1
    };

    var selectors = {
        add: '.quantity-setter__add',
        remove: '.quantity-setter__remove',
        input: '.quantity-setter__input',
        widget: '.quantity-setter'
    };

    var quantitySetter = function(el) {
        $widget = $(el).closest(selectors.widget);
        var options = {
            step: $widget.data('step'),
            minQuantity: $widget.data('min-quantity')
        };
        this.$input = $(el).closest(selectors.widget).find(selectors.input);
        this.options = $.extend({}, defaults, options);
    };
    quantitySetter.prototype.changeValue = function(newValue) {
        this.$input.val(newValue);
        this.$input.trigger('quantity-changed');
    };
    quantitySetter.prototype.increment = function () {
        var inputValue = parseInt(this.$input.val()) + this.options.step;
        this.changeValue(inputValue);
    };
    quantitySetter.prototype.decrement = function () {
        var inputValue = parseInt(this.$input.val());
        if ((inputValue - this.options.step) > this.options.minQuantity) {
            inputValue -= this.options.step;
        } else {
            inputValue = this.options.minQuantity;
        }
        this.changeValue(inputValue);
    };
    quantitySetter.prototype.filterInput = function () {
        var integerValue = parseInt(this.$input.val());
        if (isNaN(integerValue)) {
            integerValue = this.options.minQuantity;
        }
        this.changeValue(integerValue);
    };

    var initialize = function () {
        $(selectors.add).on('click', function(e) {
            e.preventDefault();
            (new quantitySetter(this)).increment();
        });
        $(selectors.remove).on('click', function(e) {
            e.preventDefault();
            (new quantitySetter(this)).decrement();
        });
        $(selectors.input).on('blur change keyup', function(e) {
            (new quantitySetter(this)).filterInput();
        });
    };

    $(document).ready(initialize);
}(jQuery));