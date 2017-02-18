<?php

/* @var $this \yii\web\View */
/* @var $options array */
/* @var $input string */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\RangeSliderAsset::register($this);

echo Html::tag('br');
echo Html::tag('br');
echo Html::tag('div', '', [
    'class' => 'nouislider',
    'data' => [
        'nouislider' => $options
    ]
]);
echo Html::tag('br');


