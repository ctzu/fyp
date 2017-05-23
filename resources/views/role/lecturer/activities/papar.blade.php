@extends('layouts.app')

@section('page-title', 'Papar Aktiviti')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td class="col-md-2"><strong>Nama Aktiviti</strong></td>
                <td>{{ $activity->name or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Tempat Aktiviti</strong></td>
                <td>{{ $activity->place or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Tarikh Aktiviti</strong></td>
                <td>{{ $activity->date or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Peringkat Aktiviti</strong></td>
                <td>{{ $activity->level->label or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Pencapaian</strong></td>
                <td>{{ $activity->achievement->label or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Pencapaian</strong></td>
                <td>{{ $activity->achievement->label or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Jawatankuasa</strong></td>
                <td>{{ $activity->committee->name or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Status</strong></td>
                <td>{{ $activity->status->label or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Fail/Dokumen</strong></td>
                <td>
                    <table class="table table-striped table-condensed">
                        <tr>
                            <th>#</th>
                            <th>Nama Fail</th>
                            <th>&nbsp;</th>
                        </tr>
                        @forelse ($activity->files as $file)
                            <tr>
                                <td>{{ $loop->iteration or ''  }}</td>
                                <td>{{ $file->old_file_name or '' }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs pull-right download-file" id="download-file-{{ $file->id }}" href="{{ route('pensyarah.fail.download', $file) }}">Muat Turun</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Tiada fail wujud.</td>
                            </tr>
                        @endforelse
                    </table>
                </td>
            </tr>

            <tr>
                <td class="col-md-2"><strong>Markah Merit</strong></td>
                <td>{{ $activity->user->markahMerit->markah }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Dimuatnaik oleh</strong></td>
                <td>{{ $activity->user->name }}</td>
            </tr>
        </table>
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
