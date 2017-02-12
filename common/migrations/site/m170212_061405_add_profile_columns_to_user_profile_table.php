<?php

use yii\db\Migration;

/**
 * Handles adding profile to table `user_profile`.
 */
class m170212_061405_add_profile_columns_to_user_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%user_profile}}', 'site', $this->string());
        $this->addColumn('{{%user_profile}}', 'organization', $this->string());
        $this->addColumn('{{%user_profile}}', 'address', $this->string());
        $this->addColumn('{{%user_profile}}', 'phone', $this->string());
        $this->addColumn('{{%user_profile}}', 'birthday', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%user_profile}}', 'birthday');
        $this->dropColumn('{{%user_profile}}', 'phone');
        $this->dropColumn('{{%user_profile}}', 'address');
        $this->dropColumn('{{%user_profile}}', 'organization');
        $this->dropColumn('{{%user_profile}}', 'site');
    }
}
