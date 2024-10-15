<!DOCTYPE html>
<html>
<head>
    <title>Pension Fund Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
        .table_detail td{
            text-align:center;
			border:1px solid #000;
			text-align:center;
		}
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    @if(count($data) > 0)
        <br>
        <table>
            <thead>
                <tr>
                    <th colspan="3" style="font-size: 15px;"><b>DANA PENDAFTARAN PESERTA {{ ($isNew) ? "BARU" : "KELUAR" }} DANA PENSIUN</b></th>
                </tr>
            </thead>
        </table>
        <br>
        <table>
            <tr>
                <td colspan="2">PT</td>
                <td colspan="5">:&nbsp;&nbsp;<b>PT. {{ $data[0]->companyName }}</b></td>
            </tr>
            <tr>
                <td colspan="2">Keluar Mulai (Bulan / Tahun)</td>
                <td colspan="5">:&nbsp;&nbsp;<b>{{ $data[0]->period }}</b></td>
            </tr>
        </table>
        <br>
        <table style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align: center; text-align: center; border:1px solid #000;"><b>No</b></th>
                    <th rowspan="2" style="width: 200px; vertical-align: center; text-align: center; border:1px solid #000;"><b>NIK</b></th>
                    <th style="text-align: center; border:1px solid #000;"><b>No Peserta</b></th>
                    <th rowspan="2" style="width: 200px; vertical-align: center; text-align: center; border:1px solid #000;"><b>Nama Lengkap Peserta</b></th>
                    <th rowspan="2" style="width: 200px; vertical-align: center; text-align: center; border:1px solid #000;"><b>Tgl Lahir</b></th>
                    <th rowspan="2" style="width: 200px; vertical-align: center; text-align: center; border:1px solid #000;"><b>L/P</b></th>
                    <th rowspan="2" style="width: 200px; vertical-align: center; text-align: center; border:1px solid #000;"><b>Upah Pokok</b></th>
                    <th rowspan="2" style="width: 200px; vertical-align: center; text-align: center; border:1px solid #000;"><b>Keterangan</b></th>
                </tr>
                <tr>
                    <th style="vertical-align: center; text-align: center; border:1px solid #000;"><b>(Diisi bila sudah memiliki)</b></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1; 
                $totalUpah = 0;
                ?>
                @foreach($data[0]->employeeData as $value)
                <?php
                $totalUpah += $value->upahPokok;
                ?>
                <tr>
                    <td style="border:1px solid #000; ">{{ $no++ }}</td>
                    <td style="border:1px solid #000; ">{{ $value->employeeNo }}</td>
                    <td style="border:1px solid #000; ">{{ $value->danaPensiunNo }}</td>
                    <td style="border:1px solid #000; ">{{ $value->employeeName }}</td>
                    <td style="border:1px solid #000; ">{{ date('Y-m-d', strtotime($value->birthDate)) }}</td>
                    <td style="border:1px solid #000; ">{{ $value->gender }}</td>
                    <td data-format="#,##0" style="text-align: right; border:1px solid #000; ">{{ $value->upahPokok }}</td>
                    <td style="border:1px solid #000; ">{{ $value->keterangan }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6" style="border:1px solid #000; text-align: left;"><b>Total</b></td>
                    <td data-format="#,##0" style="text-align: right; border:1px solid #000;">{{ $totalUpah }}</td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2">Jakarta, {{ date('d F Y', strtotime($printDate)) }}</td>
            </tr>
        </table>
        <br><br><br><br>
        <table>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td coslpan="2" style="border-bottom: 1px solid black; text-align: center;">Veronica Dian</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td coslpan="2" style="text-align: center;">HRD</td>
            </tr>
        </table>
    @endif
</body>
</html>