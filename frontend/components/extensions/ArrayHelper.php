<?php

namespace frontend\components\extensions;

class ArrayHelper extends \yii\helpers\ArrayHelper
{
    public static function mapRecursive($array, $key, $value, $recursiveAttribute)
    {
        $output = [];
        foreach ($array as $element) {
            $eKey = static::getValue($element, $key);
            $eVal = static::getValue($element, $value);
            $subElements = static::getValue($element, $recursiveAttribute);
            $output[] = [
                'key' => $eKey,
                'value' => $eVal,
                'items' => static::mapRecursive($subElements, $key, $value, $recursiveAttribute)
            ];
        }

        return $output;
    }
}