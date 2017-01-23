<?php

/* @var $this \yii\web\View */

use frontend\components\widgets\Trinity;
use frontend\components\extensions\Html;

?>

<div class="w-order">
    <?= Html::img('@product-img/temp/prikormka.png',
        ['class' => 'w-order__product-image']) ?>
        <div class="w-order__product-info">
            <div class="w-order__product-categories">
                Спортивная прикормка AVARGARD
            </div>
            <div class="w-order__product-name">
                Turbo Mix прикормка для ловли карп
            </div>
            <?= Trinity::widget(['main' => '5', 'top' => 'вес(г)', 'bottom' => 'объем(мл)',
                'options' => ['class' => 'w-order__product-weight']]) ?>
        </div>
        <div class="w-order__order-value">
            <div class="w-order__remove-value">
                <?= Html::icon('arrow_drop_down') ?>
            </div>
            <div class="w-order__value">
                12
            </div>
            <div class="w-order__add-value">
                <?= Html::icon('arrow_drop_up') ?>
            </div>
        </div>
        <?= Trinity::widget(['main' => '87, 00', 'top' => 'руб', 'bottom' => '100 шт',
            'options' => ['class' => 'w-order__product-price']]) ?>
        <div class="w-order__order">
            <?= Html::icon('add') ?>
        </div>
</div>
