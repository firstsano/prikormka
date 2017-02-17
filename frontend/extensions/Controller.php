<?php

namespace frontend\extensions;

use yii\web\Controller as BaseController;

class Controller extends BaseController
{
    public function returnBack($default)
    {
        $referrer = Yii::$app->request->referrer;
        $route = empty($referrer) ? $default : $referrer;
        return $this->goBack($route);
    }
}