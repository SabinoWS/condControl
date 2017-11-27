<?php

namespace App\Repositories;
use App\Infrastructure\Eloquent\News;
use App\Infrastructure\Eloquent\Condominium;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NewsRepository
{
    private $newsEloquent;

    function __construct(News $newsEloquent){
        $this->newsEloquent = $newsEloquent;
    }

    public function all(){
        $search = News::whereHas('condominium', function($query){
            $query->where('condominium_id', "=", auth()->getUser()->getCondominium()->getId());
        });

        return $search->get()->all();
    }

    public function findAllForCondominium($condominiumId){
        $search = News::whereHas('condominium', function($query) use($condominiumId){
            $query->where('condominium_id', "=", $condominiumId);
        });

        return $search->get()->all();
    }

    public function find($id){
        $search = News::whereHas('condominium', function($query){
            $query->where('condominium_id', "=", auth()->getUser()->getCondominium()->getId());
        });
        $search = $search->where('news.id', '=', $id);

        return $search->get()->first();
    }

    public function createNewNews($attributes){
        $news = new News;
        $news->title = $attributes['title'];
        $news->message = $attributes['message'];
        $news->type = $attributes['type'];

        $news->author_id = auth()->getUser()->getId();
        $news->condominium_id = auth()->getUser()->getCondominium()->getId();
        $news->save();
    }

    public function editNews($attributes){
        $news           = $this->newsEloquent->find($attributes['id']);
        $news->title    = $attributes['title'];
        $news->message  = $attributes['message'];
        $news->type     = $attributes['type'];

        return $news->save();
    }

    public function deleteNews($id){
        $news = $this->newsEloquent->find($id);
        return $news->delete();
    }
}
