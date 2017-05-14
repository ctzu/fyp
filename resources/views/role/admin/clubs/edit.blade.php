@extends('layouts.app')

@section('page-title', 'Kelab Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('pentadbir.kelab.update', $club) }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama" class="col-md-2 control-label">Nama</label>
                <div class="col-md-6">
                    <input class="form-control" id="nama" type="text" name="nama" value="{{ old('nama', $club->name) }}" autofocus>
                    @if ($errors->has('nama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('lecturer') ? 'has-error' : '' }}">
                <label for="lecturer" class="col-md-2 control-label">Lecturer</label>
                <div class="col-md-6">
                    <select class="form-control" name="lecturer">
                        <option disabled selected>Please Select</option>
                        @foreach($lecturers as $lecturer)
                            <option value="{{ $lecturer->id }}" {{ $lecturer->id == $club->lecturer_id ? 'selected' : null }}>{{ $lecturer->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('lecturer'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lecturer') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary">Kemaskini</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
