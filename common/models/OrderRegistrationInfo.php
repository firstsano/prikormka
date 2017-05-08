<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_registration_info".
 *
 * @property string $ogrnip
 * @property string $series
 * @property string $number
 * @property string $receive_date
 * @property integer $order_id
 *
 * @property Order $order
 */
class OrderRegistrationInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_registration_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receive_date'], 'safe'],
            [['order_id'], 'integer'],
            [['ogrnip', 'series', 'number'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ogrnip' => Yii::t('common/models/order-registration-info', 'Ogrnip'),
            'series' => Yii::t('common/models/order-registration-info', 'Series'),
            'number' => Yii::t('common/models/order-registration-info', 'Number'),
            'receive_date' => Yii::t('common/models/order-registration-info', 'Receive Date'),
            'order_id' => 'Order ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
