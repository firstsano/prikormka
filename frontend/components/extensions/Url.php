<?php

namespace frontend\components\extensions;

class Url extends \yii\helpers\Url
{
    public static function toProduct($product)
    {
        return static::to(['/catalog/view',
            'category' => $product->category->slug,
            'slug' => $product->slug,
        ]);
    }

    public static function toImage($path, $type = 'default')
    {
        return static::to(['/site/get-image',
            'path' => $path,
            'type' => $type
        ]);
    }
}