<?php

use yii\db\Migration;

class m170212_091107_add_status_to_products_table extends Migration
{
    public function up()
    {
        $this->addColumn('products', 'status', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('products', 'status');
    }
}
