<?php

namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use frontend\models\OrderForm;
use common\models\Order;

class OrderController extends \yii\web\Controller
{
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->hasOrder($id)) {
            throw new NotFoundHttpException(404);
        }
        return $this->render('view', [
            'model' => Order::findOne(['id' => $id])
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionNew()
    {
        $positions = Yii::$app->cart->positions;
        if (!empty($positions)) {
            $model = new OrderForm();
            return $this->render('new', $this->orderFormParams([
                'model' => $model,
            ]));
        }
        return $this->render('/cart/empty');
    }

    /**
     * @inheritdoc
     */
    public function actionCreate()
    {
        $app = Yii::$app;
        $cart = $app->cart;
        $user = $app->user;
        $model = new OrderForm(['scenario' => OrderForm::SCENARIO_GUEST]);
        if (!$model->load($app->request->post())) {
            throw new BadRequestHttpException();
        }
        $orderCreated = $model->createOrder([
            'total' => $cart->cost,
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
        $orderId = $orderCreated->id;
        $cart->removeAll();
        $user->addOrder($orderId);
        return $this->redirect(['/order/view', 'id' => $orderId]);
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