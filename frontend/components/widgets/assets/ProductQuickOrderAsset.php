<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 05.02.17
 * Time: 17:43
 */

namespace frontend\components\widgets\assets;


class ProductQuickOrderAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'product-quick-order/add.js',
        'product-quick-order/observe-quantity.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}