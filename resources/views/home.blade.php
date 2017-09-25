@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de Administrador</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="btn btn-default">
                            Criar Síndico
                        </div>
                        <div class="btn btn-default">
                            Criar Síndico
                        </div>
                        <div class="btn btn-default">
                            Criar Síndico
                        </div>
                        <div class="btn btn-default">
                            Criar Síndico
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
