<?php

namespace App\Infrastructure\Eloquent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\Local;
use App\Infrastructure\Eloquent\Condominium;
use Carbon\Carbon;


class Schedule extends Model
{
     protected $table = 'local_schedules';

      protected $fillable = [
        'user_id',
        'local_id',
        'reservation_date'
    ];

    protected $dates = ['reservation_date'];


    public function local(){ return $this->hasOne(Local::Class, 'id', 'local_id'); }
    public function getLocal(){ return $this->local; }

    public function user(){ return $this->hasOne(User::Class, 'id', 'user_id'); }
    public function getUser(){ return $this->user; }

    public function getId(){
        return $this->id;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function getReservationDate(){
        return $this->reservation_date;
    }

}
