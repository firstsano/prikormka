<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories common\models\Category */

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Product;

$this->title = Yii::t('common/site', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <p>
        <?php echo Html::a(Yii::t('common/actions', 'Create product'),
            ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'options' => ['width' => 50],
            ],
            [
                'attribute' => 'category_id',
                'filter' => $categories,
                'value' => function($model) use($categories) {
                    return @$categories[$model->category_id];
                }
            ],
            'name',
            [
                'attribute' => 'price',
                'value' => function($model) {
                    return format_currency($model->price);
                }
            ],
            [
                'attribute' => 'status',
                'filter' => Product::statuses(),
                'value' => function($model) {
                    return Product::statuses()[$model->status];
                }
            ],
            [
                'attribute' => 'weight',
                'value' => function($model) {
                    return format_weight($model->weight);
                }
            ],
            [
                'attribute' => 'season',
                'filter' => Product::seasons(),
                'value' => function($model) {
                    return Product::seasons()[$model->season];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
