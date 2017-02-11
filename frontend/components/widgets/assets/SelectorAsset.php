<?php

namespace frontend\components\widgets\assets;


class SelectorAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'selector.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}