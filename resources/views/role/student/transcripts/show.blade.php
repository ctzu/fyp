<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <style type="text/css">
        @page {
            margin: 100px 50px;
        }

        div.page {
            page-break-after: always;
        }

        div.page:last-child {
            page-break-after: never;
        }

        .full {
            width: 100%;
        }

        .half {
        	width: 50%;
        }

        .quad {
            width: 25%;
        }

        table,
        tr,
        th,
        td{
            border: 1px solid black;
            border-collapse: collapse;
        }

        td.content {
        	padding: 8px 8px;
        }

        th.header {
    		color: black;
    		border: 1px solid black;
            padding: 5px 5px;
        }

        .no-border {
            border: none;
        }

        .no-padding {
            padding: 0 0;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
        	text-align: right;
        }

        .right {
            float: right;
        }

        .clear {
            clear: both;
        }

        .bold {
        	font-weight: bold;
        }

    	.bg-warning {
    		background-color:#fcf8e3 ;
    	}
    	.text-danger {
    		color: #d44950;
    	}
        .text-primary {
    		color:#0275d8 ;
    	}
        </style>
    </head>
    <body class="page">
        <img src="img/UKM.png" width="100%" alt="">
        <h3 class="text-center">Universiti Kebangsaan Malaysia</h3>

        <p><strong>Nama:&nbsp;</strong>{{$transcripts->first()->user->name}}</p>
        <p><strong>No. Matrik:&nbsp;</strong>{{$transcripts->first()->user->student->students_no or '-'}}</p>

        <table class="full">
            <thead>
                <tr>
                    <th class="header">#</th>
                    <th class="header">Nama Aktiviti</th>
                    <th class="header">Jawatankuasa</th>
                    <th class="header">Markah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transcripts as $transcript)
                    <tr>
                        <td class="content">{{ $loop->iteration }}</td>
                        <td class="content">{{ $transcript->activity->name }}</td>
                        <td class="content">{{ $transcript->activity->committee->name }}</td>
                        <td class="content">{{ $transcript->markah }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="content" colspan="4" align="right">
                        @if ($transcripts->count() == 3)
                            <strong>Status:&nbsp;</strong>Pelajar Aktif
                        @else
                            <strong>Status:&nbsp;</strong>Pelajar Tidak Aktif
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>


    </body>
</html>
