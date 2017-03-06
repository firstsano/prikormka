<?php

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = Yii::t('common\actions', 'Update feedback');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\site', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('common\actions', 'Update');
?>

<div class="feedback-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
