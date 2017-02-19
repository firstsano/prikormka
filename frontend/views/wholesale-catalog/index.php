<?php

/* @var $this \yii\web\View */
/* @var $products \common\models\Product[] */
/* @var $search \frontend\models\search\ProductSearch */

use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use frontend\components\extensions\Html;
use frontend\components\widgets\ProductWholesaleOrder;
use frontend\components\widgets\RemoteSearch;
use frontend\components\widgets\FlashMessages;

$this->title = Yii::t('frontend/site', 'All products');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-wholesale">
    <h1 class="site-wholesale__title"><?= Html::encode($this->title) ?></h1>
    <div class="site-wholesale__layout">
        <?php Pjax::begin([
            'id' => 'wholesale-products',
            'enablePushState' => false,
        ]) ?>
        <div class="site-wholesale__filter">
            <?= RemoteSearch::widget([
                'value' => $search->filter,
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