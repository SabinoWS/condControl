@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>Gestão de Condomínios</span>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('create-condominium') }}" class="btn btn-primary">Cadastrar</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Síndico</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Condomínio 01</td>
                                <td>Síndico Teste</td>
                                <td>E D AS</td>
                            </tr>
                            <tr>
                                <td>Condomínio 02</td>
                                <td>Síndico Teste</td>
                                <td>E D AS</td>
                            </tr>
                            <tr>
                                <td>Condomínio 02</td>
                                <td>Síndico Teste</td>
                                <td>E D AS</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
