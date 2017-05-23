@extends('layouts.app')

@section('page-title', 'Senarai Aktiviti')

@section('page-button')
<a href="{{ url('/pdf') }}" target="_blank" class="btn btn-primary">Muat turun</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Aktiviti</th>
                    <th>Jawatankuasa</th>
                    <th>Markah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transcripts as $transcript)
                    <tr>
                        <td>{{ $transcript->name }}</td>
                        <td>{{ $transcript->committee->name }}</td>
                        <td>{{ $transcript->user->markahMerit->markah}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tiada data.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    </div>
</div>

@endsection
