<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 18.01.17
 * Time: 21:12
 */

namespace frontend\components\widgets;


class ProductQuickOrder extends \frontend\components\extensions\Widget
{
    public $product;

    protected function renderParams()
    {
        return [
            'product' => $this->product
        ];
    }
}