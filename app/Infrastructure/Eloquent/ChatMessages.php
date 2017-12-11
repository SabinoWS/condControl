<?php

namespace App\Infrastructure\Eloquent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\Condominium;


class ChatMessages extends Model
{
     protected $table = 'chat_messages';

      protected $fillable = [
        'message',
    ];

    protected $dates = ['created_at'];

    public function user(){ return $this->hasOne(User::Class, 'id', 'user_id'); }
    public function getUser(){  return $this->user; }

    public function getId(){
        return $this->id;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function toArray(){
        if ((auth()->getUser()->getId() == $this->getUser()->getId()))
            $color =  "#cce0ff";
        else
            $color = "#f0f0f5";

        return [
            'created_at' => $this->created_at->format('Y/m H:i'),
            'userName' => $this->user->getName(),
            'message' => $this->message,
            'color' => $color
        ];
    }

}
