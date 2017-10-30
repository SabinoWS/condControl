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
                                <span id="no_result">Nenhum condomínio cadastrado</span>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script> --}}

  {{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script> --}}

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  {{-- <script src="{{ asset('js/data_table/dt.js') }}"></script> --}}

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
