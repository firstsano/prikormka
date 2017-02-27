<?php

namespace common\models;

use common\behaviors\CacheInvalidateBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "widget_carousel_item".
 *
 * @property integer $id
 * @property integer $carousel_id
 * @property string $base_url
 * @property string $path
 * @property string $type
 * @property string $image
 * @property string $imageUrl
 * @property string $url
 * @property string $caption
 * @property string $promo
 * @property integer $status
 * @property integer $order
 *
 * @property WidgetCarousel $carousel
 */
class WidgetCarouselItem extends ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @var array|null
     */
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%widget_carousel_item}}';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $key = array_search('carousel_id', $scenarios[self::SCENARIO_DEFAULT], true);
        $scenarios[self::SCENARIO_DEFAULT][$key] = '!carousel_id';
        return $scenarios;
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'image',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'typeAttribute' => 'type'
            ],
            'cacheInvalidate' => [
                'class' => CacheInvalidateBehavior::className(),
                'cacheComponent' => 'frontendCache',
                'keys' => [
                    function ($model) {
                        return [
                            WidgetCarousel::className(),
                            $model->carousel->key
                        ];
                    }
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carousel_id'], 'required'],
            [['carousel_id', 'status', 'order'], 'integer'],
            [['url', 'caption', 'promo', 'base_url', 'path'], 'string', 'max' => 1024],
            [['type'], 'string', 'max' => 255],
            ['image', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function statuses()
    {
        return [
            static::STATUS_DRAFT => Yii::t('common/models/carousel-item', 'status.draft'),
            static::STATUS_PUBLISHED => Yii::t('common/models/carousel-item', 'status.published'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/carousel-item', 'ID'),
            'carousel_id' => Yii::t('common/models/carousel-item', 'Carousel ID'),
            'image' => Yii::t('common/models/carousel-item', 'Image'),
            'base_url' => Yii::t('common/models/carousel-item', 'Base URL'),
            'path' => Yii::t('common/models/carousel-item', 'Path'),
            'type' => Yii::t('common/models/carousel-item', 'File Type'),
            'url' => Yii::t('common/models/carousel-item', 'Url'),
            'caption' => Yii::t('common/models/carousel-item', 'Caption'),
            'promo' => Yii::t('common/models/carousel-item', 'Promo'),
            'status' => Yii::t('common/models/carousel-item', 'Status'),
            'order' => Yii::t('common/models/carousel-item', 'Order')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarousel()
    {
        return $this->hasOne(WidgetCarousel::className(), ['id' => 'carousel_id']);
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return rtrim($this->base_url, '/') . '/' . ltrim($this->path, '/');
    }
}
