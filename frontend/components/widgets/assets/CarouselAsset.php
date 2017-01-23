<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.01.17
 * Time: 13:43
 */

namespace frontend\components\widgets\assets;

class CarouselAsset extends \yii\web\AssetBundle
{
    public $js = [
        'js/initialize.js'
    ];

    public $depends = [
        'frontend\assets\OwlAsset'
    ];

    public function init()
    {
        $this->sourcePath = (__DIR__ . '/carousel');
        parent::init();
    }
}