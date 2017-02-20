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
 * @property text $comment
 * @property integer $delivery
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

    const DELIVERY_TRANSPORT_COMPANY = 1;
    const DELIVERY_RUSSIA_MAIL = 2;

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
            [['status', 'delivery'], 'integer'],
            [['delivery'], 'in', 'range' => array_keys(static::deliveries())],
            [['comment'], 'string'],
            [['user_name', 'user_email', 'user_phone', 'user_address'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_name', 'user_phone'], 'required', 'when' => function($model) {
                return empty($model->user_id);
            }],
            [['total'], 'compare', 'operator' => '>=', 'compareValue' => Yii::$app->params['minOrder']]
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
            'comment' => Yii::t('common/models/order', 'Comment'),
            'delivery' => Yii::t('common/models/order', 'Delivery'),
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
     * @return array
     */
    public static function deliveries()
    {
        return [
            self::DELIVERY_TRANSPORT_COMPANY => Yii::t('common/models/order', 'delivery.tc'),
            self::DELIVERY_RUSSIA_MAIL => Yii::t('common/models/order', 'delivery.rm'),
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
