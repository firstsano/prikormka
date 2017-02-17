<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\modules\cab\models\ProfileForm */

use frontend\components\extensions\StandartActiveForm;
use common\models\UserProfile;

$this->title = Yii::t('frontend/site', 'User profile');
$this->params['breadcrumbs'][] = $this->title;

$form = StandartActiveForm::begin([
    'id' => 'profile-form',
    'action' => 'update',
    'method' => 'put'
]);
echo $form->field($model, 'firstname')->textInput();
echo $form->field($model, 'middlename')->textInput();
echo $form->field($model, 'lastname')->textInput();
echo $form->field($model, 'birthday')->textInput();
echo $form->field($model, 'gender')->dropDownlist([
    UserProfile::GENDER_FEMALE => Yii::t('frontend/site', 'Female'),
    UserProfile::GENDER_MALE => Yii::t('frontend/site', 'Male')
]);
echo $form->field($model, 'phone')->textInput();
echo $form->field($model, 'address')->textInput();
echo $form->field($model, 'site')->textInput();
echo $form->field($model, 'organization')->textInput();
echo $form->submit(Yii::t('frontend/site', 'Save'));
StandartActiveForm::end();