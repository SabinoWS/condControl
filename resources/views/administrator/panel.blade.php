@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="main-panel panel panel-default">
                <div class="panel-heading">Painel de Administrador</div>

                <div class="panel-body">
                    <div class="row col-sm-offset-4">
                        <div class="col-xs-12 col-sm-3 text-center">
                            <a title="Gerenciar Condomínios" href="{{ route('management-condominium') }}" class="no-style">
                                <span class="main-panel-button fa fa-building-o btn btn-default"></span>
                                <div>Condomínios</div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 text-center">
                            <a title="Gerenciar Síndicos" href="{{ route('create-manager') }}" class="no-style">
                                <span class="fa fa-id-badge main-panel-button btn btn-default"></span>
                                <div>Síndicos</div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
