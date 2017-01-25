<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_images`.
 * Has foreign keys to the tables:
 *
 * - `products`
 */
class m170124_083433_create_product_image_table extends Migration
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
        
        $this->createTable('product_images', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer(),
            'order' => $this->integer(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_image-product_id',
            'product_images',
            'product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-product_image-product_id',
            'product_images',
            'product_id',
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
        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-product_image-product_id',
            'product_images'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_image-product_id',
            'product_images'
        );

        $this->dropTable('product_images');
    }
}
