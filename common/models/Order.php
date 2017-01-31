<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $user_id
 * @property double $price
 * @property double $correction
 * @property string $correction_description
 * @property double $total
 * @property string $status
 *
 * @property User $user
 * @property ProductOrder[] $productOrders
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['price', 'correction', 'total'], 'number'],
            [['status'], 'required'],
            [['correction_description', 'status'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/order', 'ID'),
            'user_id' => Yii::t('common/models/order', 'User ID'),
            'price' => Yii::t('common/models/order', 'Price'),
            'correction' => Yii::t('common/models/order', 'Correction'),
            'correction_description' => Yii::t('common/models/order', 'Correction Description'),
            'total' => Yii::t('common/models/order', 'Total'),
            'status' => Yii::t('common/models/order', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOrders()
    {
        return $this->hasMany(ProductOrder::className(), ['order_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\OrderQuery(get_called_class());
    }
}
