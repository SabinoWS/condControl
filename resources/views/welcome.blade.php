<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/condControl.css') }}" rel="stylesheet">
        <link href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
        <title>CondControl</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="container">
                <div class="row">
                    <div>
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a class="btn btn-default" href="{{ url('/home') }}">Painel</a>
                                @else
                                    <a href="{{ route('login') }}">Entrar</a>
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="content">
                        <div class="title m-b-md">
                            CondControl
                        </div>
                </div>

                <div class="row text-center">
                    <div class="links">
                        <a class="col-xs-12" href="">Sobre</a>
                        <a class="col-xs-12" href="">Pacotes</a>
                        <a class="col-xs-12" href="">Valores</a>
                        <a class="col-xs-12" href="">Orçamento</a>
                        <a class="col-xs-12" href="">Fale Conosco</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
