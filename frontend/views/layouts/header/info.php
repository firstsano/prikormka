<?php

/* @var $this yii\web\View */

use frontend\components\extensions\Url;
use frontend\components\extensions\Html;
use frontend\components\widgets\Cart;
use frontend\components\widgets\QuickSearch;

?>

<div class="header-info">
    <div class="header-info__layout">
        <div class="header-info__logotype-layout">
            <?php
                $img = Html::img('@img/logo/logo.png', ['class' => 'header-info__logotype']);
                echo Html::a($img, Yii::$app->homeUrl);
            ?>
        </div>
        <div class="header-info__search">
            <?= QuickSearch::widget([
                'url' => Url::to(['/site/product-list'])
            ]) ?>
        </div>
        <div class="header-info__phones">
            <div class="header-info__contact-phone"> 8 (960) 882-22-22 </div>
            <div class="header-info__contact-info"> Работаем
                <span class="header-info__contact-info header-info__contact-info_highlight">
                    с 8:00 до 20:00
                </span>
            </div>
            <div class="header-info__contact-info header-info__contact-info_right">
                Email:
                <?= Html::mailto(Yii::$app->params['companyEmail'],
                    Yii::$app->params['companyEmail'],
                    ['class' => 'header-info__contact-info header-info__contact-info_highlight']
                ) ?>
            </div>
        </div>
        <div class="header-info__cart">
            <?= Cart::widget([
                'url' => Url::to(['/cart/view']),
                'count' => Yii::$app->cart->count,
                'cost' => Yii::$app->cart->cost,
            ]) ?>
        </div>
    </div>
</div>