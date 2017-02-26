<?php

/* @var $this \yii\web\View */
/* @var $newProducts \common\models\Product[] */
/* @var $bestOffers \common\models\Product[] */
/* @var $latestNews \common\models\Article[] */

$this->title = 'My Yii Application';

use frontend\components\extensions\Html;
use frontend\components\widgets\Carousel;
use frontend\components\widgets\ClientComment;
use frontend\components\widgets\NewsPreview;
use frontend\components\widgets\ProductQuickOrder;

?>

<div class="site-index">
    <section class="site-index__carousel">
        <?= Carousel::widget([
            'items' => [
                [
                    'img' => Yii::getAlias('@img/carousel/1.png'),
                    'title' => 'Прикормка-паста',
                    'promo' => "\"Карп-Карась\" <br>" .
                        "с <strong>40%</strong> скидкой",
                    'url' => '#'
                ],
                [
                    'img' => Yii::getAlias('@img/carousel/1.png'),
                    'title' => 'Прикормка',
                    'promo' => "\"Вобла-Карась\" <br>" .
                        "с <strong>10%</strong> скидкой",
                    'url' => '#'
                ],
                [
                    'img' => Yii::getAlias('@img/carousel/1.png'),
                    'title' => 'Снаряжение',
                    'promo' => "\"Рыболов\" <strong>new</strong>",
                    'url' => '#'
                ]
            ]
        ]) ?>
    </section>
    <section class="site-index__new-products">
        <div class="new-products">
            <h2 class="new-products__title"> Новинки </h2>
            <div class="new-products__row">
                <? foreach($newProducts as $newProduct)  {
                    echo Html::tag(
                        'div',
                        ProductQuickOrder::widget([ 'product' => $newProduct ]),
                        ['class' => 'new-products__item']
                    );
                } ?>
            </div>
            <footer class="new-products__footer">
                <?= Html::a(Html::textPointer('Смотреть все товары'), ['catalog/index'], ['class' => 'new-products__link']); ?>
            </footer>
        </div>
    </section>
    <section class="site-index__client-comments">
        <div class="client-comments">
            <h2 class="client-comments__title"> Клиенты о нас </h2>
            <div class="client-comments__layout">
                <div class="client-comments__item"> <?= ClientComment::widget([]) ?> </div>
                <div class="client-comments__item"> <?= ClientComment::widget([]) ?> </div>
            </div>
        </div>
    </section>
    <section class="site-index__best-offer">
        <div class="best-offers">
            <h2 class="best-offers__title"> Лучшее предложение </h2>
            <div class="best-offers__row">
                <? foreach($bestOffers as $offer)  {
                    echo Html::tag(
                        'div',
                        ProductQuickOrder::widget(['product' => $offer, 'options' => [
                            'class' => 'q-order_best-offer'
                        ]]),
                        ['class' => 'best-offers__item']
                    );
                } ?>
            </div>
            <footer class="best-offers__footer">
                <?= Html::a(Html::textPointer('Смотреть все акции'), '#', ['class' => 'best-offers__link']); ?>
            </footer>
        </div>
    </section>
    <section class="site-index__news">
        <div class="news-previews">
            <h2 class="news-previews__title"> Новости и статьи </h2>
            <div class="news-previews__row">
                <div class="news-previews__item">
                    <?php foreach($latestNews as $newsItem) {
                        echo NewsPreview::widget([
                            'newsItem' => $newsItem
                        ]);
                    } ?>
                </div>
            </div>
        </div>
    </section>
</div>
