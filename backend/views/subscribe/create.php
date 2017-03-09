<?php

/* @var $this yii\web\View */
/* @var $model common\models\Subscribe */

$this->title = Yii::t('common\actions', 'Create subscribe');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\site', 'Subscribes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribe-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
