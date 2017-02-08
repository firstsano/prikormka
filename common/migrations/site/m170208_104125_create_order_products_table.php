<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_products`.
 * Has foreign keys to the tables:
 *
 * - `orders`
 * - `products`
 */
class m170208_104125_create_order_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_products', [
            'id' => $this->primaryKey(),
            'category' => $this->string(),
            'name' => $this->string(),
            'description' => $this->string(),
            'price' => $this->float(2),
            'weight' => $this->float(2),
            'pack_quantity' => $this->integer(),
            'quantity' => $this->integer()->defaultValue(1),
            'order_id' => $this->integer(),
            'source_product_id' => $this->integer(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            'idx-order_products-order_id',
            'order_products',
            'order_id'
        );

        // add foreign key for table `orders`
        $this->addForeignKey(
            'fk-order_products-order_id',
            'order_products',
            'order_id',
            'orders',
            'id',
            'CASCADE'
        );

        // creates index for column `source_product_id`
        $this->createIndex(
            'idx-order_products-source_product_id',
            'order_products',
            'source_product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-order_products-source_product_id',
            'order_products',
            'source_product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `orders`
        $this->dropForeignKey(
            'fk-order_products-order_id',
            'order_products'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-order_products-order_id',
            'order_products'
        );

        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-order_products-source_product_id',
            'order_products'
        );

        // drops index for column `source_product_id`
        $this->dropIndex(
            'idx-order_products-source_product_id',
            'order_products'
        );

        $this->dropTable('order_products');
    }
}
