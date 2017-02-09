<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Order */

$this->title = Yii::t('frontend/site', 'Your order');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="order-view">
    <h1>Заказ номер <?= $model->id ?></h1>
    <div> Итоговая стоимость: <?= $model->total ?> </div>
    <?php
        foreach($model->orderProducts as $product) {
            echo $product->name . " - " . $product->quantity . " : " .
                $product->totalPrice;
        }
    ?>
</div>
