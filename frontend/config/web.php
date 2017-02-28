<?php
$config = [
    'homeUrl'=>Yii::getAlias('@frontendUrl'),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'homeUrl' => '/',
    'bootstrap' => ['maintenance'],
    'modules' => [
        'cab' => [
            'class' => 'frontend\modules\cab\Module',
        ],
        'user' => [
            'class' => 'frontend\modules\user\Module',
            'shouldBeActivated' => true
        ],
    ],
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'maintenance' => [
            'class' => 'common\components\maintenance\Maintenance',
            'enabled' => function ($app) {
                return $app->keyStorage->get('frontend.maintenance') === 'enabled';
            }
        ],
        'request' => [
            'cookieValidationKey' => env('FRONTEND_COOKIE_VALIDATION_KEY'),
            'baseUrl' => ''
        ],
        'user' => [
            'class' => 'common\extensions\User',
            'identityClass' => 'common\models\User',
            'loginUrl' => ['/user/sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => 'common\behaviors\LoginTimestampBehavior'
        ],
        'cart' => [
            'class' => 'frontend\extensions\ShoppingCart',
            'cartId' => 'prikormkaCart',
        ],
        'flash' => [
            'class' => 'frontend\components\application\FlashController',
        ],
        'dataDisplay' => [
            'class' => 'frontend\components\application\DataDisplay',
        ],
    ]
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'generators'=>[
            'crud'=>[
                'class'=>'yii\gii\generators\crud\Generator',
                'messageCategory'=>'frontend'
            ]
        ]
    ];
}

return $config;
