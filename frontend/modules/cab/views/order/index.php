<?php

/* @var $this \yii\web\View */
/* @var $orders \common\models\Order[] */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'My orders');
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="order-view">
    <h1 class="order-view__title"><?= $this->title ?></h1>
</div>

<?php
foreach ($orders as $order) {
    echo $this->render('view', ['model' => $order]);
}
?>
