<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\PasswordResetRequestForm */

use himiklab\yii2\recaptcha\ReCaptcha;
use frontend\components\extensions\StandartActiveForm;

$this->title =  Yii::t('frontend', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centered-window">
    <?php $form = StandartActiveForm::begin(['id' => 'request-password-reset-form']) ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>
        <?= $form->submit(Yii::t('frontend/site', 'Reset password')) ?>
    <?php StandartActiveForm::end(); ?>
</div>
