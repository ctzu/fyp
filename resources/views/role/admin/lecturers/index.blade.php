@extends('layouts.app')

@section('page-title', 'Urus Pensyarah')

@section('page-button')
<a class="btn btn-primary" href="{{ route('pentadbir.pensyarah.create') }}">Pensyarah Baru</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pensyarah</th>
                    <th>Dicipta pada</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lecturers as $lecturer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lecturer->name }}</td>
                        <td>{{ $lecturer->created_at->diffForHumans() }}</td>
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
        
        {{ $lecturers->links() }}
    </div>
</div>
@endsection
