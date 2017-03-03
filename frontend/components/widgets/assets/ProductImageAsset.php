<?php

namespace frontend\components\widgets\assets;

class ProductImageAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'product-image.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}