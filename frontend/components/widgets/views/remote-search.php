<?php

/* @var $this \yii\web\View */
/* @var $limit integer */

use yii\web\View;
use yii\web\JsExpression;
use yii\helpers\Url;
use kartik\select2\Select2;

$formatJs = <<< 'JS'
var formatRepo = function (product) {
    if (product.loading) {
        return product.text;
    }
    var markup =
'<a href="' + product.url + '" class="remote-search__result-link">' +
    '<div class="remote-search__result-image-layout">' +
        '<img src="' + product.image + '" class="remote-search__result-image" />' +
    '</div>' +
    '<div class="remote-search__result-name-layout">' +
        '<div class="remote-search__result-name">' + product.name + '</div>' +
    '</div>' +
'</a>';
    return '<div class="remote-search__result">' + markup + '</div>';
};
JS;

// Register the formatting script
$this->registerJs($formatJs, View::POS_HEAD);

// script to parse the results into the format expected by Select2
$resultsJs = <<< JS
function (data, params) {
    params.page = params.page || 1;
    params.limit = $limit;
    return {
        results: data.items,
        pagination: {
            more: (params.page * $limit) < data.total_count
        }
    };
}
JS;

// render your widget
echo Select2::widget([
    'name' => 'remote-search',
    'options' => [
        'placeholder' => 'Поиск',
        'class' => 'search',
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 3,
        'ajax' => [
            'url' => Url::to(['/site/product-list']),
            'dataType' => 'json',
            'delay' => 250,
            'data' => new JsExpression("function(params) {return {query: params.term, page: params.page, limit: {$limit}}; }"),
            'processResults' => new JsExpression($resultsJs),
            'cache' => true
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('formatRepo'),
    ],
    'pluginEvents' => [
        'select2:select' => "function() { log('select'); }"
    ]
]);