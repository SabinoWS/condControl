<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ResidentRepository;
use App\Http\Requests\CreateUserRequest;

class ResidentController extends Controller
{
    private $residentRepository;

    function __construct(ResidentRepository $residentRepository){
        $this->residentRepository = $residentRepository;
    }

    public function management(){
        $residents = $this->residentRepository->all();
        return view('resident.management')->with('residents', $residents);
    }

    public function create(){
        return view('resident.register');
    }

    public function save(CreateUserRequest $request){
        $this->residentRepository->createNewResident($request->all());
        return redirect()->route('management-resident');
    }

    public function edit($id){
        $resident = $this->residentRepository->find($id);
        return view('resident.edit')->with('user', $resident);
    }

    public function update(Request $request){
        $this->residentRepository->editResident($request->all());
        return redirect()->route('management-resident');
    }

    public function delete(Request $request){
        $resident = $this->residentRepository->find($request->id);
        $resident->delete();
        return redirect()->route('management-resident');
    }
}
