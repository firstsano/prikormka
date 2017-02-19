<?php

/* @var $this \yii\web\View */
/* @var $linkOptions string */
/* @var $widgetOptions string */

use frontend\components\extensions\Html;
use yii\helpers\ArrayHelper;

\frontend\components\widgets\assets\AddToCartAsset::register($this);

echo Html::a($label,
    ['/site/add-product-to-cart'],
    ArrayHelper::merge(
        $linkOptions,
        [
            'data' => [
                'product-add' => $widgetOptions
            ]
        ]
    )
);
