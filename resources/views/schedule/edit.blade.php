@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="main-panel panel panel-default">
                <div class="panel-heading">Editar Local</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update-schedule', ['id' => $schedule->getId()]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                            <label for="capacity" class="col-md-4 control-label">Data</label>
                            <div class="col-md-6">
                                <input id="reservation_date" type="text" class="date form-control" name="reservation_date" value="{{ old('capacity', $schedule->getReservationDate()->format('d/m/Y')) }}" autofocus>
                                @if ($errors->has('capacity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="main-panel-button btn btn-default">
                                    Editar
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
