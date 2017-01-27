<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 27.01.17
 * Time: 16:33
 */

namespace frontend\components\extensions;

use ReflectionClass;

class AssetBundle extends \yii\web\AssetBundle
{
    public function init()
    {
        $reflector = new ReflectionClass($this);
        $this->sourcePath = (dirname($reflector->getFileName()) . '/');
        foreach(['js', 'css'] as $ext) {
            if ($this->$ext) {
                foreach ($this->$ext as &$filePath) {
                    $filePath = $ext . DIRECTORY_SEPARATOR . $filePath;
                }
            }
        }
        parent::init();
    }
}