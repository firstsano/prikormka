<?php

use yii\db\Schema;
use common\rbac\Migration;
use common\models\User;

class m170421_180618_create_order_manager_role extends Migration
{
    public function up()
    {
        $ordersManagerRole = $this->auth->createRole(User::ROLE_ORDERS_MANAGER);
        $this->auth->add($ordersManagerRole);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getRole(User::ROLE_ORDERS_MANAGER));
    }
}