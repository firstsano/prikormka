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

    var classes = {
        input: {
            changed: 'quantity-setter__input_changed'
        }
    };

    var quantitySetter = function(el) {
        $widget = $(el).closest(selectors.widget);
        var options = {
            step: $widget.data('step'),
            minQuantity: $widget.data('min-quantity'),
            storage: $widget.data('storage'),
        };
        this.$input = $(el).closest(selectors.widget).find(selectors.input);
        this.$storage = $(el).closest(options.storage);
        this.options = $.extend({}, defaults, options);
    };
    quantitySetter.prototype.changeValue = function(newValue) {
        this.$input.val(newValue);
        this.updateStorage({quantity: newValue});
        var startValue = this.getStorageData('startValue');
        if (startValue != newValue) {
            this.$input.addClass(classes.input.changed);
        } else {
            this.$input.removeClass(classes.input.changed);
        }
        this.$input.trigger('quantity-changed');
    };
    quantitySetter.prototype.initializeStorage = function() {
        this.$storage.data('storage', {
            startValue: this.$input.val(),
            quantity: this.$input.val()
        });
    };
    quantitySetter.prototype.getStorageData = function(key) {
        return this.$storage.data('storage')[key];
    };
    quantitySetter.prototype.updateStorage = function(data) {
        var currentStorageData = this.$storage.data('storage');
        var newStorageData = $.extend({}, currentStorageData, data);
        this.$storage.data('storage', newStorageData);
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

    $.quantitySetter = quantitySetter;

    var initialize = function () {
        $('body').on('click', selectors.add, function(e) {
            e.preventDefault();
            (new quantitySetter(this)).increment();
        });
        $('body').on('click', selectors.remove, function(e) {
            e.preventDefault();
            (new quantitySetter(this)).decrement();
        });
        $('body').on('blur change keyup', selectors.input, function(e) {
            (new quantitySetter(this)).filterInput();
        });
        $(selectors.input).each(function(i, el) {
            (new quantitySetter(el)).initializeStorage();
        });
    };

    $(document).ready(initialize);
}(jQuery));