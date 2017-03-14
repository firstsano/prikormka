<?php

namespace frontend\components\widgets\assets;


class CatalogFilterAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'catalog-filter.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}