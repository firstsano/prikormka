<?php

/* @var $this \yii\web\View */
/* @var $pages array */
/* @var $products \common\models\Product[] */
/* @var $search \frontend\models\search\ProductSearch */
/* @var $categories array */

use yii\widgets\Pjax;
use frontend\components\widgets\WholesaleFilter;
use frontend\components\widgets\ProductWholesaleOrder;
use yii\widgets\LinkPager;
use frontend\components\extensions\Html;
use frontend\components\widgets\FlashMessages;
use yii\helpers\Url;

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
                ],
                'options' => ['class' => 'site-wholesale__price-notice']
            ]) ?>
        </div>
        <div class="site-wholesale__excel-price">
            <?= Html::beginTag('a', [
                'href' => Url::to(['/site/download', 'path' => 'files/price.xls']),
                'class' => 'site-wholesale__excel-link'])
            ?>
            <div class="site-wholesale__excel-info">Скачать прайс-лист<br /> в формате Excel</div>
            <?= Html::img('@img/icons/excel.png', ['class' => 'site-wholesale__excel-img']) ?>
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
        <div class="site-wholesale__filter">
            <?= WholesaleFilter::widget([
                'model' => $search,
                'params' => Yii::$app->request->get()
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