@extends('layouts.app')

@section('page-title', 'Senarai Aktiviti')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tbody>
                @forelse($transcripts as $transcript)
                    <tr>
                        <td>{{ $loop->iteration }}</td>>
                        </tr>
                        <tr>
                        <td class="col-md-2"><strong>Nama Aktiviti</strong></td>
                        <td>{{ $transcript->name }}</td>>
                        </tr>
                        <tr>
                        <td class="col-md-2"><strong>Jawatankuasa</strong></td>
                        <td>{{ $transcript->committee->name }}</td>>
                        </tr>
                        <tr>
                        <td class="col-md-2"><strong>Markah</strong></td>
                        <td>{{ $transcript->user->markahMerit->markah}}</td>>
                        </tr>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"><strong>Tiada data dijumpai.</strong></td>
                    </tr>
                @endforelse
                
            </tbody>
        </table>
        <div class="row">
                <div class="col-md-6 pull-right" style="text-align: right">
                    <a href="{{ url('pdf/resit') }}" target="_blank" class="btn btn-primary">Muat turun</a>
    </div>
</div>
@endsection
