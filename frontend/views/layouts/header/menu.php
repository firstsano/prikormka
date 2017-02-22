<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\components\menu\Navigation;
use yii\helpers\Url;

?>

<div class="header-menu header-menu_inversed">
    <div class="header-menu__container">
        <div class="header-menu__row">
            <ul class="header-menu__layout">
                <?php
                    foreach (Navigation::items() as $item) {
                        Html::addCssClass($item, ['header-menu__item-link']);
                        echo Html::beginTag('li', ['class' => 'header-menu__item']);
                        echo Html::a($item['label'], $item['url'], [
                            'class' => $item['class']
                        ]);
                        echo Html::endTag('li');
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
