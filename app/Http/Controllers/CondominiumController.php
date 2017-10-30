<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCondominiumRequest;
use App\Repositories\CondominiumRepository;

class CondominiumController extends Controller
{

    private $condominiumRepository;

    public function __construct(CondominiumRepository $condominiumRepository){
        $this->condominiumRepository = $condominiumRepository;
    }

    public function management(){
        $condominiums = $this->condominiumRepository->all();
        return view('condominium.management')->with('condominiums', $condominiums);
    }

    public function create(){
        return view('condominium.register');
    }

    public function save(CreateCondominiumRequest $request){
        $this->condominiumRepository->createNewCondominium($request->all());
        return redirect()->route('management-condominium');
    }

}
