<?php

namespace frontend\controllers;

use Yii;

class CartController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function actionView()
    {
        $positions = Yii::$app->cart->positions;
        if (!empty($positions)) {
            return $this->render('view', [
                'products' => $positions
            ]);
        }
        return $this->render('/cart/empty');
    }
}