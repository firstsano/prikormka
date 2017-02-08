<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_products".
 *
 * @property integer $id
 * @property string $category
 * @property string $name
 * @property string $description
 * @property double $price
 * @property double $weight
 * @property integer $pack_quantity
 * @property integer $quantity
 * @property integer $order_id
 * @property integer $source_product_id
 *
 * @property Products $sourceProduct
 * @property Orders $order
 */
class OrderProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'weight'], 'number'],
            [['pack_quantity', 'quantity', 'order_id', 'source_product_id'], 'integer'],
            [['category', 'name', 'description'], 'string', 'max' => 255],
            [['source_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['source_product_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/order-product', 'ID'),
            'category' => Yii::t('common/models/order-product', 'Category'),
            'name' => Yii::t('common/models/order-product', 'Name'),
            'description' => Yii::t('common/models/order-product', 'Description'),
            'price' => Yii::t('common/models/order-product', 'Price'),
            'weight' => Yii::t('common/models/order-product', 'Weight'),
            'pack_quantity' => Yii::t('common/models/order-product', 'Pack Quantity'),
            'quantity' => Yii::t('common/models/order-product', 'Quantity'),
            'order_id' => Yii::t('common/models/order-product', 'Order ID'),
            'source_product_id' => Yii::t('common/models/order-product', 'Source Product ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourceProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'source_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }
}
