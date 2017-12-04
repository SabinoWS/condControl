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
                    <table class="default-table table table-bordered" id="tabela">
                        <thead>
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Síndico</th>
                                <th class="col-xs-2 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($condominiums as $condominium)
                                @if ($condominium->getName() != "CondControl Administração")
                                <tr>
                                    <td class="text-center">{{ $condominium->getName() }}</td>
                                    <td class="text-center">{{ $condominium->getManager()->name }}</td>
                                    <td class="col-xs-2 text-center">
                                        <a href="{{ route('edit-condominium',  $condominium->getId()) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form class="inline form-inline" method="POST" action="{{ route('delete-condominium', ['id' => $condominium->getId()]) }}">
                                            {{ csrf_field() }}
                                            <button class="link-button"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $( document ).ready(function() {
        $("#tabela").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            })
    });
</script>
@endpush
