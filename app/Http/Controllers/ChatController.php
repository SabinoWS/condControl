<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\Infrastructure\Eloquent\ChatMessages;

class ChatController extends Controller
{

    private $eloquent;

    public function __construct(ChatMessages $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function index()
    {
        $messages = $this->eloquent::all();
        return view('chat.index')->with('messages', $messages);
    }

    public function send(Request $request)
    {
        if($request->has('message') && $request->message != ""){
            $message = new ChatMessages();

            $message->message = $request->message;
            $message->user_id = auth()->getUser()->getId();
            $message->save();
        }

        return response('ok');
    }

    public function receiveAll(){
        $messages = ChatMessages::limit(10)->orderBy('created_at', 'desc')->get();
        return response($messages);
    }
}
