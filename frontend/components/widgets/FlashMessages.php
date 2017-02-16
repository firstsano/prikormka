<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 16.02.17
 * Time: 20:02
 */

namespace frontend\components\widgets;


class FlashMessages extends \frontend\components\extensions\Widget
{
    /**
     * @var array
     */
    public $messages;

    /**
     * @inheritdoc
     */
    protected function renderParams()
    {
        return [
            'messages' => $this->messages
        ];
    }
}