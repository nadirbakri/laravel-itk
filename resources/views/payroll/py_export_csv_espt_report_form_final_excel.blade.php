<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_csv_espt_report_form.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
            margin: 0;
            padding: 0;
		}
		.table_detail td{
			text-align:center;
            padding: 3px;
		}
		.table_detail th{
            padding:4px;
		}
		.table_detail{
			border-collapse:collapse;
		}

        @page { margin-left: 0px; margin-right: 0px; margin-bottom: 150px; size: auto; }
        /* header { position: fixed; left: 0px; top: -90px; right: 0px; height: 150px; text-align: center; } */
        footer { position: absolute; left: 25px; bottom: -85px; right: 0px; height: 150px; }
        table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto; margin: 4px 0 4px 0; }
        td    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group }
	</style>
</head>
<body>
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th>Masa Pajak</th>
                <th>Tahun Pajak</th>
                <th>Pembetulan</th>
                <th>Nomor Bukti Potong</th>
                <th>NPWP</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kode Pajak</th>
                <th>Jumlah Bruto</th>
                <th>Tarif</th>
                <th>Jumlah PPh</th>
                <th>NPWP Pemotong</th>
                <th>Nama Pemotong</th>
                <th>Tanggal Bukti Potong</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->periodMonth }}</td>
                <td>{{ $value->periodYear }}</td>
                <td>{{ $value->pembetulan }}</td>
                <td>{{ $value->nomorBuktiPotong }}</td>
                <td>{{ $value->taxRegisteredNo }}</td>
                <td>{{ $value->idNo }}</td>
                <td>{{ $value->employeeName }}</td>
                <td>{{ $value->homeAddress }}</td>
                <td>{{ $value->kodePajak }}</td>
                <td>{{ $value->jumlahBruto }}</td>
                <td>{{ $value->tarif }}</td>
                <td>{{ $value->jumlahPPH }}</td>
                <td>{{ $value->npwpPemotong }}</td>
                <td>{{ $value->namaPemotong }}</td>
                <td>{{ $value->tanggalBuktiPotong }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>