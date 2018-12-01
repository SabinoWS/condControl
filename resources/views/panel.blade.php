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
                    <div class="row">
                        <div class="col-xs-12">
                            &nbsp&nbsp&nbsp<strong>Responsável:</strong> {{ auth()->getUser()->getHolders()->getName() }}
                        </div>
                    </div>
                    @endif
                @endpermission

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- BOTOES DE NAV --}}
                    <div style="" class="text-center"> 

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
                        <div class="row">
                            <div style="display: inline;" class="text-left col-md-4">
                                <a title="Administrar Proprietário" href="{{ route('management-holder') }}" class="no-style">
                                    <i class="fa fa-key main-panel-button btn btn-default"></i>
                                </a>
                                Administrar Proprietário
                            </div>
                            <div style="display: inline;" class="text-left col-md-4">
                                <a title="Administrar Notícias" href="{{ route('management-news') }}" class="no-style">
                                    <i class="fa fa-newspaper-o main-panel-button btn btn-default" aria-hidden="true"></i>
                                </a>
                                Administrar Notícias
                            </div>
                            <div style="display: inline;" class="text-left col-md-4">
                                <a title="Administrar Locais" href="{{ route('management-local') }}" class="no-style">
                                    <i class="fa fa-map-marker main-panel-button btn btn-default" aria-hidden="true">&nbsp</i>
                                </a>
                                Administrar Locais
                            </div>
                        </div>
                        @endpermission

                        @permission('holder-area')
                        <div class="row">
                        <div style="display: inline;" class="text-left col-md-4">
                            <a title="Administrar Moradores" href="{{ route('management-resident') }}" class="no-style">
                                <i class="fa fa-home main-panel-button btn btn-default"></i>
                            </a>
                            Administrar Moradores
                        </div>
                        </div>
                        @endpermission

                        @permission('resident-area')
                        <div class="row">
                            <div style="display: inline;" class="text-left col-md-4">
                                <a title="Mensagens" href="{{ route('chat-board') }}" class="no-style">
                                    <i class="fa fa-envelope-o main-panel-button btn btn-default"></i>
                                </a>
                                Chat
                            </div>
                            <div style="display: inline;" class="text-left col-md-4">
                                <a title="Galeria" href="{{ route('galery-board') }}" class="no-style">
                                    <i class="fa fa-camera-retro main-panel-button btn btn-default">&nbsp</i>
                                </a>
                                Galeria
                            </div>
                            <div style="display: inline;" class="text-left col-md-4">
                                <a title="Reservar Local" href="{{ route('choose-local') }}" class="no-style">
                                    <i class="fa fa-calendar main-panel-button btn btn-default"></i>
                                </a>
                                Reservar Local
                            </div>
                        </div>
                        @endpermission
                        <br><br>
                    </div>
                    {{-- FIM BOTOES DE NAV --}}

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
