<?php

/* @var $this \yii\web\View */
/* @var $product \common\models\Product */

use frontend\components\extensions\Url;
use dosamigos\gallery\Gallery;

?>

<div class="product-image">
    <?php
        $items = [];
        foreach($product->productImages as $image) {
            $items[] = [
                'src' => Url::toImage($image->path, 'thumb'),
                'url' => Url::toImage($image->path, 'main'),
                'options' => [
                    'class' => 'product-image__thumbnail'
                ],
                'imageOptions' => [
                    'class' => 'product-image__thumbnail-image'
                ]
            ];
        }
        echo Gallery::widget([
            'items' => $items,
            'options' => [
                'class' => 'product-image__image-thumbnails'
            ]
        ]);
    ?>
</div>