<?php

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = Yii::t('common\actions', 'Create order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
