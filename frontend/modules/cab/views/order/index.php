<?php

/* @var $this \yii\web\View */
/* @var $orders \common\models\Order[] */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'My orders');
$this->params['breadcrumbs'][] = $this->title;

foreach ($orders as $order) {
    echo Html::tag('div', $order->id);
}
