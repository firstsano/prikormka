<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'vendor/materialize/js/initial.js',
        'vendor/materialize/js/global.js',
        'vendor/materialize/js/pushpin.js'
    ];
    public $css = [
        'css/site.css'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'frontend\assets\MaterializeAsset'
    ];
}
