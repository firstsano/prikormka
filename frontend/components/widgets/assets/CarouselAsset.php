<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.01.17
 * Time: 13:43
 */

namespace frontend\components\widgets\assets;

class CarouselAsset extends \frontend\components\extensions\AssetBundle
{
    public $js = [
        'carousel.js'
    ];

    public $depends = [
        'frontend\assets\OwlAsset'
    ];
}