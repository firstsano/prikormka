<?php

namespace frontend\controllers;

use Yii;
use common\models\Order;
use yii\web\NotFoundHttpException;

class OrderController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            $model = Order::findOne([
                'id' => $id,
                'user_session' => Yii::$app->session->id,
                'user_name' => Yii::$app->user->name,
                'user_email' => Yii::$app->user->email,
            ])
            ;
        }

        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->render('view', [
            'model' => $model
        ]);
    }
}