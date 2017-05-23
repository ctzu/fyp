@extends('layouts.app')

@section('page-title', 'Aktiviti Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('pelajar.aktiviti.store') }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('nama_kelab') ? 'has-error' : '' }}">
                <label for="nama_kelab" class="col-md-2 control-label">Nama Kelab</label>
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

            <div class="form-group {{ $errors->has('nama_aktiviti') ? 'has-error' : '' }}">
                <label for="nama_aktiviti" class="col-md-2 control-label">Nama Aktiviti</label>
                <div class="col-md-6">
                    <input class="form-control" id="nama_aktiviti" type="text" name="nama_aktiviti" value="{{ old('nama_aktiviti') }}">
                    @if ($errors->has('nama_aktiviti'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama_aktiviti') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('tempat_aktiviti') ? 'has-error' : '' }}">
                <label for="tempat_aktiviti" class="col-md-2 control-label">Tempat Aktiviti</label>
                <div class="col-md-6">
                    <input class="form-control" id="tempat_aktiviti" type="text" name="tempat_aktiviti" value="{{ old('tempat_aktiviti') }}">
                    @if ($errors->has('tempat_aktiviti'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tempat_aktiviti') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('tarikh_aktiviti') ? 'has-error' : '' }}">
                <label for="tarikh_aktiviti" class="col-md-2 control-label">Tarikh Aktiviti</label>
                <div class="col-md-6">
                    <input class="form-control datepicker" id="tarikh_aktiviti" type="text" name="tarikh_aktiviti" value="{{ old('tarikh_aktiviti') }}">
                    @if ($errors->has('tarikh_aktiviti'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tarikh_aktiviti') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('peringkat') ? 'has-error' : '' }}">
                <label for="peringkat" class="col-md-2 control-label">Peringkat</label>
                <div class="col-md-3">
                    <select class="form-control" id="peringkat" name="peringkat">
                        <option value="" disabled selected>Sila Pilih</option>
                    @foreach($activityLevels as $activityLevel)
                        <option value="{{ $activityLevel->id }}" {{ setSelected($activityLevel->id, old('peringkat')) }}>{{ $activityLevel->label }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('peringkat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('peringkat') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('pencapaian') ? 'has-error' : '' }}">
                <label for="pencapaian" class="col-md-2 control-label">Pencapaian</label>
                <div class="col-md-3">
                    <select class="form-control" id="pencapaian" name="pencapaian">
                        <option value="" disabled selected>Sila Pilih</option>
                    @foreach($activityAchievements as $activityAchievement)
                        <option value="{{ $activityAchievement->id }}" {{ setSelected($activityAchievement->id, old('pencapaian')) }}>{{ $activityAchievement->label }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('pencapaian'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pencapaian') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('jawatankuasa') ? 'has-error' : '' }}">
                <label for="jawatankuasa" class="col-md-2 control-label">Jawatankuasa</label>
                <div class="col-md-3">
                    <select class="form-control" id="jawatankuasa" name="jawatankuasa">
                        <option value="" disabled selected>Sila Pilih</option>
                    @foreach($activityCommittees as $activityCommittee)
                        <option value="{{ $activityCommittee->id }}" {{ setSelected($activityCommittee->id, old('jawatankuasa')) }}>{{ $activityCommittee->name }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('jawatankuasa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jawatankuasa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('files[]') ? 'has-error' : '' }}">
                <label for="files[]" class="col-md-2 control-label">Dokumen Berkaitan</label>
                <div class="col-md-3">
                    <input type="file" id="files" name="files[]" multiple>
                    <small class="help-block">Boleh muat naik beberapa fail.</small>
                    @if ($errors->has('files[]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('files[]') }}</strong>
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
