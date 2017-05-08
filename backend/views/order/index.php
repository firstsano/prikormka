<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Order;

$this->title = Yii::t('backend\site', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'options' => ['width' => 50]
            ],
            'total',
            [
                'attribute' => 'status',
                'filter' => Order::statuses(),
                'value' => function($model) {
                    return Order::statuses()[$model->status];
                },
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model) {
                    return (isset($model->created_at)) ? Yii::$app->formatter->asDate($model->created_at) : "";
                },
            ],
            [
                'attribute' => 'updated_at',
                'value' => function($model) {
                    return (isset($model->updated_at)) ? Yii::$app->formatter->asDate($model->updated_at) : "";
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
