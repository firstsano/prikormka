<?php

use yii\db\Schema;
use yii\db\Migration;

class m170501_144010_add_type_and_type_profile_data_to_user_profile_table extends Migration
{
    public function up()
    {
        $this->addColumn('user_profile', 'type', $this->string());
        $this->addColumn('user_profile', 'type_data', $this->text());
    }

    public function down()
    {
        $this->dropColumn('user_profile', 'type');
        $this->dropColumn('user_profile', 'type_data');
    }
}
