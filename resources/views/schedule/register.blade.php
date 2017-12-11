@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="main-panel panel panel-default">
                <div class="panel-heading">Registrar Agendamento</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('save-schedule') }}">
                        {{ csrf_field() }}

                        <input id="local_id" type="hidden" class="form-control" name="local_id" value="{{ $local->getId() }}" autofocus>

                        {{-- <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Observações (Opcional)</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" autofocus>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group{{ $errors->has('reservation_date') ? ' has-error' : '' }}">
                            <label for="capacity" class="col-md-4 control-label">Data</label>
                            <div class="col-md-6">
                                <input id="reservation_date" type="text" class="date form-control" name="reservation_date" value="{{ old('reservation_date') }}" autofocus>
                                @if ($errors->has('reservation_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reservation_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="main-panel-button btn btn-default">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
