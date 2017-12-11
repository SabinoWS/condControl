<?php

namespace App\Http\Controllers;

use App\Repositories\HolderRepository;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\HolderEditRequest;
use App\Http\Requests\HolderCreateRequest;

class HolderController extends Controller
{
    private $holderRepository;

    public function __construct(HolderRepository $holderRepository){
        $this->holderRepository = $holderRepository;
    }

    public function management(){
        $holders = $this->holderRepository->all();
        return view('holder.management')->with('holders', $holders);
    }

    public function create(){
        return view('holder.register');
    }

    public function save(HolderCreateRequest $request){
        $this->holderRepository->createNewHolder($request->all());
        $this->flashMessage($request, "success", "Proprietário cadastrado com sucesso!");
        return redirect()->route('management-holder');
    }

    public function edit($id){
        $holder = $this->holderRepository->find($id);
        return view('holder.edit')->with('user', $holder);
    }

    public function update(HolderEditRequest $request){
        $this->holderRepository->editHolder($request->all());
        $this->flashMessage($request, "success", "Proprietário editado com sucesso!");
        return redirect()->route('management-holder');
    }

    public function delete(Request $request){
        $holder = $this->holderRepository->find($request->id);
        $holder->delete();
        $this->flashMessage($request, "success", "Proprietário excluído com sucesso!");
        return redirect()->route('management-holder');
    }

}
