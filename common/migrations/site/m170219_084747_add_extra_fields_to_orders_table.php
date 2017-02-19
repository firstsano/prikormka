<?php

use yii\db\Migration;

class m170219_084747_add_extra_fields_to_orders_table extends Migration
{
    public function up()
    {
        $this->addColumn('orders', 'comment', $this->text());
        $this->addColumn('orders', 'delivery', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('orders', 'delivery');
        $this->dropColumn('orders', 'comment');
    }
}
