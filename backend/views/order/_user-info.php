<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\OrderUserInfo */

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'template' => "<tr><th width='10%'>{label}</th><td>{value}</td></tr>",
    'attributes' => [
        'name',
        'email:email',
        'phone',
        'address'
    ],
]);
