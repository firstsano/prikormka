<?php

namespace frontend\extensions;

use Yii;

class ShoppingCart extends \yz\shoppingcart\ShoppingCart
{
    /**
     * @return array
     */
    public function getPositionsWithQuantities() {
        $output = [];
        foreach ($this->positions as $position) {
            $output[] = [
                'product' => $position,
                'quantity' => $position->quantity
            ];
        }
        return $output;
    }

    /**
     * @return bool
     */
    public function getCanBeOrdered()
    {
        return ($this->cost > Yii::$app->params['minOrder']);
    }
}