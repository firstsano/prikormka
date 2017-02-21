<?php

namespace frontend\components\menu;

use common\models\Category;

class Navigation
{
    public static function items()
    {
        $someCategories = Category::find()->one();
        return [
            [
                'label' => 'Новинки',
                'url' => [ '/' ],
                'class' => ['header-menu__item-link_highlight_1']
            ],
            [
                'label' => 'Оптовый каталог',
                'url' => [ 'wholesale-catalog/index' ],
                'class' => ['header-menu__item-link_highlight_2']
            ],
            [
                'label' => 'Общий каталог',
                'url' => [ 'catalog/index' ]
            ],
            [
                'label' => 'Новости',
                'url' => [ 'news/index' ]
            ],
            [
                'label' => 'Готовые прикормки',
                'url' => [ 'catalog/index', 'categories[]' => $someCategories->slug ]
            ],
        ];
    }

    public static function topMenuItems()
    {
        return [
            [
                'label' => 'О компании',
                'url' => [ '/' ],
            ],
            [
                'label' => 'Сотрудничество',
                'url' => [ 'catalog/index' ],
            ],
            [
                'label' => 'Доставка и оплата',
                'url' => [ 'site/wholesale' ]
            ],
            [
                'label' => 'Контакты',
                'url' => [ 'site/contact' ]
            ],
            [
                'label' => 'Отзывы',
                'url' => [ 'news/index' ]
            ]
        ];
    }
}