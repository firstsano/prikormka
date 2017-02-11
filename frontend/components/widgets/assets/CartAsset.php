<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 12.02.17
 * Time: 2:21
 */

namespace frontend\components\widgets\assets;


class CartAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'cart.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}