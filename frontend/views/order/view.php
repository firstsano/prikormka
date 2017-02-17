<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Order */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'Your order');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="order-view">
    <h1 class="order-view__title">Заказ &#35;<?= $model->id ?></h1>

    <?= Yii::$app->flash->renderFlash() ?>

    <table class="cart-details">
        <thead class="cart-details__header">
        <tr>
            <th width="30%" class="cart-details__header-cell"> Наименование </th>
            <th width="*" class="cart-details__header-cell"> Цена за единицу </th>
            <th width="*" class="cart-details__header-cell"> В упаковке </th>
            <th width="*" class="cart-details__header-cell"> Количество </th>
            <th width="*" class="cart-details__header-cell"> Вес </th>
            <th width="*" class="cart-details__header-cell"> Сумма </th>
        </tr>
        </thead>
        <tbody class="cart-details__body">
        <?php foreach ($model->orderProducts as $product): ?>
            <tr class="cart-details__body-row">
                <td class="cart-details__body-cell">
                    <?= Html::a($product->name, ['catalog/view', 'id' => $product->id]) ?>
                </td>
                <td class="cart-details__body-cell"> <?= $product->price ?> руб. </td>
                <td class="cart-details__body-cell"> <?= $product->pack_quantity ?> шт. </td>
                <td class="cart-details__body-cell"> <?= $product->quantity ?> </td>
                <td class="cart-details__body-cell"> <?= $product->weight ?> г. </td>
                <td class="cart-details__body-cell"> <?= $product->totalPrice ?> руб. </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="cart-total">
        <div class="cart-total__price">
            Итого: <?= $model->total ?> руб.
        </div>
    </div>
</div>