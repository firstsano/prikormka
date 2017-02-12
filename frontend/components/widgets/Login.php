<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 12.02.17
 * Time: 8:17
 */

namespace frontend\components\widgets;


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
        foreach (['isGuest', 'isAdmin', 'username',
             'loginUrl', 'logoutUrl', 'adminUrl', 'cabUrl'] as $attr) {
            $vars[$attr] = $this->$attr;
        }
        return $vars;
    }
}