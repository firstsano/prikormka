<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\User */

use yii\widgets\DetailView;
use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'User profile');
$this->params['breadcrumbs'][] = $this->title;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'email',
        'username',
        'userProfile.firstname',
        'userProfile.middlename',
        'userProfile.lastname',
        'userProfile.birthday',
        'userProfile.gender',
        'userProfile.phone',
        'userProfile.address',
        'userProfile.site',
        'userProfile.organization'
    ],
]);

echo Html::a(
    Yii::t('frontend/site', 'Edit profile'),
    ['profile/edit'],
    ['class' => 'button']
);