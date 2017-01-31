<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_order`.
 * Has foreign keys to the tables:
 *
 * - `products`
 * - `orders`
 */
class m170131_134013_create_product_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_order', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'order_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->defaultValue(1),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_order-product_id',
            'product_order',
            'product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-product_order-product_id',
            'product_order',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        // creates index for column `order_id`
        $this->createIndex(
            'idx-product_order-order_id',
            'product_order',
            'order_id'
        );

        // add foreign key for table `orders`
        $this->addForeignKey(
            'fk-product_order-order_id',
            'product_order',
            'order_id',
            'orders',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-product_order-product_id',
            'product_order'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_order-product_id',
            'product_order'
        );

        // drops foreign key for table `orders`
        $this->dropForeignKey(
            'fk-product_order-order_id',
            'product_order'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-product_order-order_id',
            'product_order'
        );

        $this->dropTable('product_order');
    }
}
