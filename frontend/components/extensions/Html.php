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

    public static function recursiveMenu($array, $options = [])
    {
        $output = static::beginTag('ul', $options);
        foreach ($array as $element) {
            $output .= static::beginTag('li');
            $output .= Html::a($element['value'],
                ['/wholesale-catalog/index', 'category' => $element['key']]
            );
            if (!empty($element['items'])) {
                $output .= static::recursiveMenu($element['items'], ['class' => 'filter-menu__submenu']);
            }
            $output .= static::endTag('li');
        }
        $output .= static::endTag('ul');
        return $output;
    }
}