<?php

/* @var $this yii\web\View */
/* @var $model common\models\WidgetCarouselItem */

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\WidgetCarouselItem;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\site', 'Carousel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <p>
        <?php echo Html::a(Yii::t('backend\site', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend\site', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend\site', 'delete-item.confirm'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order',
            'caption',
            'promo',
            'url',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => Html::img(@$model->imageUrl, ['height' => '90px'])
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => WidgetCarouselItem::statuses()[$model->status]
            ],
        ],
    ]) ?>

</div>
