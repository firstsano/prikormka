<?php

namespace frontend\components\widgets\assets;


class RangeSliderAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'slider.js',
    ];

    public $depends = [
        'frontend\assets\NoUiSliderAsset'
    ];
}