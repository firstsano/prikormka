<?php

namespace frontend\components\widgets;


class QuickSearch extends \frontend\components\extensions\Widget
{
    public $url;

    protected function renderParams()
    {
        return [
            'url' => $this->url
        ];
    }
}