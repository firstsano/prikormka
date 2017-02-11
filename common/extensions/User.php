<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 08.02.17
 * Time: 15:39
 */

namespace common\extensions;

use Yii;

class User extends \yii\web\User
{
    /**
     * @var
     */
    private $_orders;

    /**
     * @inheritdoc
     */
    public function getOrders()
    {
        $orders = $this->getCachedValue('orders');
        if ($orders === false) {
            return [];
        }
        return $orders;
    }

    /**
     * @inheritdoc
     */
    public function setOrders($value)
    {
        $this->setCachedValue('orders', $value);
    }

    /**
     * @inheritdoc
     */
    public function addOrder($orderId)
    {
        $orders = $this->orders;
        if (!in_array($orderId, $orders)) {
            $orders[] = $orderId;
            $this->orders = $orders;
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function hasOrder($orderId)
    {
        return in_array($orderId, $this->orders);
    }

    /**
     * @inheritdoc
     */
    protected function getCachedValue($attribute)
    {
        $value = $this->{"_$attribute"};
        if (isset($value)) {
            return $value;
        }
        $value = Yii::$app->session->get($this->getSessionKey($attribute));
        if (isset($value)) {
            return $value;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    protected function setCachedValue($attribute, $value)
    {
        $this->{"_$attribute"} = $value;
        Yii::$app->session->set($this->getSessionKey($attribute), $value);
    }

    /**
     * @inheritdoc
     */
    protected function getSessionKey($attribute)
    {
        return "user.$attribute";
    }
}