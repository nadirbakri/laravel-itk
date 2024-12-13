<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_spt_pph_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		* { box-sizing: border-box; }
		html, body, #header {
            margin-top: 1%;
            margin-bottom: 0;
            margin-left: 1%;
            margin-right: 1%;
            padding: 0 !important;
            border-top:1px dashed #999;
            font-family: Arial, Helvetica, sans-serif;
        }
		.table_detail td{
			border:1px solid #000;
            padding: 4px;
		}
		.table_detail th{
			border:1px solid #000;
		}
		.table_detail{
			border-collapse:collapse;
		}
        label,input{
            display: inline-block;
            vertical-align: middle;
        }

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
    @foreach($data as $key => $value)
	<table style="width:100%; border-collapse:collapse; padding-bottom: 7px;">
		<tr>
			<td style="border-right: 2px solid #000;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/LogoFormulir1721A1.PNG'))) }}" style="width: 170px; height: 70px;" alt="Logo"></td>
            <td colspan="5" style="font-size: 10px; font-weight: 700; text-align:center; border-right: 2px solid #000;">DAFTAR PEMOTONGAN PENGHASILAN PASAL 21 BAGI PEGAWAI TETAP ATAU PENERIMA PENSIUN ATAU<br>TUNJANGAN HARI TUA/JAMINAN HARI TUA BERKALA SERTA BAGI PEGAWAI NEGERI SIPIL, ANGGOTA TENTARA NASIONAL<br> INDONESIA, ANGGOTA POLISI REPUBLIK INDONESIA, PEJABAT NEGARA DAN PENSIUNANNYA<br></td>
			<td rowspan="2" style="font-size: 10px; font-weight: 700; text-align:center; border-left: 2px solid #000; border-bottom: 2px solid #000;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/RightHeaderSPT1721AAnnual.PNG'))) }}" style="width: 120px; height: 90px; position: absolute; top: 9;" alt="Logo"></td>
		</tr>
        <tr>
			<td width="17%" style="font-size: 10px; font-weight: 700; text-align:center; border-right: 2px solid #000; border-bottom: 2px solid #000;">KEMENTERIAN KEUANGAN RI<br>DIREKTORAT JENDERAL PAJAK</td>
            <td width="10%" style="font-size: 10px; font-weight: 700; padding-left: 20px; border-top: 2px solid #000; border-bottom: 2px solid #000;">MASA PAJAK : <br>(mm-yyyy)</td>
            <td width="10%" style="font-size: 10px; border-top: 2px solid #000; border-right: 2px solid #000; border-bottom: 2px solid #000;"><div style="text-decoration: underline; display:inline;">{{ date('m', strtotime($value->periodYear . '-' . $value->periodMonth . '-01')) }}</div> - <div style="text-decoration: underline; display:inline;">{{ date('y', strtotime($value->periodYear . '-' . $value->periodMonth . '-01')) }}</div></td>
            <td width="20%" style="font-size: 10px; font-weight: 700; padding-left: 20px; border-top: 2px solid #000; border-right: 2px solid #000; border-bottom: 2px solid #000;">
            @if($type == 'periodical')
            <input type="checkbox" id="masa_pajak" name="masa_pajak" value="Masa Pajak" checked/> <label for="masa_pajak" style="word-wrap:break-word;"> Satu Masa Pajak</label><br>
            <input type="checkbox" id="tahun_pajak" name="tahun_pajak" value="Tahun Pajak" /> <label for="tahun_pajak" style="word-wrap:break-word;"> Satu Tahun Pajak</label>
            @else
            <input type="checkbox" id="masa_pajak" name="masa_pajak" value="Masa Pajak" /> <label for="masa_pajak" style="word-wrap:break-word;"> Satu Masa Pajak</label><br>
            <input type="checkbox" id="tahun_pajak" name="tahun_pajak" value="Tahun Pajak" checked/> <label for="tahun_pajak" style="word-wrap:break-word;"> Satu Tahun Pajak</label>
            @endif
            </td>
            <?php $arr_npwp = explode("-", $value->npwpPemotong); ?>
            <td width="10%" style="font-size: 10px; font-weight: 700; padding-left: 20px; border-top: 2px solid #000; border-bottom: 2px solid #000;">NPWP PEMOTONG : </td>
            @if(count($arr_npwp) > 1)
            <td width="22%" style="font-size: 10px; border-top: 2px solid #000; border-right: 2px solid #000; border-bottom: 2px solid #000;"><div style="text-decoration: underline; display:inline;">{{ $arr_npwp[0] }}</div> - <div style="text-decoration: underline; display:inline;">{{ $arr_npwp[1] }}</div> - <div style="text-decoration: underline; display:inline;">{{ $arr_npwp[2] }}</div></td>
            @else
            <td width="22%" style="font-size: 10px; border-top: 2px solid #000; border-right: 2px solid #000; border-bottom: 2px solid #000; text-decoration: underline;">{{ $value->npwpPemotong }}</td>
            @endif
        </tr>
	</table>
    <table class="table_detail" style="width:100%;">
		<tr>
			<td rowspan="{{ count($value->detail) + 4 }}" style="font-size: 10px; text-align: center; vertical-align: text-top;">A</td>
            <td colspan="10" style="font-size: 10px; text-align: left;">PEGAWAI TETAP DAN PENERIMA PENSIUN ATAU THT/HJT SERTA PNS, ANGGOTA TNI/POLRI, PEJABAT NEGARA DAN PENSIUNANNYA YANG PENGHASILANNYA MELEBIHI PENGHASILAN TIDAK KENA PAJAK (PTKP)</td>
		</tr>
        <tr>
            <td width="3%" rowspan="2" style="font-size: 10px; text-align: center;">NO</td>
            <td width="10%" rowspan="2" style="font-size: 10px; text-align: center;">NPWP</td>
			<td width="12%" rowspan="2" style="font-size: 10px; text-align: center;">NAMA</td>
            <td colspan="2" style="font-size: 10px; text-align: center;">BUKTI PEMOTONGAN</td>
            <td width="8%" rowspan="2" style="font-size: 10px; text-align: center;">KODE OBJEK PAJAK</td>
			<td width="12%" rowspan="2" style="font-size: 10px; text-align: center;">JUMLAH PENGHASILAN BRUTO (Rp)</td>
            <td width="10%" rowspan="2" style="font-size: 10px; text-align: center;">PPh DIPOTONG</td>
            <td width="8%" rowspan="2" style="font-size: 10px; text-align: center;">MASA PEROLEHAN PENGHASILAN</td>
			<td width="10%" rowspan="2" style="font-size: 10px; text-align: center;">KODE NEGARA DOMISILI</td>
        </tr>
        <tr>
            <td width="10%" style="font-size: 10px; text-align: center;">NOMOR</td>
            <td width="10%" style="font-size: 10px; text-align: center;">TANGGAL (dd-mm-yyyy)</td>
        </tr>
        <tr style="background-color: grey;">
            <td style="font-size: 10px; text-align: center;">(1)</td>
            <td style="font-size: 10px; text-align: center;">(2)</td>
			<td style="font-size: 10px; text-align: center;">(3)</td>
            <td style="font-size: 10px; text-align: center;">(4)</td>
            <td style="font-size: 10px; text-align: center;">(5)</td>
			<td style="font-size: 10px; text-align: center;">(6)</td>
            <td style="font-size: 10px; text-align: center;">(7)</td>
            <td style="font-size: 10px; text-align: center;">(8)</td>
			<td style="font-size: 10px; text-align: center;">(9)</td>
            <td style="font-size: 10px; text-align: center;">(10)</td>
        </tr>
        <?php
        $totalPenghasilanBruto = 0;
        $totalPPhDipotong = 0;
        ?>
        @foreach($value->detail as $key2 => $value2)
        <?php 
        $totalPenghasilanBruto += $value2->jumlahPenghasilanBruto;
        $totalPPhDipotong += $value2->pPhDipotong; 
        ?>
        <tr>
            <td style="font-size: 10px; text-align: center;">{{ ($key2 + 1) }}</td>
            <td style="font-size: 10px; text-align: left;">{{ $value2->npwp }}</td>
			<td style="font-size: 10px; text-align: left;">{{ $value2->nama }}</td>
            <td style="font-size: 10px; text-align: center;">{{ $value2->nomor }}</td>
            <td style="font-size: 10px; text-align: center;">{{ date('d-m-Y', strtotime($value2->tanggal)) }}</td>
			<td style="font-size: 10px; text-align: center;">{{ $value2->kodeObjekPajak }}</td>
            <td style="font-size: 10px; text-align: right;">{{ number_format($value2->jumlahPenghasilanBruto, 2, '.', ',') }}</td>
            <td style="font-size: 10px; text-align: right;">{{ number_format($value2->pPhDipotong, 2, '.', ',') }}</td>
			<td style="font-size: 10px; text-align: center;">{{ $value2->masaPerolehanPenghasilan }}</td>
            <td style="font-size: 10px; text-align: center;">{{ $value2->kodeNegaraDomisili }}</td>
        </tr>
        @endforeach
        <tr>
            <td style="font-size: 10px; text-align: center;">&nbsp;</td>
            <td colspan="6" style="font-size: 10px; text-align: center;">JUMLAH A (PENJUMLAHAN ANGKA 1 S.D.ANGKA 20)</td>
			<td style="font-size: 10px; text-align: right;">{{ number_format($totalPenghasilanBruto, 2, '.', ',') }}</td>
            <td style="font-size: 10px; text-align: right;">{{ number_format($totalPPhDipotong, 2, '.', ',') }}</td>
            <td style="font-size: 10px; text-align: center; background-color: grey;">&nbsp;</td>
			<td style="font-size: 10px; text-align: center; background-color: grey;">&nbsp;</td>
        </tr>
        <tr>
            <td style="font-size: 10px; text-align: center;">B</td>
            <td colspan="5" style="font-size: 10px; text-align: left; border-right-style: none;">PEGAWAI TETAP DAN PENERIMA PENSIUN ATAU THT/JHT SERTA PNS, ANGGOTA TNI/POLRI, PEJABAT NEGARA DAN PENSIUNANNYA YANG PENGHASILANNYA TIDAK MELEBIHI PTKP</td>
			<td style="font-size: 10px; text-align: left; text-decoration: underline; border-left-style: none;">: {{ $value->pegawaiTidakMelebihiPTKP }} ORANG</td>
            <td style="font-size: 10px; text-align: right;">{{ number_format($value->jumlahBrutoTidakMelebihiPTKP, 2, '.', ',') }}</td>
            <td style="font-size: 10px; text-align: center; background-color: grey;">&nbsp;</td>
			<td style="font-size: 10px; text-align: center; background-color: grey;">&nbsp;</td>
            <td style="font-size: 10px; text-align: center; background-color: grey;">&nbsp;</td>
        </tr>
        <tr>
            <td style="font-size: 10px; text-align: center;">C</td>
            <td colspan="6" style="font-size: 10px; text-align: left;">TOTAL (JUMLAH A+B)</td>
			<td style="font-size: 10px; text-align: right;">{{ number_format(($totalPenghasilanBruto + $value->jumlahBrutoTidakMelebihiPTKP), 2, '.', ',') }}</td>
            <td style="font-size: 10px; text-align: right;">{{ number_format($totalPPhDipotong, 2, '.', ',') }}</td>
            <td style="font-size: 10px; text-align: center; background-color: grey;">&nbsp;</td>
			<td style="font-size: 10px; text-align: center; background-color: grey;">&nbsp;</td>
        </tr>
    </table>

    @if($key != array_key_last($data))
    <div class="page_break"></div>
    @endif
    @endforeach
   
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