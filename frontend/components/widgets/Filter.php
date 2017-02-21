<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 29.01.17
 * Time: 17:18
 */

namespace frontend\components\widgets;

class Filter extends \frontend\components\extensions\Widget
{
    public $model;
    public $params;

    protected function renderParams()
    {
        return [
            'model' => $this->model,
            'params' => $this->params
        ];
    }
}