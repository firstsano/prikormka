<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\OrderRegistrationInfo */

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'template' => "<tr><th width='10%'>{label}</th><td>{value}</td></tr>",
    'attributes' => [
        'ogrnip',
        'series',
        'number',
        'receive_date',
    ],
]);