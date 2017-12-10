<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class MailController extends Controller
{

    public function __construct()
    {

    }

    public function mail(Request $request)
    {
        Mail::to('condcontrol@gmail.com')
            ->subject($request->name.": ".$request->subject)
            ->send(new \App\Mail\ContactMail($request->all()));

        return view('home.index');
    }
}
