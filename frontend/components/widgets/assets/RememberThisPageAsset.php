<?php

namespace frontend\components\widgets\assets;


class RememberThisPageAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'remember-this-page.js',
    ];

    public $depends = [
        'frontend\assets\HistoryAsset'
    ];
}