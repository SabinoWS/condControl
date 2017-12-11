@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default main-panel">
                <div class="panel-heading">
                    CHAT
                </div>
                <div class="panel panel-body">

                    <div class="col-md-10">
                        <input id="message" type="text" class=" form-control" name="message" value="{{ old('message') }}" autofocus>
                    </div>
                    <div>
                        <button id="sendMessage" type="button" class="main-panel-button btn btn-default">Enviar</button>
                    </div>

                    <br />
                    <div class="col-md-12">
                        <div id="chat_messages">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script>

    getMessages();

    setInterval(function() {
        getMessages();
    }, 5000)

    function buildChat(messages){
        $('#chat_messages').html("");
        messages.forEach(function(message){
            $('#chat_messages').append(
                `
                <div>
                    <small class="chat-date">
                    `+ message.created_at + `
                    </small>
                    <strong class="chat-sender">
                        `+ message.userName + `:
                    </strong>
                    <span class="chat-message" style="background-color:`+ message.color+ `;"">
                        `+ message.message + `
                    </span>
                </div>
                `
            );
        });
    }

    $('#sendMessage').click(function(){
        var that = this;
        var message = $('#message').val();
        $('#message').val("");
        $.ajax({
            method: "POST",
            url: "chat/send",
            data: { message : message }
        })
            .done(function(){
                getMessages();
        });
    });

    function getMessages(){
        var that = this;
        $.ajax({
            method: "GET",
            url: "chat/receive-all",
        })
        .done(function( messages ){
            buildChat(messages);
        });
    }
    </script>
@endpush
