<?php

namespace frontend\components\widgets\assets;

class CategoryFilterAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'category-filter.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}