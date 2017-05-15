<!DOCTYPE html>
<html lang="en">
<style>
    * {
        font-family: sans-serif;
        font-size: 12px;
    }
    .logo h1 {
        font-family: sans-serif;
        font-size: 36px;
        margin: 0px;
        color: #2980b9;
        text-shadow: 1px 1px #CCCCCC;
    }
    .logo {
        text-align: center;
    }
    .logo span {
        font-size: 30px;
        font-style: italic;
        color: #848484;
    }
    .logo p{
        margin: 0px;
        color: #B1AEAE;
        padding: 0px;
        font-family: sans-serif;
        font-size: 12px;
        letter-spacing: 1px;
    }
    .row {
        overflow: hidden;
        clear: both;
    }
    .col-md-6 {
        width: 50%;
        float: left;
    }
    .address-company {
        text-align: right;
    }
    .address-company h4 {
        margin: 0px;
        padding: 0px;
    }
</style>
<body>
<table border="0" width="100%">
    <tr>
        <td class="logo">
            <h1>UNIVERSITI KEBANGSAAN MALAYSIA<span></span></h1>
            <p>Jadi Pelajar yang Produktif!</p>
        </td>
        <td class="address-company" style="text-align: right">
            <h4>Universiti Kebangsaan Malaysia </h4>
            <p style="margin-top: 0px;">
                Bandar Baru Bangi <br/>
                Malaysia<br/>
                <br/>
                T +33 555 444 333<br/><br/>
            </p>
        </td>
    </tr>
</table>

<br><br>
<table class="table table-bordered" border="1" style="border-collapse: collapse; width: 80%; border-color: #adadad;">
    <thead style="background: #EAEAEA;">
        @forelse($activities as $activity)
    <tr>
        <td>{{ $loop->iteration }}</td>>
    </tr>
     <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Nama Pelajar  : </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">{{ $activity->user->name}}</td>
    </tr>
    
    <tr>
    <tr>
       <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Nama Aktiviti : </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;"> {{ $activity->name}}</td>
    </tr>
    <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;">Jawatankuasa : </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;"> {{ $activity->committee->name}}</td>
    </tr>
    <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;">Markah Merit : </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;"> {{ $activity->user->markahMerit->markah}}</td>
    </tr>
    </tr>
    @empty
    <tr>
        <td colspan="5"><strong>Tiada data dijumpai.</strong></td>
    </tr>
    @endforelse
    </thead>    
</table>

</body>
</html>