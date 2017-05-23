@extends('layouts.app')

@section('page-title', 'Senarai Aktiviti')

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
                    <th>Dikemaskini pada</th>
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
                        <td>{{ $activity->updated_at->diffForHumans() }}</td>
                        <td>
                            <span class="pull-right">
                            <a class="btn btn-info btn-sm" href="{{ route('pensyarah.papar', $activity) }}">Papar</a>
                                <a class="btn btn-info btn-sm" href="{{ route('pensyarah.aktiviti.show', $activity) }}">Pengesahan</a>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"><strong>Tiada data dijumpai.</strong></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {{ $activities->links() }}
    </div>
</div>
@endsection
