@extends('layouts.app')

@section('page-title', 'Hebahan Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('pensyarah.hebahan.store') }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('nama_program') ? 'has-error' : '' }}">
                <label for="nama_program" class="col-md-2 control-label">Tajuk Hebahan</label>
                <div class="col-md-6">
                    <input class="form-control" id="nama_program" type="text" name="nama_program" value="{{ old('nama_program') }}">
                    @if ($errors->has('nama_program'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama_program') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('nama_kelab') ? 'has-error' : '' }}">
                <label for="nama_kelab" class="col-md-2 control-label">Anjuran</label>
                <div class="col-md-3">
                    <select class="form-control" id="nama_kelab" name="nama_kelab" autofocus>
                        <option value="" disabled selected>Sila Pilih</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}" {{ setSelected($club->id, old('nama_kelab')) }}>{{ $club->name }}</option>
                    @endforeach

                    </select>
                    @if ($errors->has('nama_kelab'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama_kelab') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('perincian') ? 'has-error' : '' }}">
                <label for="perincian" class="col-md-2 control-label">Perincian Hebahan</label>
                <div class="col-md-6">
                    <textarea class="form-control" id="perincian" type="text" name="perincian" row="6" maxlength="500">
                        {{ old('perincian') }}
                    </textarea>
                    @if ($errors->has('perincian'))
                        <span class="help-block">
                            <strong>{{ $errors->first('perincian') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="form-group {{ $errors->has('tempat_program') ? 'has-error' : '' }}">
                <label for="tempat_program" class="col-md-2 control-label">Tempat Program</label>
                <div class="col-md-6">
                    <input class="form-control" id="tempat_program" type="text" name="tempat_program" value="{{ old('tempat_program') }}">
                    @if ($errors->has('tempat_program'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tempat_program') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('tarikh_program') ? 'has-error' : '' }}">
                <label for="tarikh_program" class="col-md-2 control-label">Tarikh Program</label>
                <div class="col-md-6">
                    <input class="form-control datepicker" id="tarikh_program" type="text" name="tarikh_program" value="{{ old('tarikh_program') }}">
                    @if ($errors->has('tarikh_program'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tarikh_program') }}</strong>
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
        <div class="container">

            <hr>
            <!— Footer —>
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                    <p class="copyright text-muted small">2017 &copy; e-Merit FTSM UKM. Hak Cipta Terpelihara</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
@endsection
