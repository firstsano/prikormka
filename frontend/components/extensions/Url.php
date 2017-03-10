<?php

namespace frontend\components\extensions;

class Url extends \yii\helpers\Url
{
    public static function toProduct($product)
    {
        return static::to(['/catalog/view', 'id' => $product->id]);
    }
}