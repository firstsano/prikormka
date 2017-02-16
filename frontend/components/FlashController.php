<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 16.02.17
 * Time: 20:13
 */

namespace frontend\components;

use Yii;
use frontend\components\widgets\FlashMessages;

class FlashController extends \yii\base\Object
{
    /**
     * @var bool
     */
    private $_wasRun = false;

    public function renderFlash()
    {
        if (!$this->_wasRun) {
            $this->_wasRun = true;
            return FlashMessages::widget([
                'messages' => Yii::$app->session->allFlashes
            ]);
        }
        return '';
    }
}