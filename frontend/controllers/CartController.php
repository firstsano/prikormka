<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;
use common\commands\CreateOrderCommand;
use common\models\UserToken;
use frontend\models\OrderForm;


/**
 * Cart controller
 */
class CartController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionView()
    {
        if (Yii::$app->user->isGuest) {
            $model = new OrderForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $token = $model->verifyUser();
                if (!$token) {
                    Yii::$app->session->setFlash('alert', [
                        'type' => 'warning',
                        'title' => Yii::t('frontend/site', 'order-activate.title'),
                        'message' => Yii::t('frontend/site', 'order-activate-error.message'),
                    ]);
                } else {
                    Yii::$app->session->setFlash('success', [
                        'type' => 'success',
                        'title' => Yii::t('frontend/site', 'order-activate.title'),
                        'message' => Yii::t('frontend/site', 'order-activate-verify.message'),
                    ]);
                }
                return $this->goHome();
            }
        }
        return $this->render('view', [
            'products' => Yii::$app->cart->positions,
            'model' => @$model
        ]);
    }

    /**
     * @param $token
     * @return \yii\web\Response
     */
    public function actionVerifyOrder($token)
    {
        $token = UserToken::find()
            ->byType(UserToken::TYPE_CONFIRMATION)
            ->byToken($token)
            ->notExpired()
            ->one();

        if (!$token) {
            throw new BadRequestHttpException;
        }

        $token->delete();

        $products = [];
        foreach (Yii::$app->cart->positions as $position) {
            $products[] = [
                'product' => $position,
                'quantity' => $position->quantity
            ];
        }
        $orderCreated = Yii::$app->commandBus->handle(new CreateOrderCommand([
            'total' => 0,
            'user' => [
                'session' => Yii::$app->session->id,
                'name' => Yii::$app->user->name,
                'email' => Yii::$app->user->email,
                'phone' => Yii::$app->user->phone,
                'address' => Yii::$app->user->address,
            ],
            'products' => $products
        ]));
        if ($orderCreated === false) {
            Yii::$app->session->setFlash('alert', [
                'type' => 'warning',
                'title' => Yii::t('frontend/site', 'order-activate.title'),
                'message' => Yii::t('frontend/site', 'order-activate-error.message'),
            ]);
            return $this->goHome();
        }

        Yii::$app->cart->removeAll();
        return $this->redirect([
            '/order/view',
            'id' => $orderCreated->id
        ]);
    }
}
