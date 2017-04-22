<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Order */

use frontend\components\extensions\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th width="20%"> Наименование </th>
        <th width="*"> Цена за единицу </th>
        <th width="*"> Количество </th>
        <th width="*"> Сумма </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model->orderProducts as $product): ?>
        <tr>
            <td>
                <?= Html::a( StringHelper::truncate($product->name, 50),
                    Url::to(['/product/view', 'id' => $product->sourceProduct->id]),
                    ['title' => $product->name]) ?>
            </td>
            <td> <?= $product->price ?> руб. </td>
            <td> <?= $product->quantity ?> </td>
            <td> <?= $product->totalPrice ?> руб. </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>