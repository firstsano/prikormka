<?php

/* @var $this yii\web\View */
/* @var $product common\models\Product */
/* @var $options array */

use frontend\components\extensions\Html;
use frontend\components\widgets\QuantitySetter;
use frontend\components\widgets\AddToCart;

?>

<?= Html::beginTag('div', $options) ?>
    <header class="q-order__header">
        <?= $product->category->name ?>
    </header>

    <div class="q-order__info">
        <div class="q-order__image-section">
            <div class="q-order__image-layout">
                <?= Html::img($product->mainImage->url, [
                    'alt' => $product->name, 'class' => 'q-order__image' ]) ?>
            </div>
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

    <div class="q-order__name-layout">
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
                    'client' => [
                        'step' => 1,
                        'min-quantity' => 1,
                        'storage' => '.q-order'
                    ],
                ]
            ]) ?>
        </div>
        <div class="q-order__footer-section">
            <?= AddToCart::widget([
                'label' => Html::icon('shopping_basket'),
                'options' => [
                    'link' => ['class' => 'q-order__order-button'],
                    'widget' =>  [
                        'method' => 'POST',
                        'storage' => '.q-order',
                        'product' => $product->id,
                    ]
                ]
            ]) ?>
        </div>
    </footer>
<?= Html::endTag('div') ?>

