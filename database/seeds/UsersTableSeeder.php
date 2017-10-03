<?php

use Illuminate\Database\Seeder;
use app\User;
use App\Models\Role;
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
        $user = new User;
        $user->name = 'admin';
        $user->email = 'admin@hotmail.com';
        $user->password = Hash::make('admin');
        $user->save();

        $user->attachRole(Role::whereName('admin')->first());
    }
}
