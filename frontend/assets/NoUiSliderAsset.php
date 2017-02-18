<?php

namespace frontend\assets;

class NoUiSliderAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot/vendor/nouislider';
    public $baseUrl = '@web/vendor/nouislider';

    public $js = [
        'nouislider.min.js'
    ];

    public $css = [
        'nouislider.min.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}