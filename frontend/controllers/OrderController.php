<?php

namespace frontend\controllers;


class OrderController extends \yii\web\Controller
{
    /**
     * Possible vulnerability: if user sets data through
     * form and then goes directly to this action it can
     * open other user's order. Though hacker must know
     * (user_data + id).
     * @param $id
     */
    public function actionUnsigned($id)
    {

    }
}