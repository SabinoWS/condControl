<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Requests\MailContactRequest;

class MailController extends Controller
{

    public function __construct()
    {

    }

    public function mail(MailContactRequest $request)
    {
        Mail::to('condcontrol@gmail.com')
            ->send(new \App\Mail\ContactMail($request->all()));

        $this->flashMessage($request, "success", "Email enviado com sucesso! Entraremos em contato o mais breve possível.");

        return view('home.index');
    }
}
