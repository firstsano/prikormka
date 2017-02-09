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
     * @param CreateSessionOrderCommand $command
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
            if ($command->user instanceof User) {
                $order->user_id = $command->user->id;
            } elseif (is_array($command->user)) {
                $order->setAttributes([
                    'user_session' => $command->user['session'],
                    'user_name' => $command->user['name'],
                    'user_email' => $command->user['email'],
                    'user_phone' => $command->user['phone'],
                    'user_address' => $command->user['address'],
                ]);
            } else {
                throw new Exception('User object or array is required');
            }
            $order->save();
            foreach ($this->products as $productArray) {
                $orderProduct = (new OrderProduct())->fromProduct($productArray['product']);
                $orderProduct->quantity = $productArray['quantity'];
                $orderProduct->save();
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
