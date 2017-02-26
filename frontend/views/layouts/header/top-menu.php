<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\components\menu\Navigation;
use frontend\components\extensions\ArrayHelper;

?>

<div class="header-menu header-menu_top-menu">
    <div class="header-menu__container">
        <div class="header-menu__row">
            <ul class="header-menu__layout header-menu__layout_half">
                <?php
                    foreach (Navigation::topMenuItems() as $item) {
                        $visible = ArrayHelper::getValue($item, 'visible', true);
                        if (!$visible) {
                            continue;
                        }
                        Html::addCssClass($item, ['header-menu__item-link']);
                        echo Html::beginTag('li', ['class' => 'header-menu__item']);
                        echo Html::a($item['label'], $item['url'], [
                            'class' => $item['class']
                        ]);
                        echo Html::endTag('li');
                    }
                ?>
            </ul>
            <ul class="header-menu__layout header-menu__layout_half header-menu__layout_right">
                <?php
                foreach (Navigation::signInItems() as $item) {
                    $visible = ArrayHelper::getValue($item, 'visible', true);
                    if (!$visible) {
                        continue;
                    }
                    Html::addCssClass($item, ['header-menu__item-link']);
                    echo Html::beginTag('li', ['class' => 'header-menu__item']);
                    echo Html::a($item['label'], $item['url'], [
                        'class' => $item['class'],
                        'data'  => @$item['data']
                    ]);
                    echo Html::endTag('li');
                }
                ?>
            </ul>
        </div>
    </div>
</div>
