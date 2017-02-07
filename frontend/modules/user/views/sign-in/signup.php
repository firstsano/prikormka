<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */

use frontend\components\extensions\StandartActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

$this->title = Yii::t('frontend', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centered-window">
    <?php $form = StandartActiveForm::begin(['id' => 'form-signup']) ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>
        <?= $form->submit(Yii::t('frontend/site', 'Sign up')) ?>
    <?php StandartActiveForm::end() ?>
</div>
