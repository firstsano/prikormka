<?php

/* @var $this \yii\web\View */
/* @var $inputOptions array */
/* @var $widgetOptions array */
/* @var $startValue integer */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\QuantitySetterAsset::register($this);

echo Html::beginTag('div', $widgetOptions);
echo Html::iconButton('remove', '#', [
    'icon' => [
        'class' => 'quantity-setter__action-icon',
    ],
    'class' => 'quantity-setter__remove'
]);
echo Html::textInput($this->context->id, $startValue, $inputOptions);
echo Html::iconButton('add', '#', [
    'icon' => [
        'class' => 'quantity-setter__action-icon',
    ],
    'class' => 'quantity-setter__add'
]);
echo Html::endTag('div');