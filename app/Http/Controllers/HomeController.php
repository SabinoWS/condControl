<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user->hasRole('admin'))
            return view('administrator.panel');
        if($user->hasRole('manager'))
            return view('manager.panel');
        if($user->hasRole('host'))
            return view('host.panel');
        if($user->hasRole('resident'))
            return view('resident.panel');
    }
}
