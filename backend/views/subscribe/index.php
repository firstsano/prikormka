<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SubscribeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common\site', 'Subscribes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribe-index">

        <p>
        <?= Html::a(Yii::t('common\actions', 'Create subscribe'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => ['width' => '60px']
            ],
            'email:email',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'options' => ['width' => '40px']
            ],
        ]
    ]); ?>
</div>
