<?php

namespace frontend\modules\cab\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use frontend\models\OrderForm;
use common\models\Order;
use yii\filters\AccessControl;

class OrderController extends Controller
{
    /**
     * @var string
     */
    public $defaultAction = 'new';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'orders' => Order::findAll(['user_id' => Yii::$app->user->identity->id])
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionView($id)
    {
        $order = Order::findOne([
            'user_id' => Yii::$app->user->identity,
            'id' => $id
        ]);
        if (!$order) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'model' => $order
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionNew()
    {
        $model = new OrderForm();
        $user = Yii::$app->user->identity;
        $model->setAttributes([
            'name' => $user->publicIdentity,
            'phone' => $user->userProfile->phone,
            'address' => $user->userProfile->address,
            'email' => $user->email
        ]);
        return $this->render('new', $this->orderFormParams([
            'model' => $model,
        ]));
    }

    /**
     * @inheritdoc
     */
    public function actionCreate()
    {
        $app = Yii::$app;
        $cart = $app->cart;
        $model = new OrderForm();
        if (!$model->load($app->request->post())) {
            throw new BadRequestHttpException();
        }
        $orderCreated = $model->createOrder([
            'total' => $cart->cost,
            'user' => ['id' => $app->user->identity->id],
            'products' => $cart->positionsWithQuantities
        ]);
        if ($orderCreated === false) {
            $app->session->setFlash('alert', [
                'type' => 'warning',
                'title' => Yii::t('frontend/site', 'order-activate.title'),
                'message' => Yii::t('frontend/site', 'order-activate-error.message'),
            ]);
            return $this->render('new', $this->orderFormParams([
                'model' => $model,
            ]));
        }
        $cart->removeAll();
        return $this->redirect(['order/view', 'id' => $orderCreated->id]);
    }

    /**
     * @inheritdoc
     */
    protected function orderFormParams($params = [])
    {
        return ArrayHelper::merge([
            'products' => Yii::$app->cart->positions,
        ], $params);
    }
}