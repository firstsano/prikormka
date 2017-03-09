<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Order */

use frontend\components\extensions\Html;
use frontend\components\widgets\NavMessage;
use frontend\components\widgets\Subscribe;

?>

<div class="order-view">
    <h1 class="order-view__title">Ваш заказ оформлен!</h1>
    <div class="order-view__order-num">Номер заказа
        <span class="order-view__order-num order-view__order-num_number"> <?= $model->id ?> </span>
    </div>
    <div class="order-view__image-layout">
        <?= Html::img('@img/assets/order-done.png', [
            'alt' => 'Ваш заказ оформлен!',
            'class' => 'order-view__image'
        ]) ?>
    </div>
    <br />
    <div class="order-view__subscribe">
        <?= Subscribe::widget([]) ?>
    </div>
    <br />
    <div class="text-center"> <?= NavMessage::widget([]) ?> </div>
</div>