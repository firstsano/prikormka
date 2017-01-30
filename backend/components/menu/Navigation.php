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
                'label'=>Yii::t('common/site', 'Product categories'),
                'url'=>['/category/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('common/site', 'Products'),
                'url'=>['/product/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Static pages'),
                'url'=>['/page/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Articles'),
                'url'=>['/article/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Article categories'),
                'url'=>['/article-category/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Text widgets'),
                'url'=>['/widget-text/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Menu widgets'),
                'url'=>['/widget-menu/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Carousel widgets'),
                'url'=>['/widget-carousel/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
        ];
    }
}