<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\models\Product */

use frontend\components\widgets\Trinity;
use frontend\components\widgets\QuantitySetter;
use frontend\components\extensions\Html;
use frontend\components\widgets\Carousel;

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
            <div class="product__price-info">
                <div class="product__price">
                    <?= format_f($model->price, 0) ?>
                    <sup class="product__price-precision">
                        <?= decimals($model->price) ?>р
                    </sup>
                </div>
                <div class="product__weight">
                    <?= Trinity::widget([
                        'main' => $model->weight,
                        'top' => Yii::t('common/site', 'weight'),
                        'bottom' => Yii::t('common/site', 'volume'),
                    ]) ?>
                </div>
            </div>
            <div class="product__actions">
                <div class="product__quantity">
                    <?= QuantitySetter::widget(['options' => [
                        'input' => [
                            'data' => [
                                'product-quantity' => true
                            ]
                        ]
                    ]]) ?>
                </div>
                <?= Html::a(Html::textIcon('В список покупок', 'add', false), '#', ['class' => 'product__add-to-cart']) ?>
            </div>
            <?= Html::tag('div', $model->description, ['class' => 'product__description']) ?>
        </div>
    </div>
</div>

