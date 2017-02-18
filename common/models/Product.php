<?php

namespace common\models;

use MongoDB\BSON\Timestamp;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property double $price
 * @property double $weight
 * @property integer $pack_quantity
 * @property integer $min_pack_quantity
 * @property integer $season
 *
 * @property Categories $category
 */
class Product extends \yii\db\ActiveRecord
{
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 0;

    const SEASON_NO_SEASON = 0;
    const SEASON_SUMMER = 1;
    const SEASON_WINTER = 2;

    /**
     * @var array
     */
    public $images;

    /**
     * @var ProductImage
     */
    protected $_mainImage;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name'
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'images',
                'multiple' => true,
                'uploadRelation' => 'productImages',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'weight', 'price', 'images', 'pack_quantity'], 'required'],
            [['slug'], 'unique'],
            [['description'], 'string'],
            [['price', 'weight'], 'number'],
            [['status', 'season'], 'integer'],
            ['season', 'in', 'range' => array_keys(static::seasons()) ],
            [['pack_quantity', 'min_pack_quantity'], 'integer',
                'integerOnly' => true, 'min' => 1],
            [['min_pack_quantity'], 'default', 'value' => 1],
            [['season'], 'default', 'value' => static::SEASON_NO_SEASON],
            [['status'], 'default', 'value' => static::STATUS_DRAFT],
            [['name', 'slug'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/product', 'ID'),
            'category_id' => Yii::t('common/models/product', 'Category'),
            'name' => Yii::t('common/models/product', 'Name'),
            'status' => Yii::t('common/models/product', 'Status'),
            'slug' => Yii::t('common/models/product', 'Slug'),
            'description' => Yii::t('common/models/product', 'Description'),
            'price' => Yii::t('common/models/product', 'Price'),
            'weight' => Yii::t('common/models/product', 'Weight'),
            'pack_quantity' => Yii::t('common/models/product', 'Pack Quantity'),
            'min_pack_quantity' => Yii::t('common/models/product', 'Min Pack Quantity'),
            'season' => Yii::t('common/models/product', 'Season'),
            'images' => Yii::t('common/models/product', 'Images'),
        ];
    }

    /**
     * @return array
     */
    public static function statuses()
    {
        return [
            self::STATUS_PUBLISHED => Yii::t('common/models/product', 'status.published'),
            self::STATUS_DRAFT => Yii::t('common/models/product', 'status.draft'),
        ];
    }

    /**
     * @return array
     */
    public static function seasons()
    {
        return [
            self::SEASON_NO_SEASON => Yii::t('common/models/product', 'season.no-season'),
            self::SEASON_SUMMER => Yii::t('common/models/product', 'season.summer'),
            self::SEASON_WINTER => Yii::t('common/models/product', 'season.winter'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * @return \common\models\ProductImage
     */
    public function getMainImage()
    {
        if (!$this->_mainImage) {
            $this->_mainImage = $this->getProductImages()
                ->addOrderBy(['order' => SORT_ASC])
                ->one()
            ;
        }
        return $this->_mainImage;
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \common\models\queries\ProductQuery(get_called_class());
        return $query->with('category');
    }
}
