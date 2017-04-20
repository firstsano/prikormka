<?php

/* @var $this \yii\web\View */
/* @var $orders \common\models\Order[] */
/* @var $pagination \yii\data\Pagination */

use frontend\components\extensions\Html;
use yii\widgets\LinkPager;


$this->title = Yii::t('frontend/site', 'My orders');
$this->params['breadcrumbs'][] = $this->title;

if (empty($orders)) {
    echo Html::tag('div', 'У вас пока нет заказов...');
} else {
    echo Html::beginTag('div', ['class' => 'orders-list']);
    foreach ($orders as $order) {
        echo $this->render('_view', ['model' => $order]);
    }
    echo LinkPager::widget([
        'pagination' => $pagination,
    ]);
    echo Html::endTag('div');
}
