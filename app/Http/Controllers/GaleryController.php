<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\Infrastructure\Eloquent\Photo;

class GaleryController extends Controller
{

    private $eloquent;

    public function __construct(Photo $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function index()
    {
        $photos = $this->eloquent::orderBy('created_at', 'desc')->get();
        return view('galery.index')->with('photos', $photos);
    }

    public function send(Request $request)
    {
        if($request->has('photo') && $request->photo != "")
        {

        $file = $request->file('photo');
        $stored = $file->store('images', 'public');
        // $file->storePubliclyAs('upload', $name, 'public');
        $photo = new Photo;
        $photo->name = $stored;
        $photo->message = "Foto";
        $photo->author_id = auth()->getUser()->getId();
        $photo->condominium_id = auth()->getUser()->getCondominium()->getId();
        $photo->save();

        $this->flashMessage($request, "success", "Foto enviada com sucesso!");
    }
    else{
        $this->flashMessage($request, "danger", "Escolha uma foto.");
    }

        return redirect()->route('galery-board');
    }

    public function receiveAll(){

    }
}
