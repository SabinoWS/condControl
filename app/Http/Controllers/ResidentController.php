<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class ResidentController extends Controller
{

    private $userRepository;

    function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function management(){
        $residents = $this->residentRepository->all();
        return view('resident.management')->with('residents', $residents);
    }

    public function create(){

    }
}
