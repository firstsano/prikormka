<?php

use yii\db\Schema;
use yii\db\Migration;

class m170501_172137_create_order_company_info_table extends Migration
{
    public function up()
    {
        $this->createTable('order_company_info', [
            'name' => $this->string(),
            'inn' => $this->string(),
            'kpp' => $this->string(),
            'address' => $this->string(),
            'signer_name' => $this->string(),

            'bik' => $this->string(),
            'checking_account' => $this->string(),
            'bank_name' => $this->string(),
            'сor_account' => $this->string(),
            'bank_city' => $this->string(),

            'order_id' => $this->integer(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            'idx-order_company_info-order_id',
            'order_company_info',
            'order_id'
        );

        // add foreign key for table `orders`
        $this->addForeignKey(
            'fk-order_company_info-order_id',
            'order_company_info',
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
            'fk-order_company_info-order_id',
            'order_company_info'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-order_company_info-order_id',
            'order_company_info'
        );

        $this->dropTable('order_company_info');
    }
}
