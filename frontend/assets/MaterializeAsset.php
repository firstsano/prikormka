<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.01.17
 * Time: 15:09
 */

namespace frontend\assets;


class MaterializeAsset extends \yii\web\AssetBundle
{
    public $baseUrl = 'https://fonts.googleapis.com/';

    public $css = [
        "icon?family=Material+Icons"
    ];

    public $depends = [
        '\yii\web\JqueryAsset'
    ];
}