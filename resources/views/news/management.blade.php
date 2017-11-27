@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="main-panel panel panel-default">
                <div class="panel-heading">
                    <span>Gestão de Notícias</span>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('create-news') }}" class="round-icon-button fa fa-plus btn btn-default"></a>
                        </div>
                    </div>
                    <table class="default-table table table-bordered" id="tabela">
                        <thead>
                            <tr>
                                <th class="text-center">Título</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Tipo</th>
                                <th class="col-xs-2 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($news as $new)
                                <tr>
                                    <td class="text-center">{{ $new->getTitle() }}</td>
                                    <td class="text-center">{{ $new->getAuthor()->getName() }}</td>
                                    <td class="text-center">{{ $new->getCreatedAt()->format('d/m/Y H:i:s') }}</td>
                                    <td class="text-center">{{ $new->getType() }}</td>
                                    <td class="col-xs-2 text-center">
                                        <a href="{{ route('edit-news',  $new->getId()) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form class="form-horizontal" method="POST" action="{{ route('delete-news', ['id' => $new->getId()]) }}">
                                            {{ csrf_field() }}
                                            <button type="submit"><i class="fa fa-trash"></i></button>
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
