<?php

namespace frontend\components\widgets\assets;

class DataDisplaySetterAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'data-display-setter.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}