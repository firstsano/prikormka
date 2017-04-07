<?php

/* @var $this \yii\web\View */

use frontend\components\extensions\Html;
use frontend\components\extensions\Url;
use frontend\components\widgets\FlashMessages;

?>

<div class="order-notice">
    <div class="order-notice__message-layout">
        <?= FlashMessages::widget([
            'messages' => [
                [
                    'title' => 'Уважаемый покупатель!',
                    'message' => "Обращаем ваше внимание, что минимальная сумма общего заказа " .
                        "должна быть не меньше 20 000 руб."
                ]
            ],
            'options' => ['class' => 'order-notice__message']
        ]) ?>
    </div>
    <div class="order-notice__excel-price">
        <?= Html::beginTag('a', [
            'href' => Url::to(['/site/download', 'path' => 'files/price.xls']),
            'class' => 'order-notice__excel-link'])
        ?>
        <div class="order-notice__excel-info">Сделать заказ<br />через прайс-лист</div>
        <?= Html::img('@img/icons/excel.png', ['class' => 'order-notice__excel-img']) ?>
        <?= Html::endTag('a') ?>
    </div>
</div>