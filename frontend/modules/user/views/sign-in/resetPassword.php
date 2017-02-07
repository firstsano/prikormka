<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\ResetPasswordForm */

use frontend\components\extensions\StandartActiveForm;

$this->title = Yii::t('frontend', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centered-window">
    <?php $form = StandartActiveForm::begin(['id' => 'reset-password-form']) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->submit(Yii::t('frontend/site', 'Reset password')) ?>
    <?php StandartActiveForm::end(); ?>
</div>
