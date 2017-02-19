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
        <?= $product->category->name ?>
    </header>

    <div class="q-order__info">
        <div class="q-order__image-section">
            <?= Html::img($product->mainImage->url, [
                'alt' => $product->name, 'class' => 'q-order__image' ]) ?>
        </div>
        <div class="q-order__info-section">
            <div class="q-order__description idv-trinity">
                <?= Html::img('@img/icons/weight.png', [
                    'class' => 'idv-trinity__image'
                ]) ?>
                <div class="idv-trinity__info">
                    <div class="idv-trinity__description">вес</div>
                    <div class="idv-trinity__value"><?= $product->weight ?> г</div>
                </div>
            </div>
            <br />
            <div class="q-order__description idv-trinity">
                <?= Html::img('@img/icons/box.png', [
                    'class' => 'idv-trinity__image'
                ]) ?>
                <div class="idv-trinity__info">
                    <div class="idv-trinity__description">в упаковке</div>
                    <div class="idv-trinity__value"><?= $product->pack_quantity ?> шт</div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <?= Html::a($product->name, ['catalog/view', 'id' => $product->id],
            ['class' => 'q-order__name']) ?>
    </div>

    <div class="q-order__price-layout">
        <span class="q-order__price"><?= $product->price ?> руб.</span>
        <span class="q-order__price-details"> / за упаковку </span>
    </div>

    <footer class="q-order__footer">
        <div class="q-order__footer-section">
            <?= QuantitySetter::widget([
                'startValue' => 1,
                'options' => [
                    'widget' => [
                        'step' => 1,
                        'min-quantity' => 1
                    ],
                    'input' => [ 'data-product-quantity' => true ]
                ]
            ]) ?>
        </div>
        <div class="q-order__footer-section">
            <?= Html::a('В корзину',
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

