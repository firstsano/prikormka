<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 20.01.17
 * Time: 13:36
 */

namespace frontend\assets;


class HistoryAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot/vendor/history';
    public $baseUrl = '@web/vendor/history';

    public $js = [
        'scripts/bundled/html4+html5/jquery.history.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}