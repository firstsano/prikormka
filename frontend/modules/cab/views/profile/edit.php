<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\modules\cab\models\ProfileForm */

use frontend\components\extensions\StandartActiveForm;
use common\models\UserProfile;
use frontend\models\OrderForm;
use yii\jui\DatePicker;
use yii\widgets\MaskedInput;

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
echo $form->field($model, 'gender')->dropDownlist([
    UserProfile::GENDER_FEMALE => Yii::t('frontend/site', 'Female'),
    UserProfile::GENDER_MALE => Yii::t('frontend/site', 'Male')
]);
echo $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '(999) 999-9999',
    'options' => ['class' => 'standart-form__input']
]);
echo $form->field($model, 'address')->textInput();
?>
<br />
<br />
<br />
<?php
echo $form->field($model, 'client_type')->dropDownlist([
    OrderForm::JURIDICAL => Yii::t('frontend/site', 'Juridical'),
    OrderForm::PHYSYCAL => Yii::t('frontend/site', 'Physical'),
    OrderForm::INDIVIDUAL => Yii::t('frontend/site', 'Individual')
]);
?>
<hr />
<div>
    <span> Данные компании и банковские реквизиты </span>
    <span> (для юр.лиц и ИП): </span>
    <br />
    <br />
    <?php
        echo $form->field($model, 'company_name')->textInput();
        echo $form->field($model, 'inn')->textInput();
        echo $form->field($model, 'kpp')->textInput();
        echo $form->field($model, 'company_address')->textInput();
        echo $form->field($model, 'signer_name')->textInput();
        echo $form->field($model, 'bik')->textInput();
        echo $form->field($model, 'checking_account')->textInput();
        echo $form->field($model, 'bank_name')->textInput();
        echo $form->field($model, 'cor_account')->textInput();
        echo $form->field($model, 'bank_city')->textInput();
    ?>
</div>
<hr />
<div>
    <span> Свидетельство о регистрации </span>
    <span> (для ИП) </span>
    <br />
    <br />
    <?php
        echo $form->field($model, 'ogrnip')->textInput();
        echo $form->field($model, 'series')->textInput();
        echo $form->field($model, 'number')->textInput();
        echo $form->field($model, 'receive_date')->widget(DatePicker::classname(), [
            'options' => ['class' => 'standart-form__input'],
            'dateFormat' => 'yyyy-MM-dd',
        ]);
    ?>
</div>
<?php
echo $form->submit(Yii::t('frontend/site', 'Save'));
StandartActiveForm::end();