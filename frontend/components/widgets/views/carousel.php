<?php

/* @var $this \yii\web\View */
/* @var $items array Each object may contain: img, title, promo, url */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\CarouselAsset::register($this);

?>

<div class="owl-carousel owl-theme custom-carousel">
    <? foreach ($items as $item): ?>
        <div class="custom-carousel__item" data-src="<?= $item['img'] ?>">
            <div class="carousel-promo">
                <div class="carousel-promo__layout">
                    <?
                        if (@$item['title']) {
                            echo Html::tag('div', $item['title'], ['class' => 'carousel-promo__title']);
                        }
                        if (@$item['promo']) {
                            echo Html::tag('div', $item['promo'],
                                ['class' => 'carousel-promo__title carousel-promo__title_large']);
                        }
                        if (@$item['url']) {
                            $link = Html::a('Подробнее', $item['url'], ['class' => 'carousel-promo__link']);
                            echo Html::tag('div', $link);
                        }
                    ?>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>