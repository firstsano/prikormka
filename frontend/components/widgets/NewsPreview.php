<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.01.17
 * Time: 13:19
 */

namespace frontend\components\widgets;


class NewsPreview extends \frontend\components\extensions\Widget
{
    public $newsItem;
    public $options = [
        'length' => 200,
        'suffix' => '...'
    ];

    protected function renderParams()
    {
        return [
            'newsItem' => $this->newsItem,
            'options' => $this->options
        ];
    }
}