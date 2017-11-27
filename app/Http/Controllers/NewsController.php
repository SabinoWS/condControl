<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

class NewsController extends Controller
{
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository){
        $this->newsRepository = $newsRepository;
    }

    public function management(){
        $news = $this->newsRepository->all();
        return view('news.management')->with('news', $news);
    }

    public function create(){
        return view('news.register');
    }

    public function save(Request $request){
        $this->newsRepository->createNewNews($request->all());
        return redirect()->route('management-news');
    }

    public function edit($id){
        $news = $this->newsRepository->find($id);
        return view('news.edit')->with('news', $news);
    }

    public function update(Request $request){
        $this->newsRepository->editNews($request->all());
        return redirect()->route('management-news');
    }

    public function delete(Request $request){
        $news = $this->newsRepository->find($request->id);
        $news->delete();
        return redirect()->route('management-news');
    }

}
