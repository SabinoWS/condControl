<?php

namespace App\Repositories;
use App\Infrastructure\Eloquent\Local;
use App\Infrastructure\Eloquent\Condominium;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LocalRepository
{
    private $localEloquent;

    function __construct(Local $localEloquent){
        $this->localEloquent = $localEloquent;
    }

    public function all(){
        $search = Local::whereHas('condominium', function($query){
            $query->where('condominium_id', "=", auth()->getUser()->getCondominium()->getId());
        });

        return $search->get()->all();
    }

    public function findAllForCondominium($condominiumId){
        $search = Local::whereHas('condominium', function($query) use($condominiumId){
            $query->where('condominium_id', "=", $condominiumId);
        });

        return $search->get()->all();
    }

    public function find($id){
        $search = Local::whereHas('condominium', function($query){
            $query->where('condominium_id', "=", auth()->getUser()->getCondominium()->getId());
        });
        $search = $search->where('locals.id', '=', $id);

        return $search->get()->first();
    }

    public function createNewLocal($attributes){
        $local = new Local;
        $local->name = $attributes['name'];
        $local->capacity = $attributes['capacity'];
        $local->description = $attributes['description'];

        $local->condominium_id = auth()->getUser()->getCondominium()->getId();

        $local->save();
    }

    public function editLocal($attributes){
        $local           = $this->localEloquent->find($attributes['id']);
        $local->name    = $attributes['name'];
        $local->capacity  = $attributes['capacity'];
        $local->description     = $attributes['description'];

        return $local->save();
    }

    public function deleteLocal($id){
        $local = $this->localEloquent->find($id);
        return $local->delete();
    }
}
