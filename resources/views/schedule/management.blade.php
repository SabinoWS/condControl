@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="main-panel panel panel-default">
                <div class="panel-heading">
                    <span>Horários para {{ $local->getName() }}</span>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('create-schedule') }}" class="round-icon-button fa fa-plus btn btn-default"></a>
                        </div>
                    </div>
                    <table class="default-table table table-bordered" id="tabela">
                        <thead>
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Descrição</th>
                                <th class="text-center">Capacidade</th>
                                <th class="col-xs-2 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                                <tr>
                                    <td class="text-center">{{ $schedule->getName() }}</td>
                                    <td class="text-center">{{ $schedule->getDescription() }}</td>
                                    <td class="col-xs-2 text-center">{{ $schedule->getCapacity() }}</td>
                                    <td class="col-xs-2 text-center">
                                        <a href="{{ route('edit-schedule',  $schedule->getId()) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form class="inline form-horizontal" method="POST" action="{{ route('delete-schedule', ['id' => $schedule->getId()]) }}">
                                            {{ csrf_field() }}
                                            <button class="link-button" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
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
