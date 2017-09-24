<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Role;
use App\Models\Permission;

class CreateAdminPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminAreas = new Permission();
        $adminAreas->name         = 'admin-area';
        $adminAreas->display_name = 'Possible to enter admin areas';
        $adminAreas->description  = 'Possível entrar em áreas de administradores';
        $adminAreas->save();

        $createManager = new Permission();
        $createManager->name         = 'create-manager';
        $createManager->display_name = 'Create Manager User Permission';
        $createManager->description  = 'Cria usuários administradores';
        $createManager->save();

        $admin = Role::whereName('admin')->first();
        $admin->attachPermission(array(
                                        $createManager,
                                        $adminAreas
                                  ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Permission::whereName('admin-area')->delete();
        Permission::whereName('create-manager')->delete();
    }
}
