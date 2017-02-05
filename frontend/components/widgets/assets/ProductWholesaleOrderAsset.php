<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 05.02.17
 * Time: 17:43
 */

namespace frontend\components\widgets\assets;


class ProductWholesaleOrderAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'product-wholesale-order/add.js',
        'product-wholesale-order/observe-quantity.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}