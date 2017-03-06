<?php

namespace frontend\components\widgets;

class ClientComment extends \frontend\components\extensions\Widget
{
    public $feedback;

    protected function renderParams()
    {
        return [
            'feedback' => $this->feedback
        ];
    }
}