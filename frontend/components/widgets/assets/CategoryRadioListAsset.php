<?php

namespace frontend\components\widgets\assets;


class CategoryRadioListAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'category-radio-list.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}