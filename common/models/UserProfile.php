<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;
use common\models\queries\UserProfileQuery;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property integer $locale
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $phone
 * @property string $site
 * @property string $organization
 * @property string $birthday
 * @property string $address
 * @property string $picture
 * @property string $avatar
 * @property string $avatar_path
 * @property string $avatar_base_url
 * @property integer $gender
 * @property string $type
 * @property string $type_data
 *
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /**
     * @var
     */
    public $picture;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    /**
     * Hook for setting type for children
     */
    protected static function type() {
        if (defined('static::TYPE')) {
            return static::TYPE;
        }
        return null;
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'picture' => [
                'class' => UploadBehavior::className(),
                'attribute' => 'picture',
                'pathAttribute' => 'avatar_path',
                'baseUrlAttribute' => 'avatar_base_url'
            ]
        ];
    }

    public static function instantiate($row)
    {
        switch ($row['type']) {
            case UserProfileIP::type():
                return new UserProfileIP();
            case UserProfileJur::type():
                return new UserProfileJur();
            case UserProfilePhys::type():
                return new UserProfilePhys();
            default:
                return new self;
        }
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->type = self::type();
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->type = self::type();
        return parent::beforeSave($insert);
    }

    /**
     * @return UserProfileQuery
     */
    public static function find()
    {
        return new UserProfileQuery(get_called_class(), [
            'type' => static::type(),
            'tableName' => self::tableName()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gender'], 'integer'],
            [['gender'], 'in', 'range' => [NULL, self::GENDER_FEMALE, self::GENDER_MALE]],
            [['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url'], 'string', 'max' => 255],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
            ['picture', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common', 'User ID'),
            'firstname' => Yii::t('common', 'Firstname'),
            'middlename' => Yii::t('common', 'Middlename'),
            'lastname' => Yii::t('common', 'Lastname'),
            'locale' => Yii::t('common', 'Locale'),
            'picture' => Yii::t('common', 'Picture'),
            'gender' => Yii::t('common', 'Gender'),
            'address' => Yii::t('common', 'Address'),
            'organization' => Yii::t('common', 'Organization'),
            'site' => Yii::t('common', 'Site'),
            'phone' => Yii::t('common', 'Phone'),
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
     * @return null|string
     */
    public function getFullName()
    {
        if ($this->firstname || $this->lastname) {
            return implode(' ', [$this->firstname, $this->lastname]);
        }
        return null;
    }

    public function getFullUserName()
    {
        return implode(' ', array_filter([
            $this->firstname,
            $this->middlename,
            $this->lastname
        ]));
    }

    /**
     * @param null $default
     * @return bool|null|string
     */
    public function getAvatar($default = null)
    {
        return $this->avatar_path
            ? Yii::getAlias($this->avatar_base_url . '/' . $this->avatar_path)
            : $default;
    }
}
