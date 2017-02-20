<?php

/* @var $this yii\web\View */
/* @var $model common\models\Order */

use yii\helpers\Html;

$this->title = Yii::t('backend\site', 'Create order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
