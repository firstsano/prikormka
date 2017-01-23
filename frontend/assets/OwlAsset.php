<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 20.01.17
 * Time: 13:36
 */

namespace frontend\assets;


class OwlAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot/vendor/owl';
    public $baseUrl = '@web/vendor/owl';

    public $js = [
        'owl.carousel.min.js'
    ];

    public $css = [
        'assets/owl.carousel.min.css',
        'assets/owl.theme.default.min.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}