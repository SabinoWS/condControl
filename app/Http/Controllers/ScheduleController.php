<?php

namespace App\Http\Controllers;

use App\Repositories\LocalRepository;
use App\Repositories\ScheduleRepository;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class ScheduleController extends Controller
{
    private $scheduleRepository;
    private $localRepository;

    public function __construct(
        ScheduleRepository $scheduleRepository,
        LocalRepository $localRepository
    ){
        $this->scheduleRepository = $scheduleRepository;
        $this->localRepository = $localRepository;
    }

    public function chooseLocal(){
        $locals = $this->localRepository->all();
        return view('schedule.locals')->with('locals', $locals);
    }

    public function management($id){
        $local = $this->localRepository->find($id);
        $schedules = $this->scheduleRepository->findAllForLocal($id);
        
        return view('schedule.management', ['local' => $local, 'schedules' => $schedules]);
    }

    public function create(){
        return view('schedule.register');
    }

    public function save(Request $request){
        $this->scheduleRepository->createNewSchedule($request->all());
        return redirect()->route('management-schedule');
    }

    public function edit($id){
        $schedule = $this->scheduleRepository->find($id);
        return view('schedule.edit')->with('schedule', $schedule);
    }

    public function update(Request $request){
        $this->scheduleRepository->editSchedule($request->all());
        return redirect()->route('management-schedule');
    }

    public function delete(Request $request){
        $schedule = $this->scheduleRepository->find($request->id);
        $schedule->delete();
        return redirect()->route('management-schedule');
    }

}
