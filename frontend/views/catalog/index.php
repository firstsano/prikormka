<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */
/* @var $pages \yii\data\Pagination */
/* @var $sortOptions array */
/* @var $paginationOptions array */

use frontend\components\widgets\DataDisplaySetter;
use frontend\components\widgets\ProductQuickOrder;
use frontend\components\widgets\Filter;
use frontend\components\extensions\Html;
use yii\widgets\LinkPager;

$this->title = Yii::t('frontend/site', 'All products');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="catalog-index">
    <h1 class="catalog-index__title"><?= $this->title ?></h1>
    <div class="catalog-index__pre-body">
        <?= DataDisplaySetter::widget([
            'options' => [
                'sort' => [
                    'selected' => $sortOptions['selected'],
                    'options' => $sortOptions['collection']
                ],
                'pagination' => [
                    'selected' => $paginationOptions['selected'],
                    'options' => $paginationOptions['collection']
                ]
            ]
        ]) ?>
    </div>
    <div class="catalog-index__body">
        <div class="catalog-index__filter">
            <?= Filter::widget([]) ?>
        </div>
        <div class="catalog-index__products">
            <div class="catalog-index__products-row">
                <?php foreach($products as $product) {
                    echo Html::beginTag('div', ['class' => 'catalog-index__product']);
                    echo ProductQuickOrder::widget(['product' => $product]);
                    echo Html::endTag('div');
                } ?>
            </div>
            <div class="catalog-index__pagination">
                <?= LinkPager::widget([
                    'pagination' => $pages,
                    'prevPageLabel' => Html::icon('chevron_left'),
                    'nextPageLabel' => Html::icon('chevron_right'),
                    'pageCssClass' => 'waves-effect'
                ]) ?>
            </div>
        </div>
    </div>
</div>
