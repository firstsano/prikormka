<?php

/* @var $this \yii\web\View */
/* @var $search \frontend\models\search\ProductSearch */
/* @var $products \frontend\models\Product[] */
/* @var $pages \yii\data\Pagination */

use frontend\components\widgets\DataDisplaySetter;
use frontend\components\widgets\ProductQuickOrder;
use frontend\components\widgets\Filter;
use frontend\components\extensions\Html;
use frontend\models\search\ProductSearch;
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
                    'name' => 'sortBy',
                    'selected' => Yii::$app->request->get('sortBy'),
                    'options' => ProductSearch::sortByOptions()
                ],
                'pagination' => [
                    'name' => 'perPage',
                    'selected' => Yii::$app->request->get('perPage'),
                    'options' => ProductSearch::perPageOptions()
                ]
            ]
        ]) ?>
    </div>
    <div class="catalog-index__body">
        <div class="catalog-index__filter">
            <?= Filter::widget([
                'model' => $search
            ]) ?>
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
