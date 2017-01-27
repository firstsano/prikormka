<?php

/* @var $this \yii\web\View */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\QuantitySetterAsset::register($this);

?>

<div class="quantity-setter">
    <?= Html::iconButton('arrow_drop_up', '#', ['class' => 'quantity-setter__add']) ?>
    <?= Html::input('text', 'randomName', 12, ['class' => 'quantity-setter__input']) ?>
    <?= Html::iconButton('arrow_drop_down', '#', ['class' => 'quantity-setter__remove']) ?>
</div>
