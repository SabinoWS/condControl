<?php

namespace App\Repositories;
use App\Infrastructure\Eloquent\Condominium;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResidentRepository
{
    private $residentEloquent;

    function __construct(User $residentEloquent){
        $this->residentEloquent = $residentEloquent;
    }

    public function all(){
        $search = User::whereHas('roles', function($query){
            $query->where('role_id', "=", '4');
        });
        return $search->get()->all();
}

    public function find($id){
        $search = User::whereHas('roles', function($query){
            $query->where('role_id', "=", '4');
        });
        $search = $search->where('users.id', '=', $id);

        return $search->get()->first();
    }

    public function createNewResident($attributes){
        $user = new User;
        $user->name = $attributes['name'];
        $user->email = $attributes['email'];
        $user->password = Hash::make($attributes['password']);
        $user->condominium_id = auth()->getUser()->getCondominium()->getId();
        $user->save();
        $user->holders()->sync(auth()->getUser());

        $user->attachRole(Role::whereName('resident')->first());
    }

    public function editResident($attributes){
        $user        = $this->residentEloquent->find($attributes['id']);
        $user->name  = $attributes['name'];
        $user->email = $attributes['email'];

        return $user->save();
    }

    public function updateResident($id){
        $user        = $this->residentEloquent->find($id);
        return $user->delete();
    }
}
