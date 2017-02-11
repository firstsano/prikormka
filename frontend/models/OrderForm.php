<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use common\commands\CreateOrderCommand;

class OrderForm extends Model
{
    const SCENARIO_USER = 'user';
    const SCENARIO_GUEST = 'guest';

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
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
            [['name', 'phone'], 'required', 'on' => static::SCENARIO_GUEST],
            [['name', 'address'], 'filter', 'filter' => 'strip_tags', 'on' => static::SCENARIO_GUEST],
            [['name', 'email', 'phone', 'address'], 'filter', 'filter' => 'trim', 'on' => static::SCENARIO_GUEST],
            ['email', 'email', 'on' => static::SCENARIO_GUEST],
            [['reCaptcha'], ReCaptchaValidator::className(), 'on' => static::SCENARIO_GUEST],
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
     * Returns user scenarios list
     * @return array|mixed
     */
    public static function orderScenarios()
    {
        return [
            self::SCENARIO_USER => Yii::t('common/models/order-form', 'User'),
            self::SCENARIO_GUEST => Yii::t('common/models/order-form', 'Guest'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function createOrder($params = [])
    {
        if (!$this->validate()) {
            return false;
        }
        if ($this->scenario === static::SCENARIO_GUEST) {
            $params['user'] = [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
            ];
        }
        return Yii::$app->commandBus->handle(new CreateOrderCommand([
            'total' => $params['total'],
            'user' => $params['user'],
            'products' => $params['products']
        ]));
    }
}
