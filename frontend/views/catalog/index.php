<?php

/* @var $this \yii\web\View */
/* @var $search \frontend\models\search\ProductSearch */
/* @var $products \frontend\models\Product[] */
/* @var $pages \yii\data\Pagination */

use frontend\components\widgets\DataDisplaySetter;
use frontend\components\widgets\ProductQuickOrder;
use frontend\components\widgets\CatalogFilter;
use frontend\components\extensions\Html;
use frontend\models\search\ProductSearch;
use frontend\components\widgets\FlashMessages;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Yii::t('frontend/site', 'All products');
$this->params['breadcrumbs'][] = $this->title;
$currentRoute = $this->context->route;
$dataDisplay = Yii::$app->dataDisplay->route($currentRoute);

?>
<div class="catalog-index">
    <h1 class="catalog-index__title"><?= $this->title ?></h1>

    <div class="order-notice">
        <div class="order-notice__message-layout">
            <?= FlashMessages::widget([
                'messages' => [
                    [
                        'title' => 'Уважаемый покупатель!',
                        'message' => "Обращаем ваше внимание, что минимальная сумма общего заказа " .
                            "должна быть не меньше 20 000 руб."
                    ]
                ],
                'options' => ['class' => 'order-notice__message']
            ]) ?>
        </div>
        <div class="order-notice__excel-price">
            <?= Html::beginTag('a', [
                'href' => Url::to(['/site/download', 'path' => 'files/price.xls']),
                'class' => 'order-notice__excel-link'])
            ?>
            <div class="order-notice__excel-info">Скачать прайс-лист<br /> в формате Excel</div>
            <?= Html::img('@img/icons/excel.png', ['class' => 'order-notice__excel-img']) ?>
            <?= Html::endTag('a') ?>
        </div>
    </div>
    <br />

    <div class="catalog-index__pre-body">
        <?= DataDisplaySetter::widget([
            'route' => $currentRoute,
            'options' => [
                'sort' => [
                    'name' => 'order',
                    'selected' => $dataDisplay->order,
                    'options' => ProductSearch::sortByOptions()
                ],
                'pagination' => [
                    'name' => 'perPage',
                    'selected' => $dataDisplay->perPage,
                    'options' => ProductSearch::perPageOptions()
                ]
            ]
        ]) ?>
    </div>
    <div class="catalog-index__body">
        <div class="catalog-index__filter">
            <?= CatalogFilter::widget([
                'model' => $search,
                'params' => Yii::$app->request->get()
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
                    'prevPageLabel' => Html::icon('chevron_left', [
                        'class' => 'pagination__icon'
                    ]),
                    'nextPageLabel' => Html::icon('chevron_right', [
                        'class' => 'pagination__icon'
                    ]),
                    'pageCssClass' => 'waves-effect'
                ]) ?>
            </div>
        </div>
    </div>
</div>
