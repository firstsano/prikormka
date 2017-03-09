<?php

namespace frontend\components\menu;

use Yii;
use common\models\Product;

class Navigation
{
    public static function items()
    {
        return [
            [
                'label' => 'Главная',
                'url' => [ '/' ],
                'class' => ['header-menu__item-link_highlight_1']
            ],
            [
                'label' => 'Оптовый каталог',
                'url' => [ '/wholesale-catalog/index' ],
                'class' => ['header-menu__item-link_highlight_2']
            ],
            [
                'label' => 'Каталог',
                'url' => [ '/catalog/index' ]
            ],
            [
                'label' => 'Летние прикормки',
                'url' => [ '/catalog/index', 'seasons[]' => Product::SEASON_SUMMER ]
            ],
            [
                'label' => 'Зимние прикормки',
                'url' => [ '/catalog/index', 'seasons[]' => Product::SEASON_WINTER ]
            ],
            [
                'label' => 'Новости',
                'url' => [ '/news/index' ]
            ],
            [
                'label' => 'Отзывы',
                'url' => [ '/feedbacks/index' ]
            ],
        ];
    }

    public static function topMenuItems()
    {
        return [
            [
                'label' => Yii::t('frontend/site', 'About'),
                'url' => ['/site/page', 'view' => 'about'],
            ],
            [
                'label' => 'Доставка и оплата',
                'url' => ['/site/page', 'view' => 'delivery'],
            ],
            [
                'label' => 'Контакты',
                'url' => [ '/site/contact' ]
            ]
        ];
    }

    public static function signInItems()
    {
        return [
            [
                'label' => 'Вход',
                'url' => [ '/user/sign-in/login' ],
                'visible' => Yii::$app->user->isGuest,
            ],
            [
                'label' => 'Регистрация',
                'url' => [ '/user/sign-in/signup' ],
                'visible' => Yii::$app->user->isGuest,
            ],
            [
                'label' => 'Админка',
                'url' => [ '/admin' ],
                'visible' => Yii::$app->user->can('manager'),
            ],
            [
                'label' => 'Личный кабинет',
                'url' => [ '/cab' ],
                'visible' => !Yii::$app->user->isGuest,
            ],
            [
                'label' => 'Выход',
                'url' => [ '/user/sign-in/logout' ],
                'data' => ['method' => 'POST'],
                'visible' => !Yii::$app->user->isGuest,
            ],
        ];
    }

    public static function contactItems()
    {
        return [
            [
                'label' => Yii::t('frontend/site', 'Delivery service'),
                'url' => ['/site/page', 'view' => 'delivery'],
            ],
            [
                'label' => Yii::t('frontend/site', 'Payment'),
                'url' => ['/site/page', 'view' => 'payment'],
            ],
            [
                'label' => Yii::t('frontend/site', 'About'),
                'url' => ['/site/page', 'view' => 'about'],
            ]
        ];
    }
}