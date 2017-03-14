<?php

/* @var $this \yii\web\View */
/* @var $items \common\models\WidgetCarouselItem */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\CarouselAsset::register($this);

?>

<div class="owl-carousel owl-theme custom-carousel">
    <? foreach ($items as $item): ?>
        <div class="custom-carousel__item" data-src="<?= @$item->imageUrl ?>">
            <div class="carousel-promo">
                <div class="carousel-promo__layout">
                    <?php
                        echo Html::tag('div', @$item->caption, ['class' => 'carousel-promo__title']);
                        echo Html::tag('div', @$item->promo,
                            ['class' => 'carousel-promo__title carousel-promo__title_small']);
                        echo Html::tag('div',
                            Html::a('Подробнее', @$item->url, ['class' => 'carousel-promo__link']));
                    ?>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>