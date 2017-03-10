<?php

namespace frontend\components\widgets;


class RemoteSearch extends \frontend\components\extensions\Widget
{
    public $limit = 20;

    protected function renderParams()
    {
        return [
            'limit' => $this->limit
        ];
    }
}