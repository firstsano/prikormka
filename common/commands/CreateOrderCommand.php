<?php

namespace common\commands;

use Yii;
use yii\base\Object;
use trntv\bus\interfaces\SelfHandlingCommand;
use Exception;
use common\models\Order;
use common\models\User;
use common\models\OrderProduct;

class CreateOrderCommand extends Object implements SelfHandlingCommand
{
    /**
     * @var float
     */
    public $total;
    /**
     * @var integer
     */
    public $status;
    /**
     * @var \common\models\User|array
     */
    public $user;
    /**
     * @var array
     */
    public $products;

    /**
     * @param CreateOrderCommand $command
     * @throws Exception
     * @return bool
     */
    public function handle($command)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $order = new Order([
                'total' => $command->total,
                'status' => $command->status,
            ]);
            $order->setAttributes([
                'user_name' => $command->user['name'],
                'user_email' => $command->user['email'],
                'user_phone' => $command->user['phone'],
                'user_address' => $command->user['address'],
            ]);
            if (key_exists('id', $command->user)) {
                $order->user_id = $command->user['id'];
            }
            $order->save();
            foreach ($this->products as $productArray) {
                $orderProduct = (new OrderProduct())->fromProduct($productArray['product']);
                $orderProduct->quantity = $productArray['quantity'];
                if (!$orderProduct->save()) {
                    throw new Exception('Product validation failed');
                };
                $order->link('orderProducts', $orderProduct);
            }
            $transaction->commit();
            return $order;
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::error($e->getMessage(), 'common.commands');
        }
        return false;
    }
}
