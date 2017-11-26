<?php

namespace App\Repositories;
use App\Infrastructure\Eloquent\Condominium;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HolderRepository
{
    private $holderEloquent;

    function __construct(User $holderEloquent){
        $this->holderEloquent = $holderEloquent;
    }

    public function all(){
        $search = User::whereHas('roles', function($query){
            $query->where('role_id', "=", '3');
        });

        return $search->get()->all();
}

    public function find($id){
        $search = User::whereHas('roles', function($query){
            $query->where('role_id', "=", '3');
        });
        $search = $search->where('users.id', '=', $id);

        return $search->get()->first();
    }

    public function createNewHolder($attributes){
        $user = new User;
        $user->name = $attributes['name'];
        $user->email = $attributes['email'];
        $user->password = Hash::make($attributes['password']);
        $user->condominium_id = auth()->getUser()->getCondominium()->getId();
        $user->save();

        $user->attachRole(Role::whereName('holder')->first());
    }

    public function editHolder($attributes){
        $user        = $this->holderEloquent->find($attributes['id']);
        $user->name  = $attributes['name'];
        $user->email = $attributes['email'];

        return $user->save();
    }

    public function updateHolder($id){
        $user        = $this->holderEloquent->find($id);
        return $user->delete();
    }
}
