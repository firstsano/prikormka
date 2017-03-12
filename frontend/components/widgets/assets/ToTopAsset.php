<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 12.02.17
 * Time: 2:21
 */

namespace frontend\components\widgets\assets;


class ToTopAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'to-top/pushpin.js',
        'to-top/scroll.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}