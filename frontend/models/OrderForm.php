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

    const SCENARIO_PHYSYCAL = 'phys';
    const SCENARIO_JURIDICAL = 'jur';
    const SCENARIO_INDIVIDUAL = 'ip';

    const PHYSYCAL = 'phys';
    const JURIDICAL = 'jur';
    const INDIVIDUAL = 'ip';

    /* System fields */
    public $reCaptcha;
    public $clientType = 'phys';
    public $user;

    /* Contact info */
    public $name;
    public $email;
    public $phone;

    /* Delivery info */
    public $delivery;
    public $address;
    public $comment;

    /* Company info */
    public $companyName;
    public $inn;
    public $kpp;
    public $companyAddress;
    public $signerName;

    /* Bank info */
    public $bik;
    public $checkingAccount;
    public $bankName;
    public $corAccount;
    public $bankCity;

    /* Ragistration info */
    public $ogrnip;
    public $series;
    public $regNumber;
    public $receiveDate;

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_PHYSYCAL] = ['name', 'email', 'phone', 'delivery', 'address', 'comment', 'clientType', 'user'];

        $scenarios[self::SCENARIO_JURIDICAL] = array_merge(
            $scenarios[self::SCENARIO_PHYSYCAL],
            ['companyName', 'inn', 'kpp', 'companyAddress', 'signerName'],
            ['bik', 'checkingAccount', 'bankName', 'corAccount', 'bankCity']
        );

        $scenarios[self::SCENARIO_INDIVIDUAL] = array_merge(
            $scenarios[self::SCENARIO_JURIDICAL],
            ['ogrnip', 'series', 'regNumber', 'receiveDate']
        );

        return $scenarios;
    }

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
//            [['clientType'], 'in', 'range' => array_keys(self::clientTypes())],
            [['clientType', 'user'], 'safe'],
            [
                [
                    'companyName', 'inn', 'kpp', 'companyAddress', 'signerName',
                    'bik', 'checkingAccount', 'bankName', 'corAccount', 'bankCity',
                    'ogrnip', 'series', 'regNumber', 'receiveDate'
                ],
                'required'
            ],
            ['receiveDate', function($attribute) {
                if (isset($this->$attribute)) {
                    $this->$attribute = strtotime($this->$attribute);
                }
            }]
//            [['reCaptcha'], ReCaptchaValidator::className(), 'on' => static::SCENARIO_GUEST],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        $companyInfo = ['companyName', 'inn', 'kpp', 'companyAddress', 'signerName'];
        $bankInfo = ['bik', 'checkingAccount', 'bankName', 'corAccount', 'bankCity'];
        $registrationInfo = ['ogrnip', 'series', 'regNumber', 'receiveDate'];

        $labels = array_merge($companyInfo, $bankInfo, $registrationInfo);
        $translations = [];
        foreach ($labels as &$label) {
            $translations[$label] = Yii::t('frontend/models/order-form', $label);
        }

        return array_merge(
            [
                'name' => Yii::t('frontend/models/order-form', 'Name'),
                'email' => Yii::t('frontend/models/order-form', 'Email'),
                'phone' => Yii::t('frontend/models/order-form', 'Phone'),
                'address' => Yii::t('frontend/models/order-form', 'Address'),
                'comment' => Yii::t('frontend/models/order-form', 'Comment'),
                'delivery' => Yii::t('frontend/models/order-form', 'Delivery'),
                'reCaptcha' => Yii::t('frontend/models/order-form', 'Re Captcha')
            ],
            $translations
        );
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

    public static function clientTypes()
    {
        return [
            self::PHYSYCAL => Yii::t('frontend/models/order-form', 'Physical'),
            self::JURIDICAL => Yii::t('frontend/models/order-form', 'Juridical'),
            self::INDIVIDUAL => Yii::t('frontend/models/order-form', 'Individual'),
        ];
    }

    public function load($data, $formName = null)
    {
        parent::load($data, $formName);
        $this->scenario = $this->clientType;
        return parent::load($data, $formName);
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
        if (in_array($this->clientType, [static::JURIDICAL, static::INDIVIDUAL])) {
            $params = ArrayHelper::merge(
                $params,
                [
                    'company' => [
                        'name' => $this->companyName,
                        'inn' => $this->inn,
                        'kpp' => $this->kpp,
                        'address' => $this->companyAddress,
                        'signerName' => $this->signerName
                    ],
                    'bank' => [
                        'bik' => $this->bik,
                        'checkingAccount' => $this->checkingAccount,
                        'name' => $this->bankName,
                        'corAccount' => $this->corAccount,
                        'city' => $this->bankCity
                    ]
                ]
            );
        }
        if ($this->clientType == static::INDIVIDUAL) {
            $params = ArrayHelper::merge(
                $params,
                [
                    'registration' => [
                        'ogrnip' => $this->ogrnip,
                        'series' => $this->series,
                        'number' => $this->regNumber,
                        'receiveDate' => $this->receiveDate,
                    ],
                ]
            );
        }

        $order = Yii::$app->commandBus->handle(new CreateOrderCommand([
            'total' => $params['total'],
            'clientType' => $this->clientType,
            'user' => $params['user'],
            'company' => @$params['company'],
            'bank' => @$params['bank'],
            'registration' => @$params['registration'],
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
