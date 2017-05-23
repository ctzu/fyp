@extends('layouts.app')

@section('page-title', 'Urus Pelajar')

@section('page-button')
<a class="btn btn-primary" href="{{ route('pentadbir.pelajar.create') }}">Pelajar Baru</a>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pelajar</th>
                    <th>Dicipta pada</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->created_at->diffForHumans() }}</td>
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
        {{ $students->links() }}

        </div>
    </div>
</div>
@endsection
