<?php

use yii\db\Migration;

/**
 * Handles adding user_info to table `orders`.
 */
class m170208_103406_add_user_info_columns_to_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('orders', 'user_name', $this->string());
        $this->addColumn('orders', 'user_email', $this->string());
        $this->addColumn('orders', 'user_phone', $this->string());
        $this->addColumn('orders', 'user_address', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('orders', 'user_address');
        $this->dropColumn('orders', 'user_phone');
        $this->dropColumn('orders', 'user_email');
        $this->dropColumn('orders', 'user_name');
    }
}
