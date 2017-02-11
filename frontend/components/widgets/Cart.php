<?php

namespace frontend\components\widgets;


class Cart extends \frontend\components\extensions\Widget
{
    public $count;
    public $cost;
    public $url;

    protected function renderParams()
    {
        return [
            'count' => $this->count,
            'cost' => $this->cost,
            'url' => $this->url
        ];
    }
}