<?php

namespace App\Infrastructure\Eloquent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Infrastructure\Eloquent\Local;

class Condominium extends Model
{
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


    protected $softCascade = ['users'];

    use SoftDeletes;
    protected $table = 'condominiums';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'name',
    'address',
    'address_number',
    'telephone',
    'manager_id '
    ];

    public function manager(){ return $this->hasOne(User::Class, 'id', 'manager_id'); }

    public function users(){ return $this->hasMany(User::Class, 'condominium_id', 'id'); }
    public function getUsers(){ return $this->users; }

    public function locals(){ return $this->hasMany(Local::Class, 'condominium_id', 'id'); }
    public function getLocals(){ return $this->locals; }

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
