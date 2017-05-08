<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\User */

use yii\widgets\DetailView;
use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'User profile');
$this->params['breadcrumbs'][] = $this->title;

echo DetailView::widget([
    'options' => [
        'class' => 'classic-table'
    ],
    'model' => $model,
    'attributes' => [
        'email',
        'username',
        'userProfile.firstname',
        'userProfile.middlename',
        'userProfile.lastname',
        'userProfile.gender',
        'userProfile.phone',
        'userProfile.address',
        'userProfile.site',
        'userProfile.organization',
        'userAdditionalInfo.client_type',
        'userAdditionalInfo.company_name',
        'userAdditionalInfo.inn',
        'userAdditionalInfo.kpp',
        'userAdditionalInfo.company_address',
        'userAdditionalInfo.signer_name',
        'userAdditionalInfo.bik',
        'userAdditionalInfo.checking_account',
        'userAdditionalInfo.bank_name',
        'userAdditionalInfo.cor_account',
        'userAdditionalInfo.bank_city',
        'userAdditionalInfo.ogrnip',
        'userAdditionalInfo.series',
        'userAdditionalInfo.number',
        [
            'attribute' => 'userAdditionalInfo.receive_date',
            'value' => (@$model->userAdditionalInfo->receive_date) ? Yii::$app->formatter->asDate($model->userAdditionalInfo->receive_date) : ""
        ]
    ],
]);