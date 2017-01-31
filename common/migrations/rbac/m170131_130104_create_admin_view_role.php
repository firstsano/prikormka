<?php

use common\rbac\Migration;
use common\models\User;

class m170131_130104_create_admin_view_role extends Migration
{
    public function up()
    {
        $adminRole = $this->auth->getRole(User::ROLE_ADMINISTRATOR);

        $viewAdminPanel = $this->auth->createPermission('viewAdminPanel');
        $this->auth->add($viewAdminPanel);
        $this->auth->addChild($adminRole, $viewAdminPanel);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getPermission('viewAdminPanel'));
    }
}
