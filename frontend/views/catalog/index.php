<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */
/* @var $sortOptions array */
/* @var $paginationOptions array */

use frontend\components\widgets\DataDisplaySetter;
use frontend\components\widgets\ProductQuickOrder;
use frontend\components\widgets\Filter;
use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'All products');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="catalog-index">
    <h1 class="catalog-index__title"><?= $this->title ?></h1>
    <div class="catalog-index__pre-body">
        <?= DataDisplaySetter::widget([
            'options' => [
                'sort' => [
                    'options' => $sortOptions
                ],
                'pagination' => [
                    'options' => $paginationOptions
                ]
            ]
        ]) ?>
    </div>
    <div class="catalog-index__body">
        <div class="catalog-index__filter">
            <?= Filter::widget([]) ?>
        </div>
        <div class="catalog-index__products">
            <?php foreach($products as $product) {
                echo Html::beginTag('div', ['class' => 'catalog-index__product']);
                echo ProductQuickOrder::widget(['product' => $product]);
                echo Html::endTag('div');
            } ?>
        </div>
    </div>
</div>
