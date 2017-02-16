<?php

namespace frontend\components\widgets;

use Yii;

class Login extends \frontend\components\extensions\Widget
{
    public $isGuest;
    public $isAdmin;
    public $username;

    public $loginUrl;
    public $logoutUrl;
    public $adminUrl;
    public $cabUrl;

    protected function renderParams()
    {
        $vars = [];
        if ($this->isGuest) {
            $this->username = Yii::t('frontend/site', 'Guest');
        }
        foreach (['isGuest', 'isAdmin', 'username',
             'loginUrl', 'logoutUrl', 'adminUrl', 'cabUrl'] as $attr) {
            $vars[$attr] = $this->$attr;
        }
        return $vars;
    }
}