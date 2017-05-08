<?php

use yii\db\Schema;
use yii\db\Migration;

class m170508_151306_add_client_type_field_to_orders_table extends Migration
{
    public function up()
    {
        $this->addColumn('orders', 'client_type', $this->string());
    }

    public function down()
    {
        $this->dropColumn('orders', 'client_type');
    }
}
