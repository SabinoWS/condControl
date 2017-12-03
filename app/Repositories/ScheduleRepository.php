<?php

namespace App\Repositories;
use App\Infrastructure\Eloquent\Schedule;
use App\Infrastructure\Eloquent\Condominium;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ScheduleRepository
{
    private $scheduleEloquent;

    function __construct(Schedule $scheduleEloquent){
        $this->scheduleEloquent = $scheduleEloquent;
    }

    public function all(){
        $search = Schedule::whereHas('local', function($query){
            $query->where('condominium_id', "=", auth()->getUser()->getCondominium()->getId());
        });

        return $search->get()->all();
    }

    public function findAllForCondominium($condominiumId){
        $search = Schedule::whereHas('local.condominium', function($query) use($condominiumId){
            $query->where('condominium_id', "=", $condominiumId);
        });

        return $search->get()->all();
    }

    public function find($id){
        $search = Schedule::whereHas('local.condominium', function($query){
            $query->where('condominium_id', "=", auth()->getUser()->getCondominium()->getId());
        });
        $search = $search->where('schedules.id', '=', $id);

        return $search->get()->first();
    }

    public function createNewSchedule($attributes){
        $schedule = new Schedule;
        $schedule->user_id = auth()->getUser()->getId();
        $schedule->local_id = $attributes['local_id'];
        $schedule->reservation_date = $attributes['reservation_date'];

        $schedule->save();
    }

    public function editSchedule($attributes){
        $schedule           = $this->scheduleEloquent->find($attributes['id']);
        $schedule->user_id = auth()->getUser()->getId();
        $schedule->local_id = $attributes['local_id'];
        $schedule->reservation_date = $attributes['reservation_date'];

        return $schedule->save();
    }

    public function deleteSchedule($id){
        $schedule = $this->scheduleEloquent->find($id);
        return $schedule->delete();
    }
}
