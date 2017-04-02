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
use frontend\components\widgets\NewsPreview;
use frontend\components\widgets\ProductQuickOrder;
use frontend\components\extensions\Url;


?>

<div class="site-index">
    <section class="site-index__carousel">
        <?php if ($carouselItems) {
            echo Carousel::widget(['items' => $carouselItems]);
         } ?>
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
            <div class="site-index__char">
                <?= Html::img('@img/assets/mail-delivery.png', [
                    'class' => 'site-index__char-image'
                ]) ?>
                <div class="site-index__char-desc">
                    Доставка транспортными <br />
                    компаниями и почтой
                </div>
            </div>
        </div>
    </section>
    <br />
    <br />
    <br />
    <section class="tile-banners">
        <div class="tile-banners__row">
            <div class="tile-banners__column tile-banners__column_half">
                <div class="tile-banners__banner tile-banners__banner_color_1" style="background-image: url('<?= Yii::getAlias('@img/assets/avangard-carp-mix.png') ?>')">
                    <h2 class="tile-banners__title tile-banners__title_color_1"> "Avangard" CARP MIX SCOPEX </h2>
                    <div class="tile-banners__description">
                        Крупно фракционная <br />
                        прикормка для ловли карпа, <br />
                        сазана
                    </div>
                    <?= Html::a('Купить', Url::toProduct(183), ['class' => 'tile-banners__buy-link']) ?>
                </div>
            </div>
            <div class="tile-banners__column tile-banners__column_half">
                <div class="tile-banners__banner tile-banners__banner_color_2" style="background-image: url('<?= Yii::getAlias('@img/assets/universal-motil.png') ?>')">
                    <h2 class="tile-banners__title tile-banners__title_color_2"> Прикормка "Универсальная" (мотыль)</h2>
                    <div class="tile-banners__description">
                        Универсальная прикормочная смесь <br />
                        предназначена для привлечения <br />
                        практически любой мирной рыбы в <br />
                        точку лова и удержания ее
                    </div>
                    <?= Html::a('Купить', Url::toProduct(232), ['class' => 'tile-banners__buy-link']) ?>
                </div>
            </div>
        </div>
        <div class="tile-banners__row">
            <div class="tile-banners__column tile-banners__column_small">
                <div class="tile-banners__banner tile-banners__banner_color_3" style="background-image: url('<?= Yii::getAlias('@img/assets/avangard-bream-native.png') ?>')">
                    <h2 class="tile-banners__title tile-banners__title_color_3"> "Avangard" BREAM NATIVE (ЛЕЩ) </h2>
                    <div class="tile-banners__description">
                        Прикормка для ловли леща в <br />
                        водоемах со слабым <br />
                        течением и без течения
                    </div>
                    <?= Html::a('Купить', Url::toProduct(173), ['class' => 'tile-banners__buy-link']) ?>
                </div>
            </div>
            <div class="tile-banners__column tile-banners__column_large">
                <div class="tile-banners__banner tile-banners__banner_color_4" style="background-image: url('<?= Yii::getAlias('@img/assets/csl-ananas.png') ?>')">
                    <h2 class="tile-banners__title tile-banners__title_color_4"> CSL - кукурузный ликер (АНАНАС) </h2>
                    <div class="tile-banners__description">
                        CSL предназначен в качестве добавки, <br />
                        или пропитки ко всем рыболовным <br />
                        смесям
                    </div>
                    <?= Html::a('Купить', Url::toProduct(253), ['class' => 'tile-banners__buy-link']) ?>
                </div>
            </div>
        </div>
    </section>
    <br />
    <section class="site-index__promo">
        <h1 class="site-index__title">
            Мечта Рыболова
            <div class="site-index__title-sub">&laquo;ЭкоТехнологии-Волгоград&raquo;</div>
        </h1>
        <?= Html::img('@img/assets/single-fish.png', [
            'class' => 'site-index__fish-splitter'
        ]) ?>
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
                <?= Html::a('Смотреть все товары', ['catalog/index'], ['class' => 'new-products__link']); ?>
            </footer>
        </div>
    </section>
    <section class="site-index__news">
        <div class="news-previews">
            <h2 class="news-previews__title"> Новости и статьи </h2>
            <div class="news-previews__row">
                <?php foreach($latestNews as $newsItem) :?>
                    <div class="news-previews__item">
                        <?= NewsPreview::widget(['newsItem' => $newsItem]) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
