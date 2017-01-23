<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.01.17
 * Time: 12:41
 */

namespace frontend\components\extensions;

use yii\helpers\ArrayHelper;

class Html extends \yii\helpers\Html
{
    public static function icon($name, $options = [])
    {
        static::addCssClass($options, ['material-icons', 'material-icons_inline']);
        return self::tag('i', $name, $options);
    }
}