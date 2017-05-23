@extends('layouts.app')

@section('page-title', 'Urus Pentadbir')

@section('page-button')
<a class="btn btn-primary" href="{{ route('pentadbir.tadbir.create') }}">Pentadbir Baru</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pentadbir</th>
                    <th>Dicipta pada</th>
                    <th>&nbsp;</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($administrators as $administrator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $administrator->name }}</td>
                        <td>{{ $administrator->created_at->diffForHumans() }}</td>
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
        
        {{ $administrators->links() }}
    </div>
</div>
@endsection
