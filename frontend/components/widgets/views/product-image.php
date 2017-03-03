<?php

/* @var $this \yii\web\View */
/* @var $product \common\models\Product */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\ProductImageAsset::register($this);
$activeImageUrl = $product->mainImage->url;

?>

<div class="product-image">
    <div class="product-image__main-image">
        <?= Html::img($activeImageUrl, [
            'alt' => $product->name,
            'class' => 'product-image__image'
        ]) ?>
    </div>
    <div class="product-image__image-thumbnails">
        <?php foreach($product->productImages as $image): ?>
            <div class="product-image__thumbnail
                <?= ($activeImageUrl === $image->url)? "product-image__thumbnail_active" : "" ?>">
                <?= Html::img($image->url, [
                    'alt' => $product->name,
                    'class' => 'product-image__thumbnail-image'
                ]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>