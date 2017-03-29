<?php

/* @var $this \yii\web\View */
/* @var $product \common\models\Product */

use frontend\components\extensions\Html;
use frontend\components\extensions\Url;

\frontend\components\widgets\assets\ProductImageAsset::register($this);
$activeImageUrl = $product->mainImage->url;

?>

<div class="product-image">
    <div class="product-image__main-image">
        <?= Html::img(Url::toImage($product->mainImage->path, 'main'), [
            'alt' => $product->name,
            'class' => 'product-image__image'
        ]) ?>
    </div>
    <div class="product-image__image-thumbnails">
        <?php foreach($product->productImages as $image): ?>
            <div class="product-image__thumbnail
                <?= ($activeImageUrl === $image->url)? "product-image__thumbnail_active" : "" ?>">
                <?= Html::img(Url::toImage($image->path, 'main'), [
                    'alt' => $product->name,
                    'class' => 'product-image__thumbnail-image'
                ]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>