<?php

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = Yii::t('common\actions', 'Create feedback');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\site', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="feedback-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
