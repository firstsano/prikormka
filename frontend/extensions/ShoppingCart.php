<?php

namespace frontend\extensions;


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
}