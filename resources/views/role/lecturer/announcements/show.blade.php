@extends('layouts.app')

@section('page-title', 'Maklumat Aktiviti')

@section('content')
<div class="row">
    <div class="col-md-12">
    <table class="table">
            <tr>
                <td class="col-md-2"><strong>Tajuk Hebahan</strong></td>
                <td>{{ $announcement->title or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Anjuran</strong></td>
                <td>{{ $announcement->club->name or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Perincian Hebahan</strong></td>
                <td>{{ $announcement->description or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Tempat Program</strong></td>
                <td>{{ $announcement->placeP or ''  }}</td>
            </tr>
            <tr>
                <td class="col-md-2"><strong>Tarikh Program</strong></td>
                <td>{{ $announcement->dateP or ''  }}</td>
            </tr>            
            </table>   
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <a class="btn btn-primary btn-sm" href="{{ route('pensyarah.hebahan.index', $announcement) }}">OK</a>
                </div>
            </div>
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
    </div>
</div>
@endsection
