<?php

namespace App\Infrastructure\Eloquent;
use App\User;
use Illuminate\Database\Eloquent\Model;


class Condominium extends Model
{
     protected $table = 'condominiums';

      protected $fillable = [
        'name',
        'address',
        'address_number',
        'telephone',
        'manager_id '
    ];

    public function manager(){ return $this->hasOne(User::Class, 'id', 'manager_id'); }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getAddressNumber(){
        return $this->address_number;
    }

    public function getTelephone(){
        return $this->telephone;
    }

    public function getManager(){
        return $this->manager;
    }

}
