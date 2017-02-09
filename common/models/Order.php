<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $user_id
 * @property double $total
 * @property integer $status
 * @property string $user_session
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
    const STATUS_NEW = 1;
    const STATUS_PAYED = 2;
    const STATUS_SHIPPED = 3;
    const STATUS_COMPLETE = 4;


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
            [['total'], 'number'],
            [['status'], 'default', 'value' => static::STATUS_NEW],
            [['status'], 'integer'],
            [['user_session', 'user_name', 'user_email', 'user_phone', 'user_address'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_session', 'user_name', 'user_email', 'user_phone', 'user_address'], 'required', 'when' => function($model) {
                return empty($model->user_id);
            }]
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
            'total' => Yii::t('common/models/order', 'Total'),
            'status' => Yii::t('common/models/order', 'Status'),
            'user_name' => Yii::t('common/models/order', 'User Name'),
            'user_email' => Yii::t('common/models/order', 'User Email'),
            'user_phone' => Yii::t('common/models/order', 'User Phone'),
            'user_address' => Yii::t('common/models/order', 'User Address'),
        ];
    }

    /**
     * Returns order statuses list
     * @return array|mixed
     */
    public static function statuses()
    {
        return [
            self::STATUS_NEW => Yii::t('common/models/order', 'status.new'),
            self::STATUS_PAYED => Yii::t('common/models/order', 'status.payed'),
            self::STATUS_SHIPPED => Yii::t('common/models/order', 'status.shipped'),
            self::STATUS_COMPLETE => Yii::t('common/models/order', 'status.complete')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
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
