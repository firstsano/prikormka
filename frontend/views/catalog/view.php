<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\models\Product */

use frontend\components\widgets\QuantitySetter;
use frontend\components\extensions\Html;
use frontend\components\widgets\AddToCart;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="catalog-view">
    <h1 class="catalog-view__title"> <?= $this->title ?> </h1>
    <div class="catalog-view__product product">
        <div class="product__images">
            <?= Html::img($model->mainImage->url, [
                'alt' => $model->name,
                'class' => 'product__main-image'
            ]) ?>
        </div>
        <div class="product__info">
            <div class="product__info-layout">
                <div class="product__main-info">
                    <div class="product__price-info">
                        <div class="product__price">
                            <?= format_currency($model->price) ?>
                        </div>
                        <div class="product__attribute-label">
                            Цена за упаковку
                        </div>
                        <div class="product__item-price">
                            <?= format_currency($model->itemPrice) ?>
                        </div>
                        <div class="product__attribute-label">
                            Цена за штуку
                        </div>
                    </div>
                    <div class="product__actions">
                        <div class="product__quantity">
                            <?= QuantitySetter::widget([
                                'startValue' => $model->min_pack_quantity,
                                'options' => [
                                    'client' => [
                                        'step' => 1,
                                        'min-quantity' => $model->min_pack_quantity,
                                        'storage' => '.product'
                                    ],
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
                    <div class="product__description">
                        <div class="product__description-title"> Описание </div>
                        <?= Html::tag('div', $model->description ) ?>
                    </div>
                </div>
                <div class="product__additional-info">
                    <div class="product__additional-info-layout">
                        <div class="product__additional-info-title">
                            Дополнительная информация
                        </div>
                        <div class="idv-trinity idv-trinity_product">
                            <?= Html::img('@img/icons/weight.png', [
                                'class' => 'idv-trinity__image'
                            ]) ?>
                            <div class="idv-trinity__info">
                                <div class="idv-trinity__description">вес упаковки</div>
                                <div class="idv-trinity__value"><?= $model->weight ?> г</div>
                            </div>
                        </div>
                        <br />
                        <div class="idv-trinity idv-trinity_product">
                            <?= Html::img('@img/icons/box.png', [
                                'class' => 'idv-trinity__image'
                            ]) ?>
                            <div class="idv-trinity__info">
                                <div class="idv-trinity__description">в упаковке</div>
                                <div class="idv-trinity__value"><?= $model->pack_quantity ?> шт</div>
                            </div>
                        </div>
                        <br />
                        <div class="idv-trinity idv-trinity_product">
                            <?= Html::img('@img/icons/shopping-basket.png', [
                                'class' => 'idv-trinity__image'
                            ]) ?>
                            <div class="idv-trinity__info">
                                <div class="idv-trinity__description">минимальный заказ</div>
                                <div class="idv-trinity__value"><?= $model->min_pack_quantity ?> упаковки</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

