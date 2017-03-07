<?php

/* @var $this \yii\web\View */
/* @var $feedbacks \common\models\Feedback[] */
/* @var $carouselItems \common\models\WidgetCarouselItem[] */
/* @var $newProducts \common\models\Product[] */
/* @var $bestOffers \common\models\Product[] */
/* @var $latestNews \common\models\Article[] */

$this->title = Yii::t('frontend/site', 'About');

use frontend\components\extensions\Html;
use frontend\components\widgets\Carousel;
use frontend\components\widgets\ClientComment;
use frontend\components\widgets\NewsPreview;
use frontend\components\widgets\ProductQuickOrder;


?>

<div class="site-index">
    <section class="site-index__carousel">
        <?php if ($carouselItems) {
            echo Carousel::widget(['items' => $carouselItems]);
         } ?>
    </section>
    <section class="site-index__promo">
        <h1 class="site-index__title">
            Мечта Рыбалова
            <div class="site-index__title-sub">&laquo;ЭкоТехнологии-Волгоград&raquo;</div>
            <br />
            <?= Html::img('@img/assets/single-fish.png', [
                'height' => '25px'
            ]) ?>
        </h1>
        <div class="site-index__promo-description">
            Компания &laquo;ЭкоТехнологии-Волгоград&raquo; является производителем и оптовым поставщиком
            рыболовных прикормок, смесей и живых наживок. Мы специализируемся на создании макисмально
            эффективной продукции, которая позволит достигать спортсменам и любителям рыболовам высоких
            результатов. Мы осуществляем оптовые поставки рыболовного червя, опарыша и прикормки оптом
            в Москву, все регионы России и страны ближнего зарубежья. Продукция компании пользуется
            заслуженным спросом и авторитетом как в России, так и на Украине и в Белоруссии. Неотъемлемой
            частью производства является и производство живых насадок, таких как опарыш и червь.
        </div>
    </section>
    <section class="site-index__chars-layout">
        <div class="site-index__chars">
            <div class="site-index__char">
                <?= Html::img('@img/assets/manufacturing.png', [
                    'class' => 'site-index__char-image'
                ]) ?>
                <div class="site-index__char-desc">
                    Собственное производство <br />
                    прикормок и смесей
                </div>
            </div>
            <div class="site-index__char">
                <?= Html::img('@img/assets/lots-of-positions.png', [
                    'class' => 'site-index__char-image'
                ]) ?>
                <div class="site-index__char-desc">
                    Ассортимент товаров <br />
                    более 1000 позиций
                </div>
            </div>
            <div class="site-index__char">
                <?= Html::img('@img/assets/minimum-order.png', [
                    'class' => 'site-index__char-image'
                ]) ?>
                <div class="site-index__char-desc">
                    Минимальный заказ <br />
                    от 20000 рублей
                </div>
            </div>
        </div>
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
