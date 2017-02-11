<?php

/* @var $this yii\web\View */
/* @var $product common\models\Product */
/* @var $options array */

use frontend\components\extensions\Html;
use frontend\components\widgets\QuantitySetter;
use frontend\components\widgets\Trinity;

\frontend\components\widgets\assets\ProductQuickOrderAsset::register($this);

?>

<?= Html::beginTag('div', $options) ?>
    <header class="q-order__header">
        <div class="q-order__categories">
            <?= $product->category->name ?>
        </div>
        <div class="q-order__name">
            <?= $product->name ?>
        </div>
    </header>
    <div class="q-order__body">
        <?= Html::img($product->mainImage->url, [
            'alt' => $product->name, 'class' => 'q-order__image' ]) ?>
        <div class="q-order__price-info">
            <div class="q-order__old-price"> Старая цена: 132, 00 </div>
            <?= Trinity::widget([
                'main' => format_f($product->price),
                'top' => currency(),
                'bottom' => quantity(100),
                'options' => ['class' => 'q-order__price']
            ]) ?>
        </div>
    </div>
    <footer class="q-order__footer">
        <div class="q-order__weight">
            <?= Trinity::widget([
                'main' => $product->weight,
                'top' => Yii::t('common/site', 'weight'),
                'bottom' => Yii::t('common/site', 'volume'),
            ]) ?>
        </div>
        <div class="q-order__quantity">
            <?= QuantitySetter::widget(['options' => [
                'input' => [
                    'data' => [
                        'product-quantity' => true
                    ]
                ]
            ]]) ?>
        </div><!--
        --><div class="q-order__order">
            <?= Html::iconButton('add',
                ['/site/add-product-to-cart'],
                [
                    'class' => 'q-order__order-button',
                    'data' => [
                        'product-order' => true,
                        'product-add' => [
                            'method' => 'POST',
                            'params' => [
                                'id' => $product->id,
                                'quantity' => 1
                            ],
                        ],
                    ]
                ]
            ) ?>
        </div>
    </footer>
<?= Html::endTag('div') ?>

