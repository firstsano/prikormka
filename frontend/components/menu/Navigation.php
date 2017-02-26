<?php

namespace frontend\components\menu;

use Yii;
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
                'url' => [ '/wholesale-catalog/index' ],
                'class' => ['header-menu__item-link_highlight_2']
            ],
            [
                'label' => 'Общий каталог',
                'url' => [ '/catalog/index' ]
            ],
            [
                'label' => 'Новости',
                'url' => [ '/news/index' ]
            ],
            [
                'label' => $someCategories->name,
                'url' => [ '/catalog/index', 'categories[]' => $someCategories->slug ]
            ],
        ];
    }

    public static function topMenuItems()
    {
        return [
            [
                'label' => 'О компании',
                'url' => [ '/site/about' ],
            ],
            [
                'label' => 'Доставка и оплата',
                'url' => [ '/site/delivery' ]
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
}