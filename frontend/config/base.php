<?php
return [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'components' => [
        'urlManager' => require(__DIR__.'/_urlManager.php'),
        'cache' => require(__DIR__.'/_cache.php'),
    ],
    'params' => [
        'mainPhone' => '+7 (960) 88 222 22',
        'companyEmail' => 'etv06@mail.ru',
    ]
];
