<?php

namespace frontend\models;

use common\models\Product as BaseProduct;
use yz\shoppingcart\CartPositionInterface;
use \yz\shoppingcart\CartPositionTrait;

class Product extends BaseProduct implements CartPositionInterface
{
    use CartPositionTrait;

    /**
     * CartPositionInterface
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * CartPositionInterface
     */
    public function getId()
    {
        return $this->id;
    }
}