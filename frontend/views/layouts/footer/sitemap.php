<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use frontend\components\menu\Navigation;

?>

<div class="footer-sitemap">
    <div class="footer-sitemap__layout">
        <div class="footer-sitemap__menu-layout">
            <ul class="footer-sitemap__menu">
                <?php
                    foreach (Navigation::items() as $item) {
                        echo Html::beginTag('li', ['class' => 'footer-sitemap__menu-item']);
                        echo Html::a($item['label'], $item['url'], ['class' => 'footer-sitemap__menu-item-link']);
                        echo Html::endTag('li');
                    }
                ?>
            </ul>
        </div>
        <div class="footer-sitemap__phone"> <?= Yii::$app->params['mainPhone'] ?> </div>
    </div>
</div>
