<?php

namespace frontend\components\extensions;

use yii\helpers\ArrayHelper;

class Html extends \yii\helpers\Html
{
    public static function icon($name, $options = [])
    {
        static::addCssClass($options, ['material-icons', 'material-icons_inline']);
        return self::tag('i', $name, $options);
    }

    public static function textIcon($text, $icon, $right = true, $options = [])
    {
        $icon = static::icon($icon, $options);
        return ($right) ? "$text $icon" : "$icon $text";
    }

    public static function textPointer($text)
    {
        return static::textIcon($text, 'keyboard_arrow_right');
    }

    public static function iconButton($icon, $url, $options = [])
    {
        $icon = static::icon($icon, ArrayHelper::getValue($options, 'icon', []));
        unset($options['icon']);
        return static::a($icon, $url, $options);
    }
}