<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\User;
use App\Infrastructure\Eloquent\Condominium;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ADMIN
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'admin@hotmail.com';
        $admin->password = Hash::make('123321');
        $admin->save();
        $admin->attachRole(Role::whereName('admin')->first());

        // USER MANAGER 01
        $manager = new User;
        $manager->name = 'sindico';
        $manager->email = 'sindico@hotmail.com';
        $manager->password = Hash::make('123321');
        $manager->save();
        $manager->attachRole(Role::whereName('manager')->first());

        // Condominium 01
        $condominium                 = new Condominium;
        $condominium->name           = 'CondControl Administração';
        $condominium->address        = 'address';
        $condominium->address_number = '231';
        $condominium->telephone      = '33449232';
        $condominium->manager_id     = '1';
        $condominium->save();

        // Condominium 02
        $condominium                 = new Condominium;
        $condominium->name           = 'AAA Condominium';
        $condominium->address        = 'address';
        $condominium->address_number = '231';
        $condominium->telephone      = '33449232';
        $condominium->manager_id     = '2';
        $condominium->save();

        $admin->condominium_id = '1';
        $admin->save();
        $manager->condominium_id = '2';
        $manager->save();

        // USER HOST 01
        $host = new User;
        $host->name = 'Proprietario';
        $host->email = 'proprietario@hotmail.com';
        $host->password = Hash::make('123321');
        $host->condominium_id = '2';
        $host->save();
        $host->attachRole(Role::whereName('holder')->first());

        // USER RESIDENT 01
        $host = new User;
        $host->name = 'Morador';
        $host->email = 'morador@hotmail.com';
        $host->password = Hash::make('123321');
        $host->condominium_id = '2';
        $host->save();
        $host->attachRole(Role::whereName('resident')->first());
    }
}
