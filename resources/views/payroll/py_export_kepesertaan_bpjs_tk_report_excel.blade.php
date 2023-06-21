<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_export_data_kepesertaan_bpjs_tk.judul') }}</title>
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
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th>NO_PEGAWAI</th>
                <th>NAMA_DEPAN</th>
                <th>NAMA_TENGAH</th>
                <th>NAMA_BELAKANG</th>
                <th>GELAR</th>
                <th>TELEPON_AREA_RUMAH</th>
                <th>TELEPON_RUMAH</th>
                <th>TELEPON_AREA_KANTOR</th>
                <th>TELEPON_KANTOR</th>
                <th>TELEPON_EXT_KANTOR</th>
                <th>HP</th>
                <th>EMAIL</th>
                <th>TEMPAT_LAHIR</th>
                <th>TANGGAL_LAHIR</th>
                <th>NAMA_IBU_KANDUNG</th>
                <th>JENIS_IDENTITAS</th>
                <th>NOMOR_IDENTITAS</th>
                <th>MASA_LAKU_IDENTITAS</th>
                <th>JENIS_KELAMIN</th>
                <th>SURAT_MENYURAT_KE</th>
                <th>TANGGAL_KEPESERTAAN</th>
                <th>STATUS_KAWIN</th>
                <th>GOLONGAN_DARAH</th>
                <th>NPWP</th>
                <th>KODE_NEGARA</th>
                <th>UPAH</th>
                <th>ALAMAT</th>
                <th>KODE_POS</th>
                <th>LOKASI_PEKERJAAN</th>
                <th>STATUS_PEGAWAI</th>
                <th>TGL_AWAL_BEKERJA</th>
                <th>TGL_AKHIR_KONTRAK</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
            <tr>
                <th>{{ $value->bpjstkData->noPegawai }}</th>
                <th>{{ $value->bpjstkData->namaDepan }}</th>
                <th>{{ $value->bpjstkData->namaTengah }}</th>
                <th>{{ $value->bpjstkData->namaBelakang }}</th>
                <th>{{ $value->bpjstkData->gelar }}</th>
                <th></th>
                <th>{{ $value->bpjstkData->teleponRumah }}</th>
                <th></th>
                <th>{{ $value->bpjstkData->teleponKantor }}</th>
                <th></th>
                <th>{{ $value->bpjstkData->hp }}</th>
                <th>{{ $value->bpjstkData->email }}</th>
                <th>{{ $value->bpjstkData->tempatLahir }}</th>
                <th>{{ date('Y-m-d', strtotime($value->bpjstkData->tanggalLahir)) }}</th>
                <th>{{ $value->bpjstkData->namaIbuKandung }}</th>
                <th>{{ $value->bpjstkData->jenisIdentitas }}</th>
                <th>{{ $value->bpjstkData->noIdentitas }}</th>
                <th>{{ $value->bpjstkData->masaLakuIdentitas }}</th>
                <th>{{ $value->bpjstkData->jenisKelamin }}</th>
                <th>E</th>
                <th>{{ date('Y-m-d', strtotime($value->bpjstkData->tanggalKepesertaan)) }}</th>
                <th>{{ $value->bpjstkData->statusKawin }}</th>
                <th>{{ $value->bpjstkData->golonganDarah }}</th>
                <th>{{ $value->bpjstkData->npwp }}</th>
                <th>{{ $value->bpjstkData->kodeNegara }}</th>
                <th>{{ $value->bpjstkData->upah }}</th>
                <th>{{ $value->bpjstkData->alamat }}</th>
                <th>{{ $value->bpjstkData->kodePos }}</th>
                <th>{{ $value->bpjstkData->lokasiPekerjaan }}</th>
                <th>{{ $value->bpjstkData->statusPegawai }}</th>
                <th>{{ date('Y-m-d', strtotime($value->bpjstkData->tglAwalBekerja)) }}</th>
                <th>{{ date('Y-m-d', strtotime($value->bpjstkData->tglAkhirKontrak)) }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>