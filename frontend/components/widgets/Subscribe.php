<?php

namespace frontend\components\widgets;

use Yii;
use frontend\models\SubscribeForm;

class Subscribe extends \frontend\components\extensions\Widget
{
    public $model;

    protected function renderParams()
    {
        $model = $this->model;
        if (!isset($model)) {
            $model = new SubscribeForm();
        }

        return [
            'model' => $model
        ];
    }
}