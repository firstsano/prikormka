<?php

/* @var $this yii\web\View */

use frontend\components\widgets\Trinity;
use frontend\components\extensions\Html;

?>

<div class="q-order">
    <header class="q-order__header">
        <div class="q-order__categories">
            Спортивная прикормка AVARGARD
        </div>
        <div class="q-order__name">
            Turbo Mix прикормка для ловли карп
        </div>
    </header>
    <div class="q-order__body">
        <?= Html::img('@product-img/temp/prikormka.png', [
            'alt' => 'Прикормка', 'class' => 'q-order__image' ]) ?>
        <div class="q-order__price-info">
            <div class="q-order__old-price"> Старая цена: 132, 00 </div>
            <?= Trinity::widget([ 'main' => '87, 00', 'top' => 'руб', 'bottom' => '100 шт',
                'options' => ['class' => 'q-order__price'] ]) ?>
        </div>
    </div>
    <footer class="q-order__footer">
        <?= Trinity::widget(['main' => '5', 'top' => 'вес(г)', 'bottom' => 'объем(мл)',
            'options' => ['class' => 'q-order__weight'] ]) ?>
        <div class="q-order__order">
            <?= Html::icon('add') ?>
        </div>
        <div class="q-order__order-quantity">
            <div class="q-order__remove-quantity">
                <?= Html::icon('arrow_drop_up') ?>
            </div>
            <div class="q-order__value-quantity">
                12
            </div>
            <div class="q-order__add-quantity">
                <?= Html::icon('arrow_drop_down') ?>
            </div>
        </div>
    </footer>
</div>

