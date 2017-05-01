<?php

use yii\db\Schema;
use yii\db\Migration;

class m170501_171502_create_order_user_info_table extends Migration
{
    public function up()
    {
        $this->createTable('order_user_info', [
            'name' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'address' => $this->string(),
            'order_id' => $this->integer(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            'idx-order_user_info-order_id',
            'order_user_info',
            'order_id'
        );

        // add foreign key for table `orders`
        $this->addForeignKey(
            'fk-order_user_info-order_id',
            'order_user_info',
            'order_id',
            'orders',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `orders`
        $this->dropForeignKey(
            'fk-order_user_info-order_id',
            'order_user_info'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-order_user_info-order_id',
            'order_user_info'
        );

        $this->dropTable('order_user_info');
    }
}
