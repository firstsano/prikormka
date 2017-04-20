<?php

use yii\db\Schema;
use yii\db\Migration;

class m170420_140035_add_timestamp_attributes_to_orders_table extends Migration
{
    public function up()
    {
        $this->addColumn('orders', 'created_at', $this->integer(11));
        $this->addColumn('orders', 'updated_at', $this->integer(11));
    }

    public function down()
    {
        $this->dropColumn('orders', 'created_at');
        $this->dropColumn('orders', 'updated_at');
    }
}
