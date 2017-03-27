<?php

namespace common\commands;

use Yii;
use yii\base\Object;
use trntv\bus\interfaces\SelfHandlingCommand;

/**
 * @author Alexander Koltunov <firstsano@gmail.com>
 */
class ResizeImageCommand extends Object implements SelfHandlingCommand
{
    /**
     * @var string
     */
    public $file;
    /**
     * @var integer
     */
    public $width = NULL;
    /**
     * @var integer
     */
    public $height = NULL;
    /**
     * @var string
     */
    public $to = NULL;

    /**
     * @param \common\commands\ResizeImageCommand $command
     * @return bool
     */
    public function handle($command)
    {
        $file = Yii::getAlias($this->file);
        $image = Yii::$app->image->load($file);
        $image->resize($this->width, $this->height);
        return $image->save($this->to);
    }
}
