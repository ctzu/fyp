@extends('layouts.app')

@section('page-title', 'Senarai Hebahan')

@section('page-button')
<a class="btn btn-primary" href="{{ route('pelajar.hebahan.create') }}">Hebahan Baru</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Aktiviti</th>
                    <th>Dicipta pada</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $announcement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ $announcement->created_at->diffForHumans() }}</td>
                        <td>
                            <span class="pull-right">
                                <a class="btn btn-info btn-sm" href="{{ route('pelajar.hebahan.show', $announcement) }}">Papar</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('pelajar.hebahan.edit', $announcement) }}">Kemaskini</a>
                                <form action="{{ route('pelajar.hebahan.destroy', $announcement) }}" method="POST" style="display:inline !important;">
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
        {{ $announcements->links() }}
    </div>
</div>
@endsection
