<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\models\Product */

use frontend\components\widgets\QuantitySetter;
use frontend\components\extensions\Html;
use frontend\components\widgets\AddToCart;
use frontend\components\widgets\ProductImage;

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('frontend/site', 'All products'),
    'url' => ['/catalog/index']
];
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="catalog-view">
    <h1 class="catalog-view__title"> <?= $this->title ?> </h1>
    <div class="catalog-view__product product">
        <div class="product__images">
            <?= ProductImage::widget([
                'product' => $model
            ]) ?>
        </div>
        <div class="product__info">
            <div class="product__info-layout">
                <div class="product__main-info">

                    <div class="product__info-section">
                        <div class="product__price">
                            <?= format_currency($model->price) ?>
                        </div>
                        <div class="product__attribute-label">
                            Цена за упаковку
                        </div>
                    </div>
                    <div class="product__info-section">
                        <div class="product__item-price">
                            <?= format_currency($model->itemPrice) ?>
                        </div>
                        <div class="product__attribute-label">
                            Цена за штуку
                        </div>
                    </div>

                    <div class="product__info-section">
                        <div class="product__quantity">
                            <?= QuantitySetter::widget([
                                'startValue' => $model->min_pack_quantity,
                                'options' => [
                                    'client' => [
                                        'step' => 1,
                                        'min-quantity' => $model->min_pack_quantity,
                                        'storage' => '.product'
                                    ]
                                ]
                            ]) ?>
                        </div>
                        <?= AddToCart::widget([
                            'label' => 'В корзину',
                            'options' => [
                                'link' => ['class' => 'product__add-to-cart'],
                                'widget' =>  [
                                    'method' => 'POST',
                                    'storage' => '.product',
                                    'product' => $model->id,
                                ]
                            ]
                        ]) ?>
                    </div>
                </div>

                <div class="product__additional-info">
                    <div class="product__additional-info-layout">
                        <div class="product__additional-info-title">
                            Дополнительная информация
                        </div>
                        <hr />
                        <div class="idv-trinity idv-trinity_product idv-trinity_weight">
                            <div class="idv-trinity__info">
                                <div class="idv-trinity__description">вес упаковки</div>
                                <div class="idv-trinity__value"><?= format_w($model->packWeight) ?></div>
                            </div>
                        </div>
                        <br />
                        <div class="idv-trinity idv-trinity_product idv-trinity_box">
                            <div class="idv-trinity__info">
                                <div class="idv-trinity__description">в упаковке</div>
                                <div class="idv-trinity__value"><?= $model->pack_quantity ?> шт.</div>
                            </div>
                        </div>
                        <br />
                        <div class="idv-trinity idv-trinity_product idv-trinity_order">
                            <div class="idv-trinity__info">
                                <div class="idv-trinity__description">минимальный заказ</div>
                                <div class="idv-trinity__value"><?= $model->min_pack_quantity ?> уп.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product__description">
                    <strong> Описание </strong>
                    <?= Html::tag('div', $model->description ) ?>
                    <hr />
                </div>
            </div>
        </div>
    </div>
</div>

