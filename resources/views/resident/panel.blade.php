@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="alert alert-danger">
            <ul>
                <li>
                    Elevador em manutenção.
                </li>
                <li>
                    Faltará água dia 05/11/2017.
                </li>
            </ul>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default main-panel">
                <div class="panel-heading">Painel do Morador</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="main-panel-button btn btn-default">
                                Notícias
                            </div>
                            <div class="main-panel-button btn btn-default">
                                Fotos
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="main-panel-button btn btn-default">
                                Reservar Local
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
