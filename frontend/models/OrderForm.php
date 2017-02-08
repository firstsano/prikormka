<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use common\models\UserToken;
use common\models\User;
use cheatsheet\Time;
use common\commands\SendEmailCommand;
use yii\helpers\Url;

class OrderForm extends Model
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $phone;
    /**
     * @var
     */
    public $address;
    /**
     * @var
     */
    public $reCaptcha;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['name', 'address'], 'filter', 'filter' => 'strip_tags'],
            [['name', 'email', 'phone', 'address'], 'filter', 'filter' => 'trim'],
            ['email', 'email'],
//            [['reCaptcha'], ReCaptchaValidator::className()],

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('frontend/models/order-form', 'Name'),
            'email' => Yii::t('frontend/models/order-form', 'Email'),
            'phone' => Yii::t('frontend/models/order-form', 'Phone'),
            'address' => Yii::t('frontend/models/order-form', 'Address'),
            'reCaptcha' => Yii::t('frontend/models/order-form', 'Re Captcha')
        ];
    }

    /**
     * Loads user data to session
     */
    public function verifyUser()
    {
        foreach(['name', 'email', 'phone', 'address'] as $attribute) {
            Yii::$app->user->$attribute = $this->$attribute;
        }
        $token = UserToken::create(
            User::getCustomUser()->id,
            UserToken::TYPE_CONFIRMATION,
            Time::SECONDS_IN_A_DAY
        );
        Yii::$app->commandBus->handle(new SendEmailCommand([
            'subject' => Yii::t('frontend/site', 'Confirmation email'),
            'view' => 'confirmation',
            'to' => $this->email,
            'params' => [
                'url' => Url::to(['/cart/verify-order', 'token' => $token->token], true)
            ]
        ]));
        return $token;
    }
}
