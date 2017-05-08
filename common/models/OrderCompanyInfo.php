<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_company_info".
 *
 * @property string $name
 * @property string $inn
 * @property string $kpp
 * @property string $address
 * @property string $signer_name
 * @property string $bik
 * @property string $checking_account
 * @property string $bank_name
 * @property string $cor_account
 * @property string $bank_city
 * @property integer $order_id
 *
 * @property Order $order
 */
class OrderCompanyInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_company_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'integer'],
            [['name', 'inn', 'kpp', 'address', 'signer_name', 'bik', 'checking_account', 'bank_name', 'cor_account', 'bank_city'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('common/models/order-company-info', 'Name'),
            'inn' => Yii::t('common/models/order-company-info', 'Inn'),
            'kpp' => Yii::t('common/models/order-company-info', 'Kpp'),
            'address' => Yii::t('common/models/order-company-info', 'Address'),
            'signer_name' => Yii::t('common/models/order-company-info', 'Signer Name'),
            'bik' => Yii::t('common/models/order-company-info', 'Bik'),
            'checking_account' => Yii::t('common/models/order-company-info', 'Checking Account'),
            'bank_name' => Yii::t('common/models/order-company-info', 'Bank Name'),
            'cor_account' => Yii::t('common/models/order-company-info', 'Cor Account'),
            'bank_city' => Yii::t('common/models/order-company-info', 'Bank City'),
            'order_id' => Yii::t('common/models/order-company-info', 'Order ID'),
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
