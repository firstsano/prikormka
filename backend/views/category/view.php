<?php

/* @var $this yii\web\View */
/* @var $model common\models\Category */

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Category;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Categories'), 'url' => ['index']];
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
            [
                'attribute' => 'parent_id',
                'value' => Category::findOne(['id' => $model->parent_id])->name
            ],
            'name',
            'slug',
            'description:ntext',
        ],
    ]) ?>

</div>
