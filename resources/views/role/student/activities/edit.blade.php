@extends('layouts.app')

@section('page-title', 'Kemaskini Aktiviti')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('pelajar.aktiviti.update', $activity) }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group {{ $errors->has('nama_kelab') ? 'has-error' : '' }}">
                <label for="nama_kelab" class="col-md-2 control-label">Nama Kelab</label>
                <div class="col-md-3">
                    <select class="form-control" id="nama_kelab" name="nama_kelab" autofocus>
                        <option value="" disabled selected>Sila Pilih</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}" {{ setSelected($club->id, old('nama_kelab', $activity->club_id)) }}>{{ $club->name }}</option>
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
                    <input class="form-control" id="nama_aktiviti" type="text" name="nama_aktiviti" value="{{ old('nama_aktiviti', $activity->name) }}">
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
                    <input class="form-control" id="tempat_aktiviti" type="text" name="tempat_aktiviti" value="{{ old('tempat_aktiviti', $activity->place) }}">
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
                    <input class="form-control datepicker" id="tarikh_aktiviti" type="text" name="tarikh_aktiviti" value="{{ old('tarikh_aktiviti', $activity->date) }}">
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
                        <option value="{{ $activityLevel->id }}" {{ setSelected($activityLevel->id, old('peringkat', $activity->activity_level_id)) }}>{{ $activityLevel->label }}</option>
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
                        <option value="{{ $activityAchievement->id }}" {{ setSelected($activityAchievement->id, old('pencapaian', $activity->activity_achievement_id)) }}>{{ $activityAchievement->label }}</option>
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
                    @foreach($activitycommittees as $activitycommittee)
                        <option value="{{ $activitycommittee->id }}" {{ setSelected($activitycommittee->id, old('jawatankuasa', $activity->activity_committee_id)) }}>{{ $activitycommittee->name }}</option>
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

            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <table class="table table-striped table-condensed">
                        <tr>
                            <th>#</th>
                            <th>Nama Fail</th>
                            <th>&nbsp;</th>
                        </tr>
                        @forelse ($activity->files as $file)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $file->old_file_name }}</td>
                                <td class="pull-right">
                                    <a class="btn btn-danger btn-xs delete-file" id="delete-file-{{ $file->id }}" href="{{ route('pelajar.fail.destroy', $file) }}">Buang Fail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Tiada fail wujud.</td>
                            </tr>
                        @endforelse
                    </table>
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

@section('scripts')
<script>
    $(function () {
        $('.delete-file').on('click', function(e) {
            e.preventDefault();
            var delete_button = $(this);
            var url = delete_button.attr('href');
            var jqXHR = $.ajax({
                url: url,
                method: 'POST',
                data: {
                    '_method': 'DELETE'
                }
            });

            jqXHR.done(function(result){
                delete_button.closest('tr').remove();
            });
        });
    });
</script>
@endsection
