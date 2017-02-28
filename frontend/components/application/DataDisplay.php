<?php

namespace frontend\components\application;

use Yii;
use Exception;
use frontend\components\extensions\ArrayHelper;

class DataDisplay extends \yii\base\Object
{
    private $_currentRoute;

    public function route($route)
    {
        $this->_currentRoute = $route;
        return $this;
    }

    public function loadData($config)
    {
        if (!@$config['route']) {
            return false;
        }
        $this->route($config['route']);
        foreach (['order', 'perPage'] as $a) {
            $this->$a = @$config[$a];
        }
    }

    public function setPerPage($perPage)
    {
        if (!$perPage) {
            return false;
        }
        $this->setData(['perPage' => $perPage]);
    }

    public function setOrder($order)
    {
        if (!$order) {
            return false;
        }
        $this->setData(['order' => $order]);
    }

    public function getPerPage()
    {
        return $this->getData('perPage');
    }

    public function getOrder()
    {
        return $this->getData('order');
    }

    private function setData($value)
    {
        $session = Yii::$app->session;
        $data = $session->get($this->currentKey(), []);
        $session->set($this->currentKey(), ArrayHelper::merge($data, $value));
    }

    private function getData($key)
    {
        $dataDisplay = Yii::$app->session->get($this->currentKey(), []);
        return @$dataDisplay[$key];
    }

    private function currentKey()
    {
        if (!$this->_currentRoute) {
            throw new Exception('No current route for DataDisplay component');
        }
        return 'dataDisplay.' . $this->_currentRoute;
    }
}