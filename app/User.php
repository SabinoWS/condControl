<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Infrastructure\Eloquent\Condominium;
use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $softCascade = ['residents'];

    use Notifiable;
    use SoftDeletes;
    use EntrustUserTrait {
        EntrustUserTrait::restore insteadof SoftDeletes;
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function condominium(){ return $this->hasOne(Condominium::Class, 'id', 'condominium_id'); }
    public function getCondominium(){ return $this->condominium; }

    public function roles(){ return $this->belongsToMany(Role::Class, 'role_user', 'user_id', 'role_id'); }

    public function residents(){ return $this->belongsToMany(User::Class, 'resident_holder', 'holder_id', 'resident_id'); }
    public function getResidents(){ return $this->residents; }

    public function holders(){ return $this->belongsToMany(User::Class, 'resident_holder', 'resident_id', 'holder_id'); }
    public function getHolders(){ return $this->holders->first(); }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

}
