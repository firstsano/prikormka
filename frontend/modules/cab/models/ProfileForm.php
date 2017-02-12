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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'middlename', 'lastname', 'phone', 'address', 'site', 'organization'],
                'filter', 'filter' => 'trim'],
            [['firstname', 'middlename', 'lastname', 'phone', 'address', 'site', 'organization'], 'string'],
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
            'organization' => Yii::t('frontend/models/profile-form', 'Organization')
        ];
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
