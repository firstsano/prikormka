<?php

/* @var $this \yii\web\View */
/* @var $products \common\models\Product[] */
/* @var $search \frontend\models\search\ProductSearch */
/* @var $categories array */

use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use frontend\components\extensions\Html;
use frontend\components\widgets\ProductWholesaleOrder;
use frontend\components\widgets\RemoteSearch;
use frontend\components\widgets\FlashMessages;
use frontend\components\widgets\CategoryFilter;

$this->title = Yii::t('frontend/site', 'Wholesale catalog');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-wholesale">
    <h1 class="site-wholesale__title"><?= Html::encode($this->title) ?></h1>
    <div class="site-wholesale__layout">
        <div class="site-wholesale__notice">
            <?= FlashMessages::widget([
                'messages' => [
                    [
                        'title' => 'Уважаемый покупатель!',
                        'message' => "Обращаем ваше внимание, что минимальная сумма общего заказа " .
                            "должна быть не меньше 20 000 руб."
                    ]
                ]
            ]) ?>
        </div>
        <div class="site-wholesale__excel-price">
            <?= Html::beginTag('a', ['href' => '/price.xls', 'style' => 'white-space:nowrap;']) ?>
            <?= Html::img('@img/icons/excel.png', ['class' => 'site-wholesale__excel-img']) ?>
            <div class="site-wholesale__excel-info">Скачать прайс-лист<br /> в формате Excel</div>
            <?= Html::endTag('a') ?>
        </div>
    </div>
    <div class="site-wholesale__layout">
        <?php Pjax::begin([
            'id' => 'wholesale-products',
            'enablePushState' => false,
            'clientOptions' => [
                'fragment' => '.site-wholesale__products',
                'container' => '.site-wholesale__products',
            ]
        ]) ?>
        <div class="site-wholesale__search">
            <?= RemoteSearch::widget([
                'value' => $search->filter,
            ]) ?>
        </div>
        <div class="site-wholesale__filter">
            <?= CategoryFilter::widget([
                'categories' => $categories
            ]) ?>
        </div>
        <div class="site-wholesale__products">
            <?php
                foreach ($products as $product) {
                    echo ProductWholesaleOrder::widget(['product' => $product]);
                }
                if (empty($products)) {
                    echo FlashMessages::widget([
                        'messages' => [
                            [
                                'title' => 'Не найдено результатов...',
                                'message' => "К сожалению по вашему запросу не найдео результатов. <br />" .
                                    "Попробуйте изменить критерии запроса."
                            ]
                        ]
                    ]);
                }
            ?>
            <?= LinkPager::widget([
                'pagination' => $pages,
                'prevPageLabel' => Html::icon('chevron_left'),
                'nextPageLabel' => Html::icon('chevron_right'),
                'pageCssClass' => 'waves-effect'
            ]) ?>
        </div>
        <?php Pjax::end() ?>
    </div>
</div>