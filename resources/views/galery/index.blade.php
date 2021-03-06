@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default main-panel">
                <div class="panel-heading">
                    GALERIA
                </div>
                <div class="panel panel-body">
                    <form action="{{ route('galery-send') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="photo" id="photo" class="col-md-2 form-control">
                        <br />
                        <br />
                        <button name="submit" class="main-panel-button btn btn-default">Enviar Foto</button>
                    </form>
                    <br />
                    <br />
                    <div class="row text-center">
                        @foreach ($photos as $photo)
                            <img class="galery-image enlarge" src="{{ asset($photo->getName()) }}" alt="Foto Condominio" height="150" width="250">
                        @endforeach
                    </div>
                    <br />

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
