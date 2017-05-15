@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 pull-right">
                    
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Transkrip Kokurikulum</h3>
                    </div>
                    <div class="panel-body">
                            <p>Nama Pelajar :{{ $activity->user->name }}</p>
                            <p> Nama Aktiviti: {{ $activity->name}}</p>
                            <p> Tempat Aktiviti : {{ $activity->place}}</p>
                            <p> Tarikh Aktiviti : {{ $activity->date}}</p>
                            <p> Peringkat Aktiviti : {{ $activity->level->label}}</p>
                            <p> Pencapaian : {{ $activity->achievement->label }}</p>
                            <p> Jawatankuasa : {{ $activity->committee->name}}</p>
                            <p> Markah Merit : {{ $activity->user->markahMerit->markah }}</p>
                            <br>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6 pull-right" style="text-align: right">
                    <a href="{{ url('/papar', $activity->id) }}" target="_blank" class="btn btn-primary">Muat turun resit</a>

                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection