<?php

use yii\db\Schema;
use yii\db\Migration;

class m170501_172726_create_order_registration_info_table extends Migration
{
    public function up()
    {
        $this->createTable('order_registration_info', [
            'id' => $this->primaryKey(),
            'ogrnip' => $this->string(),
            'series' => $this->string(),
            'number' => $this->string(),
            'receive_date' => $this->dateTime(),

            'order_id' => $this->integer(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            'idx-order_registration_info-order_id',
            'order_registration_info',
            'order_id'
        );

        // add foreign key for table `orders`
        $this->addForeignKey(
            'fk-order_registration_info-order_id',
            'order_registration_info',
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
            'fk-order_registration_info-order_id',
            'order_registration_info'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-order_registration_info-order_id',
            'order_registration_info'
        );

        $this->dropTable('order_registration_info');
    }
}
