<?php

namespace frontend\components\widgets;

use frontend\components\extensions\Html;

class Trinity extends \frontend\components\extensions\Widget
{
    public $main;
    public $top;
    public $bottom;
    public $options;

    public function init()
    {
        parent::init();

        foreach(['main', 'top', 'bottom'] as $key) {
            if (!@$this->options[$key]) {
                $this->options[$key] = [];
            }
        }

        Html::addCssClass($this->options, ['trinity']);
        Html::addCssClass($this->options['main'], ['trinity__main']);
        Html::addCssClass($this->options['top'], ['trinity__top']);
        Html::addCssClass($this->options['bottom'], ['trinity__bottom']);
    }

protected function renderParams()
    {
        return [
            'main' => $this->main,
            'top' => $this->top,
            'bottom' => $this->bottom,
            'options' => $this->options
        ];
    }
}