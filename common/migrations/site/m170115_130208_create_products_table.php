<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 * Has foreign keys to the tables:
 *
 * - `categories`
 */
class m170115_130208_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string(),
            'description' => $this->text(),
            'price' => $this->float(2),
            'weight' => $this->float(2),
            'pack_quantity' => $this->integer(),
            'min_pack_quantity' => $this->integer(),
            'seasonality' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-products-category_id',
            'products',
            'category_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-products-category_id',
            'products'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-products-category_id',
            'products'
        );

        $this->dropTable('products');
    }
}
