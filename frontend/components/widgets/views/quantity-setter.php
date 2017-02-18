<?php

/* @var $this \yii\web\View */
/* @var $inputOptions array */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\QuantitySetterAsset::register($this);

echo Html::beginTag('div', ['class' => 'quantity-setter']);
echo Html::iconButton('remove', '#', [
    'icon' => [
        'class' => 'quantity-setter__action-icon',
    ],
    'class' => 'quantity-setter__remove'
]);
echo Html::input('text', 'randomName', 0, $inputOptions);
echo Html::iconButton('add', '#', [
    'icon' => [
        'class' => 'quantity-setter__action-icon',
    ],
    'class' => 'quantity-setter__add'
]);
echo Html::endTag('div');