@extends('layouts.app')

@section('page-title', 'Urus Kelab')

@section('page-button')
<a class="btn btn-primary" href="{{ route('pentadbir.kelab.create') }}">Kelab Baru</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kelab</th>
                    <th>Dicipta pada</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clubs as $club)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $club->name }}</td>
                        <td>{{ $club->created_at->diffForHumans() }}</td>
                        <td>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tiada data dijumpai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
