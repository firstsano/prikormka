<?php

use yii\db\Schema;
use yii\db\Migration;

class m170508_170526_create_user_additional_info_table extends Migration
{
    public function up()
    {
        $this->createTable('user_additional_info', [
            'id' => $this->primaryKey(),
            'client_type' => $this->string(),
            'company_name' => $this->string(),
            'inn' => $this->string(),
            'kpp' => $this->string(),
            'company_address' => $this->string(),
            'signer_name' => $this->string(),

            'bik' => $this->string(),
            'checking_account' => $this->string(),
            'bank_name' => $this->string(),
            'cor_account' => $this->string(),
            'bank_city' => $this->string(),

            'ogrnip' => $this->string(),
            'series' => $this->string(),
            'number' => $this->string(),
            'receive_date' => $this->integer(11),

            'user_id' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_additional_info-user_id',
            'user_additional_info',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_additional_info-user_id',
            'user_additional_info',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_additional_info-user_id',
            'user_additional_info'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_additional_info-user_id',
            'user_additional_info'
        );

        $this->dropTable('user_additional_info');
    }
}
