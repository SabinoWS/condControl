<?php

namespace App\Infrastructure\Eloquent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\Condominium;


class News extends Model
{
     protected $table = 'news';

      protected $fillable = [
        'title',
        'message',
        'type',
    ];

    public function author(){ return $this->hasOne(User::Class, 'id', 'author_id'); }
    public function getAuthor(){  return $this->author; }

    public function condominium(){ return $this->hasOne(Condominium::Class, 'id', 'condominium_id'); }
    public function getCondominium(){ return $this->condominium; }

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getType(){
        return $this->type;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

}
