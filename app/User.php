<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Infrastructure\Eloquent\Condominium;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function roles(){
        return $this->belongsToMany(Role::Class, 'role_user', 'user_id', 'role_id');
    }

    public function condominium(){
        return $this->hasOne(Condominium::Class, 'id', 'condominium_id');
    }

    public function getCondominium(){
        return $this->condominium;
    }
}
