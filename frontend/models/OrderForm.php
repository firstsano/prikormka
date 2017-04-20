<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\commands\SendEmailCommand;
use common\commands\CreateOrderCommand;
use yii\helpers\ArrayHelper;
use common\models\Order;

class OrderForm extends Model
{
    const SCENARIO_USER = 'user';
    const SCENARIO_GUEST = 'guest';

    /**
     * @var mixed
     */
    public $user;

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
            ['phone', function($attribute) {
                $phone = $this->$attribute;
                $simplePhone = preg_replace('/\D/', '', $phone);
                if (strlen($simplePhone) !== 10) {
                    $this->addError($attribute, Yii::t('common\models\order', 'validation.phone'));
                }
            }],
            [['delivery'], 'in', 'range' => array_keys(Order::deliveries())],
            ['user', 'safe'],
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
        $params = ArrayHelper::merge(
            $params,
            [
                'user' => [
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => $this->address,
                ]
            ],
            isset($this->user) ? [ 'user' => ['id' => $this->user->id] ] : []
        );
        $order = Yii::$app->commandBus->handle(new CreateOrderCommand([
            'total' => $params['total'],
            'user' => $params['user'],
            'comment' => $this->comment,
            'delivery' => $this->delivery,
            'products' => $params['products']
        ]));
        if ($order !== false) {
            $this->sendNotifications();
        }
        return $order;
    }

    /**
     * @inheritdoc
     */
    public function loadUser($user)
    {
        $this->name = @$user->userProfile->fullUserName;
        $this->phone = @$user->userProfile->phone;
        $this->email = $user->email;
        $this->address = @$user->userProfile->address;
    }

    private function sendNotifications()
    {
        $this->notifyAdmin();
        $this->notifyUser();
    }

    private function notifyAdmin()
    {
        Yii::$app->commandBus->handle(new SendEmailCommand([
            'to' => Yii::$app->params['orderEmails'],
            'subject' => Yii::t('frontend/site', 'mail-order.new'),
            'body' => Yii::t('frontend/site', 'mail-order.new'),
        ]));
    }

    private function notifyUser()
    {
        return false;
    }
}
