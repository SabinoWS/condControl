<?php

namespace App\Infrastructure;

use Illuminate\Database\Eloquent\Model;
use App\User;

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

    public function manager(){
        return $this->hasOne(Class::User, 'id', 'manager_id');
    }

    public function gerManager(){
        return $this->manager;
    }

}
