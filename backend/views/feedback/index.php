<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common\site', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">
    <p> <?= Html::a(Yii::t('common\actions', 'Create feedback'), ['create'], ['class' => 'btn btn-success']) ?> </p>
    <?php Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'user_id',
                'user_name',
                'user_prof',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]) ?>
    <?php Pjax::end() ?>
</div>
