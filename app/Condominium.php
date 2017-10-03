<?php

namespace App;

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

    public function manager(){
        return $this->hasOne('App\User', 'id', 'manager_id');
    }

    public function gerManager(){
        return $this->manager;
    }

}
