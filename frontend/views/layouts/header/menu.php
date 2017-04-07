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
                        Html::addCssClass($item, ['header-menu__item-link header-menu__item-link_hoverable']);
                        if ($this->context->route == @$item['route']) {
                            Html::addCssClass($item, ['header-menu__item-link_current']);
                        }
                        echo Html::beginTag('li', ['class' => 'header-menu__item']);
                        echo Html::a($item['label'], $item['url'], [
                            'class' => $item['class']
                        ]);
                        echo Html::endTag('li');
                    }
                    echo Html::beginTag('li', ['class' => 'header-menu__item header-menu__item_right']);
                    echo Html::a('Скачать прайс',
                        Url::to(['/site/download', 'path' => 'files/price.xls']), [
                        'class' => 'header-menu__item-link header-menu__item-link_icon header-menu__item-link_highlight_3'
                    ]);
                    echo Html::endTag('li');
                ?>
            </ul>
        </div>
    </div>
</div>
