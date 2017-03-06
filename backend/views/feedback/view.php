<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\models\feedback', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">
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
            'id',
            [
                'attribute' => 'thumbnail',
                'format' => 'html',
                'value' => Html::img($model->imageUrl, ['height' => '100px'])
            ],
            'body:ntext',
            'user_name',
            'user_prof',
        ],
    ]) ?>
</div>
