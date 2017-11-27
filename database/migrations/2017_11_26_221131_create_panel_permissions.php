<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Role;
use App\Models\Permission;

class CreatePanelPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $managerAreas = new Permission();
        $managerAreas->name         = 'manager-area';
        $managerAreas->display_name = 'Possible to enter manager areas';
        $managerAreas->description  = 'Possível entrar em áreas de síndicos';
        $managerAreas->save();

        $holderAreas = new Permission();
        $holderAreas->name         = 'holder-area';
        $holderAreas->display_name = 'Possible to enter holder areas';
        $holderAreas->description  = 'Possível entrar em áreas de proprietários';
        $holderAreas->save();

        $residentAreas = new Permission();
        $residentAreas->name         = 'resident-area';
        $residentAreas->display_name = 'Possible to enter resident areas';
        $residentAreas->description  = 'Possível entrar em áreas de moradores';
        $residentAreas->save();

        $admin = Role::whereName('manager')->first();
        $admin->attachPermission(array($managerAreas, $residentAreas));

        $admin = Role::whereName('holder')->first();
        $admin->attachPermission(array($holderAreas, $residentAreas));

        $admin = Role::whereName('resident')->first();
        $admin->attachPermission(array($residentAreas));
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
