<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use common\commands\CreateOrderCommand;
use yii\helpers\ArrayHelper;
use common\models\Order;

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
     * @var integer
     */
    public $delivery;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $comment;

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
            [['name', 'phone', 'delivery'], 'required'],
            [['name', 'address', 'comment'], 'filter', 'filter' => 'strip_tags'],
            [['name', 'email', 'phone', 'address', 'comment'], 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            [['delivery'], 'in', 'range' => array_keys(Order::deliveries())],
//            [['reCaptcha'], ReCaptchaValidator::className(), 'on' => static::SCENARIO_GUEST],
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
            'comment' => Yii::t('frontend/models/order-form', 'Comment'),
            'delivery' => Yii::t('frontend/models/order-form', 'Delivery'),
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
        $params = ArrayHelper::merge($params, [
            'user' => [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
            ]
        ]);
        return Yii::$app->commandBus->handle(new CreateOrderCommand([
            'total' => $params['total'],
            'user' => $params['user'],
            'comment' => $this->comment,
            'delivery' => $this->delivery,
            'products' => $params['products']
        ]));
    }
}
