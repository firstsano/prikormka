<?php

/* @var $this yii\web\View */
/* @var $model common\models\Order */

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Order;

$this->title = Yii::t('backend\site', 'Order {number}', ['number' => $model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <p>
        <?= Html::a(Yii::t('backend\site', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend\site', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend\site', 'delete-item.confirm'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'total',
                'value' => format_currency($model->total)
            ],
            [
                'attribute' => 'status',
                'value' => Order::statuses()[$model->status]
            ],
            'comment:ntext',
            [
                'attribute' => 'delivery',
                'value' => Order::deliveries()[$model->delivery]
            ],
            'user_name',
            'user_email:email',
            'user_phone',
            'user_address:ntext',
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asDatetime($model->created_at)
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asDatetime($model->updated_at)
            ],
            [
                'attribute' => 'orderProducts',
                'format' => 'raw',
                'value' => $this->render('_orderProducts', ['model' => $model])
            ],
        ],
    ]) ?>

</div>
