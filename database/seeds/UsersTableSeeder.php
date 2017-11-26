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
        $admin->password = Hash::make('admin');
        $admin->save();
        $admin->attachRole(Role::whereName('admin')->first());
        $admin->attachRole(Role::whereName('manager')->first());

        // USER MANAGER 01
        $manager = new User;
        $manager->name = 'sindico01';
        $manager->email = 'sindico01@hotmail.com';
        $manager->password = Hash::make('sindico01');
        $manager->save();
        $manager->attachRole(Role::whereName('manager')->first());

        // Condominium 01
        $condominium                 = new Condominium;
        $condominium->name           = '01 Condominium Administrativo';
        $condominium->address        = 'address';
        $condominium->address_number = '231';
        $condominium->telephone      = '33449232';
        $condominium->manager_id     = '1';
        $condominium->save();

        // Condominium 02
        $condominium                 = new Condominium;
        $condominium->name           = '02 Condominium Teste';
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
        $host->name = 'holder01';
        $host->email = 'holder01@hotmail.com';
        $host->password = Hash::make('holder01');
        $host->condominium_id = '2';
        $host->save();
        $host->attachRole(Role::whereName('holder')->first());

        // USER RESIDENT 01
        $host = new User;
        $host->name = 'resident01';
        $host->email = 'resident01@hotmail.com';
        $host->password = Hash::make('resident01');
        $host->condominium_id = '2';
        $host->save();
        $host->attachRole(Role::whereName('resident')->first());

    }
}
