<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.01.17
 * Time: 12:41
 */

namespace frontend\components\extensions;

class Html extends \yii\helpers\Html
{
    public static function icon($name, $options = [])
    {
        static::addCssClass($options, ['material-icons', 'material-icons_inline']);
        return self::tag('i', $name, $options);
    }

    public static function textIcon($text, $icon)
    {
        return $text . " " . static::icon($icon);
    }

    public static function textPointer($text)
    {
        return static::textIcon($text, 'keyboard_arrow_right');
    }

    public static function iconButton($icon, $url, $options)
    {
        $icon = static::icon($icon);
        return static::a($icon, $url, $options);
    }
}