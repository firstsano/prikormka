<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.02.17
 * Time: 17:06
 */

namespace frontend\components\widgets\assets;


class RemoteSearchAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'remote-search.js',
    ];

    public $depends = [
        '\yii\web\JqueryAsset'
    ];
}