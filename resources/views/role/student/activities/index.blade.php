@extends('layouts.app')

@section('page-title', 'Senarai Aktiviti')

@section('page-button')
<a class="btn btn-primary" href="{{ route('pelajar.aktiviti.create') }}">Aktiviti Baru</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Aktiviti</th>
                    <th>Status</th>
                    <th>Dicipta pada</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse($activities as $activity)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->status->label }}</td>
                        <td>{{ $activity->created_at->diffForHumans() }}</td>
                        <td>
                            <span class="pull-right">
                                <a class="btn btn-info btn-sm" href="{{ route('pelajar.aktiviti.show', $activity) }}">Papar</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('pelajar.aktiviti.edit', $activity) }}">Kemaskini</a>
                                <form action="{{ route('pelajar.aktiviti.destroy', $activity) }}" method="POST" style="display:inline !important;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"><strong>Tiada data dijumpai.</strong></td>
                    </tr>
                @endforelse
            </tbody>
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
        {{ $activities->links() }}
    </div>
</div>
@endsection
