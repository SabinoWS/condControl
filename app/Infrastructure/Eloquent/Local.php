<?php

namespace App\Infrastructure\Eloquent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\Condominium;


class Local extends Model
{
     protected $table = 'locals';

      protected $fillable = [
        'name',
        'description',
        'capacity',
    ];

    public function condominium(){ return $this->hasOne(Condominium::Class, 'id', 'condominium_id'); }
    public function getCondominium(){ return $this->condominium; }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getCapacity(){
        return $this->capacity;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

}
