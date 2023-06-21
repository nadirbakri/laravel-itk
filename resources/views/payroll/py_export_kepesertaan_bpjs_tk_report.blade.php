<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_export_data_kepesertaan_bpjs_tk.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
        .table_detail tbody tr td{
            text-align:center;
			border:1px solid #000;
			text-align:center;
            font-size:5px;
		}
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
            font-size:4.5px;
            
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    <table style="width: 100%;" class="table table-bordered table_detail">
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
                <td>{{ $value->bpjstkData->noPegawai }}</td>
                <td>{{ $value->bpjstkData->namaDepan }}</td>
                <td>{{ $value->bpjstkData->namaTengah }}</td>
                <td>{{ $value->bpjstkData->namaBelakang }}</td>
                <td>{{ $value->bpjstkData->gelar }}</td>
                <td></td>
                <td>{{ $value->bpjstkData->teleponRumah }}</td>
                <td></td>
                <td>{{ $value->bpjstkData->teleponKantor }}</td>
                <td></td>
                <td>{{ $value->bpjstkData->hp }}</td>
                <td>{{ $value->bpjstkData->email }}</td>
                <td>{{ $value->bpjstkData->tempatLahir }}</td>
                <td>{{ date('Y-m-d', strtotime($value->bpjstkData->tanggalLahir)) }}</td>
                <td>{{ $value->bpjstkData->namaIbuKandung }}</td>
                <td>{{ $value->bpjstkData->jenisIdentitas }}</td>
                <td>{{ $value->bpjstkData->noIdentitas }}</td>
                <td>{{ $value->bpjstkData->masaLakuIdentitas }}</td>
                <td>{{ $value->bpjstkData->jenisKelamin }}</td>
                <td>E</td>
                <td>{{ date('Y-m-d', strtotime($value->bpjstkData->tanggalKepesertaan)) }}</td>
                <td>{{ $value->bpjstkData->statusKawin }}</td>
                <td>{{ $value->bpjstkData->golonganDarah }}</td>
                <td>{{ $value->bpjstkData->npwp }}</td>
                <td>{{ $value->bpjstkData->kodeNegara }}</td>
                <td>{{ $value->bpjstkData->upah }}</td>
                <td>{{ $value->bpjstkData->alamat }}</td>
                <td>{{ $value->bpjstkData->kodePos }}</td>
                <td>{{ $value->bpjstkData->lokasiPekerjaan }}</td>
                <td>{{ $value->bpjstkData->statusPegawai }}</td>
                <td>{{ date('Y-m-d', strtotime($value->bpjstkData->tglAwalBekerja)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->bpjstkData->tglAkhirKontrak)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($key == array_key_last($data))
    <div class="page_break"></div>
    @endif

    <script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            $text = sprintf(_("Page %d/%d"),  $PAGE_NUM, $PAGE_COUNT);
            // Uncomment the following line if you use a Laravel-based i18n
            //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.5;  //  default
            $char_space = 0.5;  //  default
            $angle = 0.5;   //  default

            // Compute text width to center correctly
            $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

            $x = ($pdf->get_width() - $textWidth) / 2;
            $y = $pdf->get_height() - 35;

            $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script>
</body>
</html>