<?php

/* @var $this \yii\web\View */
/* @var $products \common\models\Product[] */

use frontend\components\extensions\Breadcrumbs;
use frontend\components\extensions\Html;
use frontend\components\widgets\Filter;
use frontend\components\widgets\ProductWholesaleOrder;

$this->title = Yii::t('frontend/site', 'All products');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-wholesale">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <h1 class="site-wholesale__title"><?= Html::encode($this->title) ?></h1>

    <div class="site-wholesale__layout">
        <div class="site-wholesale__filter">
            <?= Filter::widget([]) ?>
        </div>
        <div class="site-wholesale__products">
            <? foreach ($products as $product) {
                echo ProductWholesaleOrder::widget(['product' => $product]);
            } ?>

            <? foreach ($products as $product) {
                echo ProductWholesaleOrder::widget(['product' => $product]);
            } ?>

            <? foreach ($products as $product) {
                echo ProductWholesaleOrder::widget(['product' => $product]);
            } ?>
        </div>
    </div>
</div>

