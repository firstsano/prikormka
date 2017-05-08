<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\OrderCompanyInfo */

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'template' => "<tr><th width='10%'>{label}</th><td>{value}</td></tr>",
    'attributes' => [
        'name',
        'inn',
        'kpp',
        'address',
        'signer_name',
        'bik',
        'checking_account',
        'bank_name',
        [
            'attribute' => 'cor_account',
            'value' => $model->cor_account
        ],
        'bank_city'
    ]
]);