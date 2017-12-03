<?php

namespace App\Http\Controllers;

use App\Repositories\LocalRepository;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class LocalController extends Controller
{
    private $localRepository;

    public function __construct(LocalRepository $localRepository){
        $this->localRepository = $localRepository;
    }

    public function management(){
        $locals = $this->localRepository->all();
        return view('local.management')->with('locals', $locals);
    }

    public function create(){
        return view('local.register');
    }

    public function save(Request $request){
        $this->localRepository->createNewLocal($request->all());
        return redirect()->route('management-local');
    }

    public function edit($id){
        $local = $this->localRepository->find($id);
        return view('local.edit')->with('local', $local);
    }

    public function update(Request $request){
        $this->localRepository->editLocal($request->all());
        return redirect()->route('management-local');
    }

    public function delete(Request $request){
        $local = $this->localRepository->find($request->id);
        $local->delete();
        return redirect()->route('management-local');
    }

}
