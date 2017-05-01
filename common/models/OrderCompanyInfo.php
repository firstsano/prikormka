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
 * @property string $сor_account
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
            [['name', 'inn', 'kpp', 'address', 'signer_name', 'bik', 'checking_account', 'bank_name', 'сor_account', 'bank_city'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
            'address' => 'Address',
            'signer_name' => 'Signer Name',
            'bik' => 'Bik',
            'checking_account' => 'Checking Account',
            'bank_name' => 'Bank Name',
            'сor_account' => 'сor Account',
            'bank_city' => 'Bank City',
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
