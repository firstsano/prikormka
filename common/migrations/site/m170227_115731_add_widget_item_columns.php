<?php

use yii\db\Migration;

class m170227_115731_add_widget_item_columns extends Migration
{
    public function up()
    {
        $this->addColumn('{{%widget_carousel_item}}', 'promo', $this->string());
    }

    public function down()
    {
        $this->dropColumn('{{%widget_carousel_item}}', 'promo');
    }
}
