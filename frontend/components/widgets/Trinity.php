<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 18.01.17
 * Time: 21:27
 */

namespace frontend\components\widgets;


class Trinity extends \frontend\components\extensions\Widget
{
    public $main;
    public $top;
    public $bottom;
    public $options;

    protected function renderParams()
    {
        return [
            'main' => $this->main,
            'top' => $this->top,
            'bottom' => $this->bottom,
            'class' => @$this->options['class']
        ];
    }
}