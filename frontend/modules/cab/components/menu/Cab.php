<?php

namespace frontend\modules\cab\components\menu;

class Cab
{
    public static function items()
    {
        return [
            [
                'label' => 'Профиль',
                'url' => ['profile/view']
            ],
            [
                'label' => 'Заказы',
                'url' => ['order/index']
            ],
        ];
    }
}