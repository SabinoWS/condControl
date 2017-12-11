<?php

namespace App\Repositories;
use App\Infrastructure\Eloquent\Schedule;
use App\Infrastructure\Eloquent\Condominium;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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

    public function findAllForLocal($localId){
        $search = Schedule::whereHas('local', function($query) use($localId){
            $query->where('local_id', "=", $localId);
        })->orderBy('local_schedules.reservation_date', 'asc');

        $search = $search->where("reservation_date", ">=" ,Carbon::now());

        return $search->get()->all();
    }

    public function find($id){
        $search = $this->scheduleEloquent->where('id', '=', $id);
        return $search->get()->first();
    }

    public function createNewSchedule($attributes){
        $date = Carbon::createFromFormat('d/m/Y', $attributes['reservation_date']);
        $schedule = new Schedule;
        $schedule->user_id = auth()->getUser()->getId();
        $schedule->day = $date->year.$date->month.$date->day;
        $schedule->local_id = $attributes['local_id'];
        $schedule->reservation_date = $date;

        $schedule->save();

        return $schedule;
    }

    public function editSchedule($attributes){
        $schedule = $this->scheduleEloquent->find($attributes['id']);
        $date = Carbon::createFromFormat('d/m/Y', $attributes['reservation_date']);
        $schedule->reservation_date = $date;
        return $schedule->save();
    }

    public function deleteSchedule($id){
        $schedule = $this->scheduleEloquent->find($id);
        return $schedule->delete();
    }
}
