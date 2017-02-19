<?php

/* @var $this \yii\web\View */
/* @var $product \common\models\Product */

use frontend\components\widgets\Trinity;
use frontend\components\extensions\Html;
use frontend\components\widgets\QuantitySetter;
use frontend\components\widgets\AddToCart;
use yii\helpers\StringHelper;

?>

<div class="w-order">
    <div class="w-order__product-image-container">
        <?= Html::img($product->mainImage->url, ['class' => 'w-order__product-image']) ?>
    </div>
    <div class="w-order__product-info">
        <div class="w-order__product-categories">
            <?= $product->category->name ?>
        </div>
        <div class="w-order__product-name">
            <?= StringHelper::truncate($product->name, 30) ?>
        </div>
        <?= Trinity::widget([
            'main' => $product->weight,
            'top' => Yii::t('common/site', 'weight'),
            'bottom' => Yii::t('common/site', 'volume'),
            'options' => ['class' => 'w-order__product-weight']
        ]) ?>
    </div>
    <div class="w-order__order-quantity">
        <?= QuantitySetter::widget([
            'startValue' => 1,
            'options' => [
                'widget' => [
                    'step' => 1,
                    'min-quantity' => 1,
                    'storage' => '.w-order'
                ],
            ]
        ]) ?>
    </div>
    <div class="w-order__product-price">
        <?= Trinity::widget([
            'main' => format_f($product->price),
            'top' => currency(),
            'bottom' => quantity(100),
        ]) ?>
    </div>
    <div class="w-order__order">
        <?= AddToCart::widget([
            'label' => Html::icon('add'),
            'options' => [
                'link' => ['class' => 'w-order__order-button'],
                'widget' =>  [
                    'method' => 'POST',
                    'storage' => '.w-order',
                    'product' => $product->id,
                ]
            ]
        ]) ?>
    </div>
</div>
