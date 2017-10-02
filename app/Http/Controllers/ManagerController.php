<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index(){
        return view('manager.index');
    }

    public function create(){
        return view('manager.register');
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5|same:password_confirmation|unique:users,email',
            'password_confirmation' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->attachRole(Role::whereName('manager')->first());

    }
}
