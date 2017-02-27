<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\WidgetCarouselItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\grid\EnumColumn;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('common\site', 'Carousel');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <p>
        <?= Html::a(
            Yii::t('common\actions', 'Create carousel item'),
            ['create'],
            ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'columns' => [
            [
                'attribute' => 'id',
                'options' => ['width' => 50]
            ],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($model) {
                    return Html::img(@$model->imageUrl, [
                       'height' => '90px'
                    ]);
                }
            ],
            'caption',
            'promo',
            [
                'class' => EnumColumn::className(),
                'attribute' => 'status',
                'enum' => [
                    Yii::t('backend', 'Not Published'),
                    Yii::t('backend', 'Published')
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
            ]
        ]
    ]); ?>
</div>
