<?php

namespace frontend\components\widgets;


class MinOrderMessage extends \frontend\components\extensions\Widget
{
    /**
     * @var float
     */
    public $required = 0;
    /**
     * @var float
     */
    public $cart = 0;

    protected function renderParams()
    {
        $rest = max($this->required - $this->cart, 0);
        return [
            'required' => $this->required,
            'cart' => $this->cart,
            'rest' => $rest
        ];
    }
}