<?php

namespace backend\components\menu;

use \Yii;

class Navigation
{
    /**
     * @inheritdoc
     */
    public static function items()
    {
        return [
            [
                'label'=>Yii::t('common', 'Product Categories'),
                'url'=>['/product-category/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('common', 'Products'),
                'url'=>['/product/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend', 'Static pages'),
                'url'=>['/page/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend', 'Articles'),
                'url'=>['/article/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend', 'Article Categories'),
                'url'=>['/article-category/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend', 'Text Widgets'),
                'url'=>['/widget-text/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend', 'Menu Widgets'),
                'url'=>['/widget-menu/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend', 'Carousel Widgets'),
                'url'=>['/widget-carousel/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
        ];
    }
}