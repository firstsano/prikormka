<?php

namespace frontend\components\menu;

class Navigation
{
    public static function items()
    {
        return [
            [
                'label' => 'главная',
                'url' => [ '/' ]
            ],
            [
                'label' => 'каталог',
                'url' => [ 'catalog/index' ]
            ],
            [
                'label' => 'оптовый заказ',
                'url' => [ 'site/wholesale' ]
            ],
            [
                'label' => 'доставка и оплата',
                'url' => [ 'site/dummy' ]
            ],
            [
                'label' => 'контакты',
                'url' => [ 'site/contact' ]
            ],
            [
                'label' => 'блог',
                'url' => [ 'site/dummy' ]
            ]
        ];
    }
}