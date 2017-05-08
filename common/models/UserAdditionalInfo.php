<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_additional_info".
 *
 * @property integer $id
 * @property string $client_type
 * @property string $company_name
 * @property string $inn
 * @property string $kpp
 * @property string $company_address
 * @property string $signer_name
 * @property string $bik
 * @property string $checking_account
 * @property string $bank_name
 * @property string $cor_account
 * @property string $bank_city
 * @property string $ogrnip
 * @property string $series
 * @property string $number
 * @property integer $receive_date
 * @property integer $user_id
 *
 * @property User $user
 */
class UserAdditionalInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_additional_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receive_date', 'user_id'], 'integer'],
            [['company_name', 'client_type', 'inn', 'kpp', 'company_address', 'signer_name', 'bik', 'checking_account', 'bank_name', 'cor_account', 'bank_city', 'ogrnip', 'series', 'number'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_type' => Yii::t('common\models\user-additional-info', 'Client Type'),
            'company_name' => Yii::t('common\models\user-additional-info', 'Company Name'),
            'inn' => Yii::t('common\models\user-additional-info', 'Inn'),
            'kpp' => Yii::t('common\models\user-additional-info', 'Kpp'),
            'company_address' => Yii::t('common\models\user-additional-info', 'Company Address'),
            'signer_name' => Yii::t('common\models\user-additional-info', 'Signer Name'),
            'bik' => Yii::t('common\models\user-additional-info', 'Bik'),
            'checking_account' => Yii::t('common\models\user-additional-info', 'Checking Account'),
            'bank_name' => Yii::t('common\models\user-additional-info', 'Bank Name'),
            'cor_account' => Yii::t('common\models\user-additional-info', 'Cor Account'),
            'bank_city' => Yii::t('common\models\user-additional-info', 'Bank City'),
            'ogrnip' => Yii::t('common\models\user-additional-info', 'Ogrnip'),
            'series' => Yii::t('common\models\user-additional-info', 'Series'),
            'number' => Yii::t('common\models\user-additional-info', 'Number'),
            'receive_date' => Yii::t('common\models\user-additional-info', 'Receive Date'),
            'user_id' => Yii::t('common\models\user-additional-info', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
