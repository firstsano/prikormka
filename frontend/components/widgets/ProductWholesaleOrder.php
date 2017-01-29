<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 1/20/17
 * Time: 1:29 AM
 */

namespace frontend\components\widgets;


class ProductWholesaleOrder extends \frontend\components\extensions\Widget
{
    public $product;

    /**
     * @inheritdoc
     */
    protected function renderParams()
    {
        return [
            'product' => $this->product
        ];
    }
}