<?php

/* @var $this \yii\web\View */
/* @var $orders \common\models\Order[] */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'My orders');
$this->params['breadcrumbs'][] = $this->title;

if (empty($orders)) {
    echo Html::tag('div', 'У вас пока нет заказов...');
} else {
    foreach ($orders as $order) {
        echo $this->render('view', ['model' => $order]);
    }
}
