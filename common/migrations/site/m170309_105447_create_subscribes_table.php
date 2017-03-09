<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscribes`.
 */
class m170309_105447_create_subscribes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subscribes', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('subscribes');
    }
}
