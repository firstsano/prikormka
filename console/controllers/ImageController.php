<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\FileHelper;
use common\commands\ShrinkImageCommand;

/**
 * @author Alexander Koltunov <firstsano@gmail.com>
 */
class ImageController extends Controller
{
    /**
     * @var integer
     */
    public $width = NULL;
    /**
     * @var integer
     */
    public $height = NULL;

    /**
     * @inheritdoc
     */
    public function options($actionID)
    {
        return ['width', 'height'];
    }

    /**
     * @inheritdoc
     */
    public function optionAliases()
    {
        return [
            'w' => 'width',
            'h' => 'height'
        ];
    }


    /**
     * @inheritdoc
     */
    public function actionResizeLargeImages($from, $to)
    {
        $fromDir = $this->_dirPathName($from);
        $toDir = $this->_dirPathName($to);
        if ($this->width === NULL && $this->height === NULL) {
            echo 'Width or height must be specified';
            return static::EXIT_CODE_ERROR;
        }
        if (!is_readable($fromDir)) {
            echo 'Source directory is not readable';
            return static::EXIT_CODE_ERROR;
        }
        if (!is_writable($toDir)) {
            echo 'Target directory is not writable';
            return static::EXIT_CODE_ERROR;
        }

        $files = FileHelper::findFiles($fromDir, [
            'only' => ["\\", '*.jpg', '*.png'],
            'caseSensitive' => false,
        ]);
        $resized = [];
        foreach ($files as $file) {
            echo $file . "\n";
            $isResized = Yii::$app->commandBus->handle(new ShrinkImageCommand([
                'file' => $file,
                'width' => $this->width,
                'height' => $this->height,
                'to' => $toDir . $this->_relativeFilePath($file, $fromDir)
            ]));
            if ($isResized) {
                $resized[] = $file;
            }
        }
        $this->stdout("Total files: " . count($files) . "\n");
        $this->stdout("Total files resized: " . count($resized) . "\n");
    }

    protected function _dirPathName($path)
    {
        if(substr($path, -1) == '/') {
            return substr($path, 0, -1);
        }
        return $path;
    }

    protected function _relativeFilePath($fullPath, $relativeDir)
    {
        if (substr($fullPath, 0, strlen($relativeDir)) == $relativeDir) {
            return substr($fullPath, strlen($relativeDir));
        }
        return $fullPath;
    }
}
