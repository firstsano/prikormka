<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\components\menu\Navigation;

?>

<div class="header-menu header-menu_top-menu">
    <div class="header-menu__container">
        <div class="header-menu__row">
            <ul class="header-menu__layout">
                <?php
                    foreach (Navigation::topMenuItems() as $item) {
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
