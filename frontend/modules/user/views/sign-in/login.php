<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

use frontend\components\extensions\Breadcrumbs;
use frontend\components\extensions\Html;
use frontend\components\extensions\StandartActiveForm;

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centered-window">
    <?php $form = StandartActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'login-form']
    ]) ?>
        <?= $form->field($model, 'identity') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->submit(Yii::t('frontend/site', 'Log in')) ?>
        <div class="login-form__other-links">
            <?= Html::a(Yii::t('frontend/site', 'Forgot password') . "?",
                ['sign-in/request-password-reset'],
                ['class' => 'login-form__reset-password']) ?>
            <?= Html::a(Yii::t('frontend/site', 'Signing up'), ['signup'],
                ['class' => 'login-form__sign-up']) ?>
        </div>
    <?php StandartActiveForm::end(); ?>
</div>
