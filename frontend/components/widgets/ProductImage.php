<?php

namespace frontend\components\widgets;

class ProductImage extends \frontend\components\extensions\Widget
{
    public $product;

    protected function renderParams()
    {
        return [
            'product' => $this->product
        ];
    }
}