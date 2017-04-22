<?php

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $categories array */

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Product;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/site', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <?php if(Yii::$app->user->can('manager')): ?>
        <p>
            <?php echo Html::a(Yii::t('common\actions', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a(Yii::t('common\actions', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend\site', 'delete-item.confirm'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <?php
        $modelImages = "";
        foreach ($model->productImages as $image) {
            $modelImages .= Html::img($image->url, ['height' => '100px']) . " ";
        }
        echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => @$categories[$model->category_id]
            ],
            'name',
            [
                'attribute' => 'images',
                'format' => 'html',
                'value' => $modelImages
            ],
            [
                'attribute' => 'status',
                'value' => Product::statuses()[$model->status]
            ],
            'slug',
            'description:ntext',
            [
                'attribute' => 'price',
                'value' => format_currency($model->price)
            ],
            [
                'attribute' => 'weight',
                'value' => format_weight($model->weight)
            ],
            'pack_quantity',
            'min_pack_quantity',
            [
                'attribute' => 'season',
                'value' => Product::seasons()[$model->season]
            ],
        ],
    ]) ?>

</div>
