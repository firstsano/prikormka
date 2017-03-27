<?php

namespace common\commands;

use Yii;

/**
 * @author Alexander Koltunov <firstsano@gmail.com>
 */
class ShrinkImageCommand extends ResizeImageCommand
{
    /**
     * @param \common\commands\ResizeImageCommand $command
     * @return bool
     */
    public function handle($command)
    {
        $file = Yii::getAlias($this->file);
        $image = Yii::$app->image->load($file);
        if (($this->width !== NULL && ($image->width > $this->width)) ||
            ($this->height !== NULL && ($image->height > $this->height))) {
            $image->resize($this->width, $this->height);
            return $image->save($this->to);
        }
        return false;
    }
}
