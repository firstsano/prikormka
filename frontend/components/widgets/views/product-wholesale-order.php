<?php

/* @var $this \yii\web\View */
/* @var $product \common\models\Product */

use frontend\components\widgets\Trinity;
use frontend\components\extensions\Html;
use frontend\components\widgets\QuantitySetter;
use yii\helpers\StringHelper;

\frontend\components\widgets\assets\ProductWholesaleOrderAsset::register($this);

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
        <?= QuantitySetter::widget(['options' => [
            'input' => [
                'data' => [
                    'product-quantity' => true
                ]
            ]
        ]]) ?>
    </div>
    <div class="w-order__product-price">
        <?= Trinity::widget([
            'main' => format_f($product->price),
            'top' => currency(),
            'bottom' => quantity(100),
        ]) ?>
    </div>
    <div class="w-order__order">
        <?= Html::iconButton('add',
            ['/site/add-product-to-cart'],
            [
                'class' => 'w-order__order-button',
                'data' => [
                    'method' => 'POST',
                    'product-order' => true,
                    'params' => [
                        'id' => $product->id,
                        'quantity' => 1
                    ],
                ]
            ]
        ) ?>
    </div>
</div>
