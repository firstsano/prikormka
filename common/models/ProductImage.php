<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_images".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $created_at
 * @property integer $order
 *
 * @property virtual $url Return url to display image
 *
 * @property Products $product
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'path'], 'required'],
            [['product_id', 'size', 'created_at', 'order'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/product-image', 'ID'),
            'product_id' => Yii::t('common/models/product-image', 'Product ID'),
            'path' => Yii::t('common/models/product-image', 'Path'),
            'base_url' => Yii::t('common/models/product-image', 'Base Url'),
            'type' => Yii::t('common/models/product-image', 'Type'),
            'size' => Yii::t('common/models/product-image', 'Size'),
            'name' => Yii::t('common/models/product-image', 'Name'),
            'created_at' => Yii::t('common/models/product-image', 'Created At'),
            'order' => Yii::t('common/models/product-image', 'Order'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getUrl()
    {
        return $this->base_url . DIRECTORY_SEPARATOR . $this->path;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
