<?php

namespace frontend\components\menu;

class Navigation
{
    public static function items()
    {
        return [
            [
                'label' => 'Новинки',
                'url' => [ '/' ],
                'class' => ['header-menu__item-link_highlight_1']
            ],
            [
                'label' => 'Оптовый каталог',
                'url' => [ 'catalog/index' ],
                'class' => ['header-menu__item-link_highlight_2']
            ],
            [
                'label' => 'Общий каталог',
                'url' => [ 'site/wholesale' ]
            ],
            [
                'label' => 'Готовые прикормки',
                'url' => [ 'site/contact' ]
            ],
            [
                'label' => 'Универсальные',
                'url' => [ 'news/index' ]
            ],
            [
                'label' => 'Новости',
                'url' => [ 'news/index' ]
            ]
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