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
    private $_name;

    /**
     * @var
     */
    private $_email;

    /**
     * @var
     */
    private $_phone;

    /**
     * @var
     */
    private $_address;

    /**
     * @inheritdoc
     */
    public function getName() {
        return $this->getCachedValue('name');
    }

    /**
     * @inheritdoc
     */
    public function getEmail() {
        return $this->getCachedValue('email');
    }

    /**
     * @inheritdoc
     */
    public function getPhone() {
        return $this->getCachedValue('phone');
    }

    /**
     * @inheritdoc
     */
    public function getAddress() {
        return $this->getCachedValue('address');
    }

    /**
     * @inheritdoc
     */
    public function setName($value) {
        $this->setCachedValue('name', $value);
    }

    /**
     * @inheritdoc
     */
    public function setEmail($value) {
        $this->setCachedValue('email', $value);
    }

    /**
     * @inheritdoc
     */
    public function setPhone($value) {
        $this->setCachedValue('phone', $value);
    }

    /**
     * @inheritdoc
     */
    public function setAddress($value) {
        $this->setCachedValue('address', $value);
    }

    /**
     * @inheritdoc
     */
    protected function getCachedValue($attribute) {
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
    protected function setCachedValue($attribute, $value) {
        $this->{"_$attribute"} = $value;
        Yii::$app->session->set($this->getSessionKey($attribute), $value);
    }

    /**
     * @inheritdoc
     */
    protected function getSessionKey($attribute) {
        return "user.$attribute";
    }
}