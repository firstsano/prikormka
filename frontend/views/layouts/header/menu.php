<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\components\menu\Navigation;

?>

<div class="header-menu z-depth-1">
    <div class="header-menu__container">
        <div class="header-menu__row">
            <ul class="header-menu__layout">
                <?php
                    foreach (Navigation::items() as $item) {
                        echo Html::beginTag('li', ['class' => 'header-menu__item']);
                        echo Html::a($item['label'], $item['url'], ['class' => 'header-menu__item-link']);
                        echo Html::endTag('li');
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
