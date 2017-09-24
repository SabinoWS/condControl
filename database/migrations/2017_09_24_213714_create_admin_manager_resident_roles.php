<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Role;

class CreateAdminManagerResidentRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Terá permissões totais ao sistema e criação de outros usuários abaixo
        $adminRole = new Role();
        $adminRole->name         = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->description  = 'Administrador do Sistema';
        $adminRole->save();

        // Terá permissões do condomínio e criação de usuários abaixo
        $propertyManagerRole = new Role();
        $propertyManagerRole->name         = 'propertyManager';
        $propertyManagerRole->display_name = 'Property Manager';
        $propertyManagerRole->description  = 'Síndico do condomínio';
        $propertyManagerRole->save();

        // Titular responsável do apartamento e criação de usuários abaixo
        $residentRole = new Role();
        $residentRole->name         = 'holder';
        $residentRole->display_name = 'Holder';
        $residentRole->description  = 'Responsável legal pela residência';
        $residentRole->save();

        // Morador
        $residentRole = new Role();
        $residentRole->name         = 'resident';
        $residentRole->display_name = 'Resident';
        $residentRole->description  = 'Residente';
        $residentRole->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $role = Role::whereName('admin')->first()->delete();
        $role = Role::whereName('propertyManager')->first()->delete();
        $role = Role::whereName('holder')->first()->delete();
        $role = Role::whereName('resident')->first()->delete();
    }
}
