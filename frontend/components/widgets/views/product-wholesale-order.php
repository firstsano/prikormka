<?php

/* @var $this \yii\web\View */
/* @var $product \common\models\Product */

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
        <?= Html::a(
            $product->name,
            ['/catalog/view', 'id' => $product->id],
            ['class' => 'w-order__product-name']
        ) ?>
    </div>
    <div class="w-order__cart-info">
        <div class="w-order__order-quantity">
            <?= QuantitySetter::widget([
                'startValue' => $product->min_pack_quantity,
                'options' => [
                    'widget' => ['class' => 'quantity-setter_height_30'],
                    'client' => [
                        'step' => 1,
                        'min-quantity' => $product->min_pack_quantity,
                        'storage' => '.w-order'
                    ],
                ]
            ]) ?>
        </div>
        <div class="w-order__product-price">
            <?= format_f($product->price) ?> руб./уп.
            <div class="w-order__product-pack">
                В упаковке <?= $product->pack_quantity ?> шт.
            </div>
        </div>
        <?= AddToCart::widget([
            'label' => Html::icon('shopping_basket'),
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
