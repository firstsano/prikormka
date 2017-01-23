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
                'url' => [ 'site/dummy' ]
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
                'url' => [ 'site/dummy' ]
            ],
            [
                'label' => 'блог',
                'url' => [ 'site/dummy' ]
            ]
        ];
    }
}