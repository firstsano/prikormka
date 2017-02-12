<?php

namespace frontend\modules\cab;

class Module extends \yii\base\Module
{
    /**
     * @var string
     */
    public $controllerNamespace = 'frontend\modules\cab\controllers';

    /**
     * @var string
     */
    public $defaultRoute = '/profile';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
