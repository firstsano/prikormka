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
 * @property string $seasonality
 *
 * @property Categories $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public $images;

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
//            [['category_id', 'pack_quantity', 'min_pack_quantity'], 'integer'],
            [['name'], 'required'],
            [['slug'], 'unique'],
            [['description'], 'string'],
            [['price', 'weight'], 'number'],
            [['name', 'slug', 'seasonality'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['images'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/product', 'ID'),
            'category_id' => Yii::t('common/models/product', 'Category ID'),
            'name' => Yii::t('common/models/product', 'Name'),
            'slug' => Yii::t('common/models/product', 'Slug'),
            'description' => Yii::t('common/models/product', 'Description'),
            'price' => Yii::t('common/models/product', 'Price'),
            'weight' => Yii::t('common/models/product', 'Weight'),
            'pack_quantity' => Yii::t('common/models/product', 'Pack Quantity'),
            'min_pack_quantity' => Yii::t('common/models/product', 'Min Pack Quantity'),
            'seasonality' => Yii::t('common/models/product', 'Seasonality'),
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
     * @inheritdoc
     * @return \common\models\queries\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ProductQuery(get_called_class());
    }
}
