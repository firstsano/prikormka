<?php

/* @var $this \yii\web\View */
/* @var $inputOptions array */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\QuantitySetterAsset::register($this);

echo Html::beginTag('div', ['class' => 'quantity-setter']);
echo Html::iconButton('arrow_drop_up', '#', ['class' => 'quantity-setter__add']);
echo Html::input('text', 'randomName', 0, $inputOptions);
echo Html::iconButton('arrow_drop_down', '#', ['class' => 'quantity-setter__remove']);
echo Html::endTag('div');