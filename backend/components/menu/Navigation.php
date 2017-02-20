<?php

namespace backend\components\menu;

use \Yii;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;

class Navigation
{
    /**
     * @inheritdoc
     */
    public static function items()
    {
        $menu = [
            [
                'label' => Yii::t('backend', 'Main'),
                'options' => ['class' => 'header'],
                'visible' => Yii::$app->user->can('administrator')
            ],
            [
                'label' => Yii::t('backend/site', 'Timeline'),
                'icon' => '<i class="fa fa-bar-chart-o"></i>',
                'url' => ['/timeline-event/index'],
                'badge'=> TimelineEvent::find()->today()->count(),
                'badgeBgClass'=>'label-success',
                'visible' => Yii::$app->user->can('administrator')
            ],
            [
                'label' => Yii::t('backend', 'Content'),
                'url' => '#',
                'icon' => '<i class="fa fa-edit"></i>',
                'options' => ['class'=>'treeview'],
                'items' => static::mainItems(),
                'visible' => Yii::$app->user->can('administrator')
            ],
            [
                'label' => Yii::t('backend', 'System'),
                'options' => ['class' => 'header'],
                'visible' => Yii::$app->user->can('administrator')
            ],
            [
                'label' => Yii::t('backend', 'Users'),
                'icon' => '<i class="fa fa-users"></i>',
                'url' => ['/user/index'],
                'visible' => Yii::$app->user->can('administrator')
            ],
            [
                'label' => Yii::t('backend', 'Other'),
                'url' => '#',
                'icon' => '<i class="fa fa-cogs"></i>',
                'options' => ['class'=>'treeview'],
                'items' => Navigation::otherItems(),
                'visible' => Yii::$app->user->can('administrator')
            ]
        ];
        if (Yii::$app->user->can('manager')) {
            $menu = ArrayHelper::merge($menu, static::managerMenu());
        }
        return $menu;
    }

    /**
     * @inheritdoc
     */
    public static function managerMenu()
    {
        return [
            [
                'label' => Yii::t('backend/site', 'Timeline'),
                'icon' => '<i class="fa fa-bar-chart-o"></i>',
                'url' => ['/timeline-event/index'],
                'badge'=> TimelineEvent::find()->today()->count(),
                'badgeBgClass'=>'label-success',
            ],
            [
                'label'=>Yii::t('backend/site', 'Orders'),
                'url'=>['/order/index'],
                'icon' => '<i class="fa fa-first-order"></i>',
            ],
            [
                'label'=>Yii::t('backend/site', 'Product categories'),
                'url'=>['/category/index'],
                'icon'=>'<i class="fa fa-tags"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Products'),
                'url'=>['/product/index'],
                'icon'=>'<i class="fa fa-shopping-cart"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Articles'),
                'url'=>['/article/index'],
                'icon'=>'<i class="fa fa-newspaper-o"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Article categories'),
                'url'=>['/article-category/index'],
                'icon'=>'<i class="fa fa-file-text"></i>'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function mainItems()
    {
        return [
            [
                'label'=>Yii::t('backend/site', 'Orders'),
                'url'=>['/order/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Product categories'),
                'url'=>['/category/index'],
                'icon'=>'<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label'=>Yii::t('backend/site', 'Products'),
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

    /**
     * @inheritdoc
     */
    public static function otherItems()
    {
        return [
            [
                'label' => Yii::t('backend', 'i18n'),
                'url' => '#',
                'icon' => '<i class="fa fa-flag"></i>',
                'options' => ['class'=>'treeview'],
                'items' => [
                    [
                        'label' => Yii::t('backend', 'i18n Source Message'),
                        'url' => ['/i18n/i18n-source-message/index'],
                        'icon' => '<i class="fa fa-angle-double-right"></i>'],
                    [
                        'label' => Yii::t('backend', 'i18n Message'),
                        'url' => ['/i18n/i18n-message/index'],
                        'icon' => '<i class="fa fa-angle-double-right"></i>'
                    ],
                ],
                'visible' => Yii::$app->user->can('viewAdminPanel')
            ],
            [
                'label' => Yii::t('backend', 'Key-Value Storage'),
                'url' => ['/key-storage/index'],
                'icon' => '<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label' => Yii::t('backend', 'File Storage'),
                'url' => ['/file-storage/index'],
                'icon' => '<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label' => Yii::t('backend', 'Cache'),
                'url' => ['/cache/index'],
                'icon' => '<i class="fa fa-angle-double-right"></i>',
                'visible' => Yii::$app->user->can('viewAdminPanel')
            ],
            [
                'label' => Yii::t('backend', 'File Manager'),
                'url' => ['/file-manager/index'],
                'icon' => '<i class="fa fa-angle-double-right"></i>'
            ],
            [
                'label' => Yii::t('backend', 'System Information'),
                'url' => ['/system-information/index'],
                'icon' => '<i class="fa fa-angle-double-right"></i>',
                'visible' => Yii::$app->user->can('viewAdminPanel')
            ],
            [
                'label' => Yii::t('backend', 'Logs'),
                'url' => ['/log/index'],
                'icon' => '<i class="fa fa-angle-double-right"></i>',
                'badge' => \backend\models\SystemLog::find()->count(),
                'badgeBgClass' => 'label-danger',
                'visible' => Yii::$app->user->can('viewAdminPanel')
            ],
        ];
    }
}