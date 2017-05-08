<?php

namespace common\commands;

use Yii;
use yii\base\Object;
use trntv\bus\interfaces\SelfHandlingCommand;
use Exception;
use common\models\Order;
use frontend\models\OrderForm;
use common\models\OrderUserInfo;
use common\models\OrderCompanyInfo;
use common\models\OrderRegistrationInfo;
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
     * @var integer
     */
    public $delivery;
    /**
     * @var text
     */
    public $comment;
    /**
     * @var \common\models\User|array
     */
    public $user;
    /**
     * @var array
     */
    public $products;
    /**
     * @var string
     */
    public $clientType;
    /**
     * @var array
     */
    public $company;
    /**
     * @var array
     */
    public $bank;
    /**
     * @var array
     */
    public $registration;

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
                'comment' => $command->comment,
                'delivery' => $command->delivery,
                'client_type' => $command->clientType
            ]);
            if (key_exists('id', $command->user)) {
                $order->user_id = $command->user['id'];
            }
            $order->save();

            // Physical
            $orderUserInfo = new OrderUserInfo([
                'name' => $command->user['name'],
                'phone' => $command->user['phone'],
                'email' => $command->user['email'],
                'address' => $command->user['address']
            ]);
            $orderUserInfo->save();
            $order->link('orderUserInfo', $orderUserInfo);

            if (in_array($command->clientType, [OrderForm::INDIVIDUAL, OrderForm::JURIDICAL])) {
                $orderCompanyInfo = new OrderCompanyInfo([
                    'name' => $command->company['name'],
                    'inn' => $command->company['inn'],
                    'kpp' => $command->company['kpp'],
                    'address' => $command->company['address'],
                    'signer_name' => $command->company['signerName'],
                    'bik' => $command->bank['bik'],
                    'checking_account' => $command->bank['checkingAccount'],
                    'bank_name' => $command->bank['name'],
                    'cor_account' => $command->bank['corAccount'],
                    'bank_city' => $command->bank['city']
                ]);
                $orderCompanyInfo->save();
                $order->link('orderCompanyInfo', $orderCompanyInfo);
            }

            if (in_array($command->clientType, [OrderForm::INDIVIDUAL])) {
                $orderRegistrationInfo = new OrderRegistrationInfo([
                    'ogrnip' => $command->registration['ogrnip'],
                    'series' => $command->registration['series'],
                    'number' => $command->registration['number'],
                    'receive_date' => $command->registration['receiveDate'],
                ]);
                $orderRegistrationInfo->save();
                $order->link('orderRegistrationInfo', $orderRegistrationInfo);
            }

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
