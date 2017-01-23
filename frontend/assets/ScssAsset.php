<?php
/**
 * @copyright Copyright (c) 2017
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Koltunov Alexander <firstsano@gmail.com>
 */
class ScssAsset extends AssetBundle
{
    public $sourcePath = '@app/views/scss';
    public $css = [
        'site.scss'
    ];
}
