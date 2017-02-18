<?php

use yii\db\Migration;

class m170218_155609_change_seasonality_field_of_products_table extends Migration
{
    public function up()
    {
        $this->dropColumn('products', 'seasonality');
        $this->addColumn('products', 'season', $this->integer()->defaultValue(0));
    }

    public function down()
    {
        $this->dropColumn('products', 'season');
        $this->addColumn('products', 'seasonality', $this->string());
    }
}
