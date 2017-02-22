<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\grid\EnumColumn;
use common\models\ArticleCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('common\site', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <p>
        <?= Html::a(
            Yii::t('common\actions', 'Create article'),
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
            'slug',
            'title',
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category ? $model->category->title : null;
                },
                'filter' => ArrayHelper::map(ArticleCategory::find()->all(), 'id', 'title')
            ],
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->author->username;
                }
            ],
            [
                'class' => EnumColumn::className(),
                'attribute' => 'status',
                'enum' => [
                    Yii::t('backend', 'Not Published'),
                    Yii::t('backend', 'Published')
                ]
            ],
            'published_at:datetime',
            'created_at:datetime',

            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ]
        ]
    ]); ?>
</div>
