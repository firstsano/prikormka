<?php

namespace frontend\modules\cab\components\menu;

class Cab
{
    public static function items()
    {
        return [
            [
                'label' => 'Профиль',
                'url' => ['profile']
            ],
            [
                'label' => 'Заказы',
                'url' => ['profile/orders']
            ],
        ];
    }
}