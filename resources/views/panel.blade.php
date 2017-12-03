@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default main-panel">
                <div class="panel-heading">
                    {{ auth()->getUser()->getCondominium()->getName() }}
                </div>

                {{-- {{ dump(auth()->getUser()->getCondominium()->getUsers()) }} --}}

                @permission('resident-area')
                    @if (auth()->getUser()->getHolders())
                        Responsável: {{ auth()->getUser()->getHolders()->getName() }}
                    @endif
                @endpermission

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @permission('admin-area')
                    <div class="row col-sm-offset-4">
                        <div class="col-xs-12 col-sm-3 text-center">
                            <a title="Gerenciar Condomínios" href="{{ route('management-condominium') }}" class="no-style">
                                <i class="main-panel-button fa fa-building-o btn btn-default"></i>
                                <div>Condomínios</div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 text-center">
                            <a title="Gerenciar Síndicos" href="{{ route('create-manager') }}" class="no-style">
                                <i class="fa fa-id-badge main-panel-button btn btn-default"></i>
                                <div>Síndicos</div>
                            </a>
                        </div>
                    </div>
                    @endpermission
                    @permission('manager-area')
                        <a title="Administrar Proprietário" href="{{ route('management-holder') }}" class="no-style">
                            <i class="fa fa-key main-panel-button btn btn-default"></i>
                        </a>
                        <a title="Administrar Notícias" href="{{ route('management-news') }}" class="no-style">
                            <i class="fa fa-newspaper-o main-panel-button btn btn-default" aria-hidden="true"></i>
                        </a>
                        <a title="Administrar Locais" href="{{ route('management-local') }}" class="no-style">
                            <i class="fa fa-map-marker main-panel-button btn btn-default" aria-hidden="true"></i>
                        </a>
                    @endpermission
                    @permission('holder-area')
                        <a title="Administrar Moradores" href="{{ route('management-resident') }}" class="no-style">
                            <i class="fa fa-home main-panel-button btn btn-default"></i>
                        </a>
                    @endpermission
                    @permission('resident-area')
                        <a title="Mensagens" href="" class="no-style">
                            <i class="fa fa-envelope-o main-panel-button btn btn-default"></i>
                        </a>
                        <a title="Galeria" href="" class="no-style">
                            <i class="fa fa-camera-retro main-panel-button btn btn-default"></i>
                        </a>
                        <a title="Reservar Local" href="{{ route('choose-local') }}" class="no-style">
                            <i class="fa fa-calendar main-panel-button btn btn-default"></i>
                        </a>
                    @endpermission

                    @forelse ($news as $new)
                        <div class="panel panel-default news-panel">
                            <div class="panel-heading">
                                <div class="news-title text-center">{{ $new->getTitle() }}</div>
                            </div>
                            <div class="panel-body">
                                <div class="row ">
                                    <div class="news-message">
                                        {{ $new->getMessage() }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="news-author text-center">
                                        <span>Enviado por: </span>
                                        <strong>{{ $new->getAuthor()->getName() }}</strong>
                                        <span>Em: </span>
                                        <strong>{{ $new->getCreatedAt()->format('d/m/Y H:i:s') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
