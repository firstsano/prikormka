<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'total') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'user_name') ?>

    <?php // echo $form->field($model, 'user_email') ?>

    <?php // echo $form->field($model, 'user_phone') ?>

    <?php // echo $form->field($model, 'user_address') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend\models\order', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend\models\order', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
