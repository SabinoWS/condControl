<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;

class HomeController extends Controller
{

    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $condominiumId = auth()->getUser()->getCondominium()->getId();
        $news = $this->newsRepository->findAllForCondominium($condominiumId);
        return view('panel')->with('news', $news);
    }
}
