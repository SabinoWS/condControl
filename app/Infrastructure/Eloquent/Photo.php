<?php

namespace App\Infrastructure\Eloquent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\Condominium;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{

    use SoftDeletes;

     protected $table = 'photos';

      protected $fillable = [
        'name',
        'message',
    ];

    protected $dates = ['created_at'];

    public function author(){ return $this->hasOne(User::Class, 'id', 'author_id'); }
    public function getAuthor(){  return $this->author; }

    public function condominium(){ return $this->hasOne(Condominium::Class, 'id', 'condominium_id'); }
    public function getCondominium(){ return $this->condominium; }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

}
