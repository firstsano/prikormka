<?php

namespace frontend\extensions;

use Yii;
use yii\helpers\ArrayHelper;

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

    /**
     * Add only with respect to min pack quantity
     */
    public function put($position, $quantity = 1)
    {
        $currentQuantity = 0;
        if (isset($this->_positions[$position->getId()])) {
            $currentQuantity = $this->_positions[$position->getId()]->getQuantity();
        }
        $currentQuantity += $quantity;
        $minQuantity = ArrayHelper::getValue($position, 'min_pack_quantity');
        if (isset($minQuantity) && ($minQuantity > $currentQuantity)) {
            return;
        }
        parent::put($position, $quantity);
    }

    /**
     * Update only with respect to min pack quantity
     */
    public function update($position, $quantity)
    {
        $minQuantity = ArrayHelper::getValue($position, 'min_pack_quantity');
        if (isset($minQuantity) && ($minQuantity > $quantity)) {
            return;
        }
        parent::update($position, $quantity);
    }
}