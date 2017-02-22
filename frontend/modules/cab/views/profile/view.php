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
        'userProfile.organization'
    ],
]);

echo Html::tag('br');
echo Html::tag('br');
echo Html::a(
    Yii::t('frontend/site', 'Edit profile'),
    ['profile/edit'],
    ['class' => 'button']
);