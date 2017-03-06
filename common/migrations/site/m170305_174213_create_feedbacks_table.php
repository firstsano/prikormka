<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedbacks`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170305_174213_create_feedbacks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('feedbacks', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'thumbnail_path' => $this->string(1024),
            'thumbnail_base_url' => $this->string(1024),
            'body' => $this->text(),
            'user_name' => $this->string(),
            'user_prof' => $this->string(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-feedbacks-user_id',
            'feedbacks',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-feedbacks-user_id',
            'feedbacks',
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
            'fk-feedbacks-user_id',
            'feedbacks'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-feedbacks-user_id',
            'feedbacks'
        );

        $this->dropTable('feedbacks');
    }
}
