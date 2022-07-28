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
                <th>Masa Perolehan Awal</th>
                <th>Masa Perolehan Akhir</th>
                <th>NPWP</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Status PTKP</th>
                <th>Jumlah Tanggungan</th>
                <th>Nama Jabatan</th>
                <th>WP Luar Negeri</th>
                <th>Kode Negara</th>
                <th>Kode Pajak</th>
                <th>Jumlah 1</th>
                <th>Jumlah 2</th>
                <th>Jumlah 3</th>
                <th>Jumlah 4</th>
                <th>Jumlah 5</th>
                <th>Jumlah 6</th>
                <th>Jumlah 7</th>
                <th>Jumlah 8</th>
                <th>Jumlah 9</th>
                <th>Jumlah 10</th>
                <th>Jumlah 11</th>
                <th>Jumlah 12</th>
                <th>Jumlah 13</th>
                <th>Jumlah 14</th>
                <th>Jumlah 15</th>
                <th>Jumlah 16</th>
                <th>Jumlah 17</th>
                <th>Jumlah 18</th>
                <th>Jumlah 19</th>
                <th>Jumlah 20</th>
                <th>Status Pindah</th>
                <th>NPWP Pemotong</th>
                <th>Nama Pemotong</th>
                <th>Tanggal Bukti Potong</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
            <tr>
                <td>{{ $value->masaPajak }}</td>
                <td>{{ $value->tahunPajak }}</td>
                <td>{{ $value->pembetulan }}</td>
                <td>{{ $value->nomorBuktiPotong }}</td>
                <td>{{ $value->masaPerolehanAwal }}</td>
                <td>{{ $value->masaPerolehanAkhir }}</td>
                <td>{{ $value->npwp }}</td>
                <td>{{ $value->nik }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->jenisKelamin }}</td>
                <td>{{ $value->statusPTKP }}</td>
                <td>{{ $value->jumlahTanggungan }}</td>
                <td>{{ $value->namaJabatan }}</td>
                <td>{{ $value->wpLuarNegeri }}</td>
                <td>{{ $value->kodeNegara }}</td>
                <td>{{ $value->kodePajak }}</td>
                <td>{{ $value->jumlah1 }}</td>
                <td>{{ $value->jumlah2 }}</td>
                <td>{{ $value->jumlah3 }}</td>
                <td>{{ $value->jumlah4 }}</td>
                <td>{{ $value->jumlah5 }}</td>
                <td>{{ $value->jumlah6 }}</td>
                <td>{{ $value->jumlah7 }}</td>
                <td>{{ $value->jumlah8 }}</td>
                <td>{{ $value->jumlah9 }}</td>
                <td>{{ $value->jumlah10 }}</td>
                <td>{{ $value->jumlah11 }}</td>
                <td>{{ $value->jumlah12 }}</td>
                <td>{{ $value->jumlah13 }}</td>
                <td>{{ $value->jumlah14 }}</td>
                <td>{{ $value->jumlah15 }}</td>
                <td>{{ $value->jumlah16 }}</td>
                <td>{{ $value->jumlah17 }}</td>
                <td>{{ $value->jumlah18 }}</td>
                <td>{{ $value->jumlah19 }}</td>
                <td>{{ $value->jumlah20 }}</td>
                <td>{{ $value->statusPindah }}</td>
                <td>{{ $value->npwpPemotong }}</td>
                <td>{{ $value->namaPemotong }}</td>
                <td>{{ $value->tanggalBuktiPemotong }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>