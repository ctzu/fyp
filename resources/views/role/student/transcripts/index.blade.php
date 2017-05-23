@extends('layouts.app')

@section('page-title', 'Senarai Aktiviti Yang Terlibat')

@section('page-button')
<a href="{{ route('pelajar.showReceiptPDF') }}" target="_blank" class="btn btn-primary">Muat turun</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Aktiviti</th>
                    <th>Jawatankuasa</th>
                    <th>Markah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transcripts as $transcript)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transcript->activity->name }}</td>
                        <td>{{ $transcript->activity->committee->name }}</td>
                        <td>{{ $transcript->markah or 'Tiada Markah' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tiada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
