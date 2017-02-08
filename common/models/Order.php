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
 * @property string $user_name
 * @property string $user_email
 * @property string $user_phone
 * @property string $user_address
 *
 * @property OrderProducts[] $orderProducts
 * @property User $user
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
            [['user_address'], 'string'],
            [['correction_description', 'status', 'user_name', 'user_email', 'user_phone'], 'string', 'max' => 255],
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
            'user_name' => Yii::t('common/models/order', 'User Name'),
            'user_email' => Yii::t('common/models/order', 'User Email'),
            'user_phone' => Yii::t('common/models/order', 'User Phone'),
            'user_address' => Yii::t('common/models/order', 'User Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProducts::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
