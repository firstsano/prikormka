<?php

/* @var $this yii\web\View */
/* @var $model common\models\Order */

use yii\helpers\Html;

$this->title = Yii::t('backend\site', 'Update order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>
    Yii::t('backend\site', 'Order {number}', ['number' => $model->id]),
    'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend\site', 'Update');
?>
<div class="order-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
