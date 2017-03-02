<?php

namespace frontend\components\widgets;

class FlashMessages extends \frontend\components\extensions\Widget
{
    /**
     * @var array
     */
    public $messages;

    /**
     * @var array
     */
    public $options;

    /**
     * @inheritdoc
     */
    protected function renderParams()
    {
        return [
            'messages' => $this->messages,
            'options' => $this->options
        ];
    }
}