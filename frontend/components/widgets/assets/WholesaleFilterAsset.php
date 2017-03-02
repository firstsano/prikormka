<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 02.03.17
 * Time: 17:16
 */

namespace frontend\components\widgets\assets;


class WholesaleFilterAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'wholesale-filter.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}