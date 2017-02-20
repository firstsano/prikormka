<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories common\models\Category[] */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('common/site', 'Product categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <p>
        <?php echo Html::a(Yii::t('common/actions', 'Create category'),
            ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'options' => ['width' => 50]
            ],
            [
                'attribute' => 'parent_id',
                'filter' => $categories,
                'value' => function($model) use($categories) {
                    return @$categories[$model->parent_id];
                }
            ],
            'name',
            'slug',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
