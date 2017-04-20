<?php
return [
    'class'=>'yii\web\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'rules'=> [
        // Pages
        ['pattern'=>'page/<slug>', 'route'=>'page/view'],

        // Articles
        ['pattern'=>'article/index', 'route'=>'article/index'],
        ['pattern'=>'article/attachment-download', 'route'=>'article/attachment-download'],
        ['pattern'=>'article/<slug>', 'route'=>'article/view'],

        // Catalog
        ['pattern' => 'catalog', 'route' => 'catalog/index'],
        ['pattern' => 'catalog/<category>/<slug>', 'route' => 'catalog/view'],

        // WholesaleCatalog
        ['pattern' => 'optovii-catalog', 'route' => 'wholesale-catalog/index'],

        // News
        ['pattern' => 'novosti', 'route' => 'news/index'],
        ['pattern' => 'novosti/<slug>', 'route' => 'news/view'],
    ]
];
