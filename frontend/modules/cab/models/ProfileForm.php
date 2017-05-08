<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 12.02.17
 * Time: 9:40
 */

namespace frontend\modules\cab\models;

use Yii;
use yii\base\Model;
use common\models\UserProfile;

class ProfileForm extends Model
{
    public $user;
    public $firstname;
    public $middlename;
    public $lastname;
    public $birthday;
    public $gender;
    public $phone;
    public $address;
    public $site;
    public $organization;

    /* additional info */
    public $client_type;
    public $company_name;
    public $inn;
    public $kpp;
    public $company_address;
    public $signer_name;
    public $bik;
    public $checking_account;
    public $bank_name;
    public $cor_account;
    public $bank_city;
    public $ogrnip;
    public $series;
    public $number;
    public $receive_date;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'middlename', 'lastname', 'phone', 'address', 'site', 'organization'],
                'filter', 'filter' => 'trim'],
            [['firstname', 'middlename', 'lastname', 'phone', 'address', 'site', 'organization'], 'string'],
            [
                ['company_name', 'client_type', 'inn', 'kpp', 'company_address', 'signer_name', 'bik', 'checking_account', 'bank_name',
                    'client_type' ,'cor_account', 'bank_city', 'ogrnip', 'series', 'number', 'receive_date'
                ], 'string', 'max' => 255
            ],
            ['receive_date', function($attribute) {
                if (isset($this->$attribute)) {
                    $this->$attribute = strtotime($this->$attribute);
                }
            }],
            [['site'], 'url'],
            [['gender'], 'in', 'range' => [NULL, UserProfile::GENDER_FEMALE, UserProfile::GENDER_MALE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'firstname' => Yii::t('frontend/models/profile-form', 'Firstname'),
            'middlename' => Yii::t('frontend/models/profile-form', 'Middlename'),
            'lastname' => Yii::t('frontend/models/profile-form', 'Lastname'),
            'birthday' => Yii::t('frontend/models/profile-form', 'Birthday'),
            'gender' => Yii::t('frontend/models/profile-form', 'Gender'),
            'phone' => Yii::t('frontend/models/profile-form', 'Phone'),
            'address' => Yii::t('frontend/models/profile-form', 'Address'),
            'site' => Yii::t('frontend/models/profile-form', 'Site'),
            'organization' => Yii::t('frontend/models/profile-form', 'Organization'),
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function loadProfile($profile)
    {
        foreach (['firstname', 'middlename', 'lastname',
                     'birthday', 'gender', 'phone', 'address', 'site', 'organization'] as $attr) {
            $this->$attr = $profile->$attr;
        }
        $attributes = ['company_name', 'client_type', 'inn', 'kpp', 'company_address',
            'signer_name', 'bik', 'checking_account', 'bank_name', 'cor_account', 'bank_city',
            'ogrnip', 'series', 'number', 'receive_date'];
        foreach($attributes as $attr) {
            $this->$attr = @$profile->user->userAdditionalInfo->$attr;
        }
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        $profile = $this->user->userProfile;
        foreach (['firstname', 'middlename', 'lastname',
             'birthday', 'gender', 'phone', 'address', 'site', 'organization'] as $attr) {
            $profile->$attr = $this->$attr;
        }
        $profile->save(false);
    }
}
