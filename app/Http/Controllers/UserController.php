<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use app\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('manager.panel');
    }

    public function create(){
        return view('manager.register');
    }

    public function save(CreateUserRequest $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->attachRole(Role::whereName('manager')->first());

        return redirect()->route('home');
    }
}
