<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170131_133532_create_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'total' => $this->float(2),
            'status' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-orders-user_id',
            'orders',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-orders-user_id',
            'orders',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-orders-user_id',
            'orders'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-orders-user_id',
            'orders'
        );

        $this->dropTable('orders');
    }
}
