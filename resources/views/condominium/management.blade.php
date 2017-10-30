@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="main-panel panel panel-default">
                <div class="panel-heading">
                    <span>Gestão de Condomínios</span>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('create-condominium') }}" class="round-icon-button fa fa-plus btn btn-default"></a>
                        </div>
                    </div>
                    <table class="default-table table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Síndico</th>
                                <th class="col-xs-2 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($condominiums as $condominium)
                                <tr>
                                    <td class="text-center">{{ $condominium->name }}</td>
                                    <td class="text-center">{{ $condominium->getManager()->name }}</td>
                                    <td class="col-xs-2 text-center">
                                        <a><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a><i class="fa fa-id-card" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                                Nenhum cadastrado
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
