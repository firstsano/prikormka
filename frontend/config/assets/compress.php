<?php
/**
 * Configuration file for the "yii asset" console command.
 * @author Eugene Terentev <eugene@terentev.net>
 */

// In the console environment, some path aliases may not exist. Please define these:
Yii::setAlias('@webroot', Yii::getAlias('@frontend/web'));
Yii::setAlias('@web', '/');

return [
    // Adjust command/callback for JavaScript files compressing:
    'jsCompressor' => 'java -jar compiler.jar --js {from} --js_output_file {to}',
    // Adjust command/callback for CSS files compressing:
    'cssCompressor' => 'java -jar yuicompressor.jar --type css {from} -o {to}',

    // The list of asset bundles to compress:
    'bundles' => [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'frontend\assets\AppAsset',
        'frontend\assets\OwlAsset',
        'frontend\components\widgets\assets\AddToCartAsset',
        'frontend\components\widgets\assets\CarouselAsset',
        'frontend\components\widgets\assets\CartAsset',
        'frontend\components\widgets\assets\CatalogFilterAsset',
        'frontend\components\widgets\assets\CategoryRadioListAsset',
        'frontend\components\widgets\assets\DataDisplaySetterAsset',
        'frontend\components\widgets\assets\ProductImageAsset',
        'frontend\components\widgets\assets\QuantitySetterAsset',
        'frontend\components\widgets\assets\SelectorAsset',
        'frontend\components\widgets\assets\ToTopAsset',
        'frontend\components\widgets\assets\WholesaleFilterAsset',
        'kartik\base\WidgetAsset',
        'kartik\select2\Select2Asset',
        'kop\y2sp\assets\InfiniteAjaxScrollAsset',
        'yii\grid\GridViewAsset',
        'yii\widgets\PjaxAsset',
        'dosamigos\gallery\DosamigosAsset',
        'dosamigos\gallery\GalleryAsset',
    ],

    // Asset bundle for compression output:
    'targets' => [
        'all' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/bundle',
            'baseUrl' => '@web/bundle',
            'js' => 'all-{hash}.js',
            'css' => 'all-{hash}.css',
        ],
    ],

    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@frontend/web/assets',
        'baseUrl' => '@frontend/web/assets'
    ],
];