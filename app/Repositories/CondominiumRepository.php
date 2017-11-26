<?php

namespace App\Repositories;
use App\Infrastructure\Eloquent\Condominium;
use App\User;
use App\Models\Role;

class CondominiumRepository
{
    private $condominiumEloquent;
    private $userEloquent;

    function __construct(Condominium $condominiumEloquent, User $userEloquent){
        $this->condominiumEloquent = $condominiumEloquent;
        $this->userEloquent = $userEloquent;
    }

    public function all(){
        return $this->condominiumEloquent->all();
    }

    public function find($id){
        return $this->condominiumEloquent->find($id);
    }

    public function createNewCondominium($attributes){
        $condominium                 = $this->condominiumEloquent->newInstance();
        $condominium->name           = $attributes['name'];
        $condominium->address        = $attributes['address'];
        $condominium->address_number = $attributes['number'];
        $condominium->telephone      = $attributes['telephone'];

        $manager = $this->userEloquent->whereEmail($attributes['manager'])->get()->first();
        $condominium->manager_id     = $manager->id;
        $condominium->save();

        $managerRole = Role::whereName('manager')->get()->first();

        if(!$manager->hasRole($managerRole->name))
            $manager->attachRole($managerRole);
    }

    public function editCondominium($attributes){
        $condominium                 = $this->condominiumEloquent->find($attributes['id']);
        $condominium->name           = $attributes['name'];
        $condominium->address        = $attributes['address'];
        $condominium->address_number = $attributes['number'];
        $condominium->telephone      = $attributes['telephone'];

        $manager = $this->userEloquent->whereEmail($attributes['manager'])->get()->first();
        $condominium->manager_id     = $manager->id;
        $condominium->save();

        $managerRole = Role::whereName('manager')->get()->first();

        if(!$manager->hasRole($managerRole->name))
            $manager->attachRole($managerRole);
    }
}
