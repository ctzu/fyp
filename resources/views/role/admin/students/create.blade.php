@extends('layouts.app')

@section('page-title', 'Pelajar Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('pentadbir.pelajar.store') }}" method="POST" enctype="multipart/form-data">

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

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="col-md-2 control-label">E-mail</label>
                <div class="col-md-6">
                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="col-md-2 control-label">Kata Laluan</label>
                <div class="col-md-6">
                    <p class="form-control-static">Kata laluan bagi akaun pelajar akan dihantar ke email yang didaftarkan.</p>
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
