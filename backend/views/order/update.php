<?php

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = Yii::t('backend\site', 'Update order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>
    Yii::t('backend\site', 'Order {number}', ['number' => $model->id]),
    'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend\site', 'Update');
?>
<div class="order-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
