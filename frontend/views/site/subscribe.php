<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\models\SubscribeForm */

use frontend\components\extensions\Html;
use frontend\components\widgets\Subscribe;
use frontend\components\widgets\NavMessage;

$this->title = 'Подписка на новостную рассылку';

?>

<div class="site-subscribe">
    <h1 class="site-subscribe__title"><?= $this->title ?></h1>
    <div class="site-subscribe__image-layout">
        <?= Html::img('@img/assets/order-done.png', [
            'alt' => 'Подписка на новостную рассылку',
            'class' => 'site-subscribe__image'
        ]) ?>
    </div>
    <br />
    <div class="site-subscribe__form">
        <?= Subscribe::widget(['model' => $model]) ?>
    </div>
    <br />
    <div class="text-center"> <?= NavMessage::widget([]) ?> </div>
</div>