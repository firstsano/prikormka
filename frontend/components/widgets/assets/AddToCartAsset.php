<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.02.17
 * Time: 14:48
 */

namespace frontend\components\widgets\assets;


class AddToCartAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'add-to-cart.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}