@extends('layouts.app')

@section('page-title', 'Kelab Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('pentadbir.kelab.store') }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama" class="col-md-2 control-label">Nama</label>
                <div class="col-md-6">
                    <input class="form-control" id="nama" type="text" name="nama" value="{{ old('nama') }}" autofocus>
                    @if ($errors->has('nama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary">Hantar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
