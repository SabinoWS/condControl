<?php

namespace App\Http\Controllers;

use App\Repositories\LocalRepository;
use Illuminate\Http\Request;
use App\Http\Requests\LocalEditRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LocalCreateRequest;

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

    public function save(LocalCreateRequest $request){
        $this->localRepository->createNewLocal($request->all());
        $this->flashMessage($request, "success", "Local cadastrado com sucesso!");
        return redirect()->route('management-local');
    }

    public function edit($id){
        $local = $this->localRepository->find($id);
        return view('local.edit')->with('local', $local);
    }

    public function update(LocalEditRequest $request){
        $this->localRepository->editLocal($request->all());
        $this->flashMessage($request, "success", "Local editado com sucesso!");
        return redirect()->route('management-local');
    }

    public function delete(Request $request){
        $local = $this->localRepository->find($request->id);
        $local->delete();
        return redirect()->route('management-local');
    }

}
