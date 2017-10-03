<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CondominiumController extends Controller
{

    public function management(){
        return view('condominium.management');
    }

    public function create(){
        return view('condominium.register');
    }

    public function save(){
        
    }

}
