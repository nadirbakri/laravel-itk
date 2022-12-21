<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_monthly_jamsostek_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		* { box-sizing: border-box; }
        html, body, #header {
            margin-top: 1%;
            margin-bottom: 0;
            margin-left: 2%;
            margin-right: 2%;
            padding: 0 !important;
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
	<table style="width:100%;">
		<tr>
			<td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/bpjs.png'))) }}" style="width: 170px; height: 50px;" alt="Logo"></td>
            <td>&nbsp;</td>
			<td rowspan="2" width="15%" style="font-size: 12px; text-align:center; border: 1px solid #000;">Formulir BPJS Ketenagakerjaan 2</td>
		</tr>
        <br>
        <tr>
            <td colspan="2" style="font-size: 16px; font-weight: 700; text-decoration: underline; text-align:center;">REKAPITULASI RINCIAN PEMBAYARAN IURAN</td>
        </tr>
	</table>
    <br>
    <table style="width:100%; border: 1px solid #000; border-collapse:collapse;">
        <tr style="background-color: grey;">
            <td colspan="4" style="font-size: 10px; font-weight: 700;">BAGIAN I - Perusahaan</td>
        </tr>
		<tr>
			<td rowspan="2" width="20%" style="font-size: 10px;">1. Perusahaan</td>
            <td rowspan="2" width="3%" style="font-size: 10px;">:</td>
            <td rowspan="2" width="35%" style="font-size: 10px;"></td>
            <td width="25%" style="font-size: 10px; text-align: center; border: 1px solid #000;">No. Pendaftaran (NPP)</td>
		</tr>
        <tr>
            <td width="25%" style="font-size: 10px; text-align: center; border: 1px solid #000;"></td>
		</tr>
        <tr>
			<td width="20%" style="font-size: 10px;">2. Iuran untuk bulan / tahun</td>
            <td width="3%" style="font-size: 10px;">:</td>
            <td colspan="2" width="25%" style="font-size: 10px;"></td>
		</tr>
        <tr>
			<td width="20%" style="font-size: 10px; vertical-align: top;">3. Iuran disetor melalui</td>
            <td width="3%" style="font-size: 10px; vertical-align: top;">:</td>
            <td colspan="2" width="25%" style="font-size: 9px;">
                <input type="checkbox" id="bank" name="bank" value="Bank" /> <label for="bank" style="word-wrap:break-word;"> Bank...........................................................</label><br>
                <input type="checkbox" id="kantor" name="kantor" value="Kantor BPJS Kesehatan" /> <label for="kantor" style="word-wrap:break-word;"> Kantor BPJS Kesehatan..........................</label><br>
                <input type="checkbox" id="other" name="other" value="Other" /> <label for="other" style="word-wrap:break-word;"> ..................................................................</label>
            </td>
		</tr>
	</table>
    <table class="table_detail" style="width:100%; border: 1px solid #000; border-collapse:collapse;">
        <tr style="background-color: grey;">
            <td colspan="4" style="font-size: 10px; font-weight: 700;">BAGIAN II - Rekapitulasi Tenaga Kerja dan Upah (JKK, JHT, JK)</td>
        </tr>
		<tr>
			<td rowspan="2" colspan="2" style="font-size: 10px; text-align: center;">Uraian</td>
            <td colspan="2" style="font-size: 10px; text-align: center;">Jumlah</td>
		</tr>
        <tr>
			<td style="font-size: 10px; text-align: center;">Tenaga Kerja</td>
            <td style="font-size: 10px; text-align: center;">Upah (Rp.)</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">A</td>
            <td width="30%" style="font-size: 10px; text-align: center;">Bulan lalu</td>
            <td width="30%" style="font-size: 10px; text-align: right;">{{ number_format($value->tK_A, 2, '.', ',') }}</td>
            <td width="30%" style="font-size: 10px; text-align: right;">{{ number_format($value->upah_BulanLalu, 2, '.', ',') }}</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">B</td>
            <td width="30%" style="font-size: 10px; text-align: center;">Penambahan tenaga kerja (F1a)</td>
            <td width="30%" style="font-size: 10px; text-align: right;">{{ number_format($value->tK_B, 2, '.', ',') }}</td>
            <td width="30%" style="font-size: 10px; text-align: right;">{{ number_format($value->tK_A, 2, '.', ',') }}</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">C</td>
            <td width="30%" style="font-size: 10px; text-align: center;">Pengurangan tenaga kerja (F1b)</td>
            <td width="30%" style="font-size: 10px; text-align: right;">{{ number_format($value->tK_C, 2, '.', ',') }}</td>
            <td width="30%" style="font-size: 10px; text-align: right;">{{ number_format($value->tK_A, 2, '.', ',') }}</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">D</td>
            <td width="30%" style="font-size: 10px; text-align: center;">Perubahan upah</td>
            <td width="30%" style="font-size: 10px; text-align: right;">{{ number_format($value->perubahanUpah, 2, '.', ',') }}</td>
            <td width="30%" style="font-size: 10px; text-align: right;">{{ number_format($value->perubahanUpah, 2, '.', ',') }}</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">E</td>
            <td width="30%" style="font-size: 10px; text-align: center;">Jumlah (A + B - C + D)</td>
            <td width="30%" style="font-size: 10px; text-align: right;"></td>
            <td width="30%" style="font-size: 10px; text-align: right;"></td>
		</tr>
    </table>
    <table class="table_detail" style="width:100%; border: 1px solid #000; border-collapse:collapse;">
        <tr style="background-color: grey;">
            <td colspan="5" style="font-size: 10px; font-weight: 700;">BAGIAN III - Rincian Iuran Bulan Ini</td>
        </tr>
		<tr>
			<td colspan="2" style="font-size: 10px; text-align: center; border-bottom: none;">Program</td>
            <td style="font-size: 10px; text-align: center; border-bottom: none;">Tarif</td>
            <td style="font-size: 10px; text-align: center; border-bottom: none;">Jumlah Upah (Rp.)</td>
            <td style="font-size: 10px; text-align: center; border-bottom: none;">Jumlah Iuran (Rp.)</td>
		</tr>
        <tr>
			<td colspan="2" style="font-size: 10px; text-align: center; border-top: none;">-1</td>
            <td style="font-size: 10px; text-align: center; border-top: none;">-2</td>
            <td style="font-size: 10px; text-align: center; border-top: none;">-3</td>
            <td style="font-size: 10px; text-align: center; border-top: none;">(4) = (2) x (3)</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">A</td>
            <td width="20%" style="font-size: 10px; text-align: center;">Jaminan Kecelakaan Kerja (JKK)</td>
            <td width="10%" style="font-size: 10px; text-align: center;">{{ $value->jkk }}%</td>
            <td width="20%" style="font-size: 10px; text-align: right;">{{ number_format($value->upah_A, 2, '.', ',') }}</td>
            <td width="20%" style="font-size: 10px; text-align: right;"></td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">B</td>
            <td width="20%" style="font-size: 10px; text-align: center;">Jaminan Hari Tua (JHT)</td>
            <td width="10%" style="font-size: 10px; text-align: center;">{{ $value->jht }}%</td>
            <td width="20%" style="font-size: 10px; text-align: right;">{{ number_format($value->upah_B, 2, '.', ',') }}</td>
            <td width="20%" style="font-size: 10px; text-align: right;"></td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">C</td>
            <td width="20%" style="font-size: 10px; text-align: center;">Jaminan Kematian (JK)</td>
            <td width="10%" style="font-size: 10px; text-align: center;">{{ $value->jk }}%</td>
            <td width="20%" style="font-size: 10px; text-align: right;">{{ number_format($value->upah_C, 2, '.', ',') }}</td>
            <td width="20%" style="font-size: 10px; text-align: right;"></td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">D</td>
            <td width="20%" style="font-size: 10px; text-align: center;">Jaminan Pensiun (JP)</td>
            <td width="10%" style="font-size: 10px; text-align: center;">{{ $value->jp }}%</td>
            <td width="20%" style="font-size: 10px; text-align: right;">{{ number_format($value->upah_JP, 2, '.', ',') }}</td>
            <td width="20%" style="font-size: 10px; text-align: right;"></td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">E</td>
            <td width="20%" style="font-size: 10px; text-align: center;">Jumlah (A + B + C + D)</td>
            <td width="10%" style="font-size: 10px; text-align: center;"></td>
            <td width="20%" style="font-size: 10px; text-align: right;"></td>
            <td width="20%" style="font-size: 10px; text-align: right;"></td>
		</tr>
	</table>
    <table class="table_detail" style="width:100%; border: 1px solid #000; border-collapse:collapse;">
        <tr style="background-color: grey;">
            <td colspan="3" style="font-size: 10px; font-weight: 700;">BAGIAN IV - Kekurangan/Kelebihan **) iuran untuk bulan : Tahun : </td>
        </tr>
		<tr>
			<td colspan="2" style="font-size: 10px; text-align: center; border-bottom: none;">Uraian</td>
            <td style="font-size: 10px; text-align: center; border-bottom: none;">Jumlah Iuran (Rp.)</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">A</td>
            <td width="40%" style="font-size: 10px; text-align: center;">Jaminan Kecelakaan Kerja (JKK)</td>
            <td width="40%" style="font-size: 10px; text-align: right;">{{ number_format($value->iuranJKK, 2, '.', ',') }}</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">B</td>
            <td width="40%" style="font-size: 10px; text-align: center;">Jaminan Hari Tua (JHT)</td>
            <td width="40%" style="font-size: 10px; text-align: right;">{{ number_format($value->iuranJHT, 2, '.', ',') }}</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">C</td>
            <td width="40%" style="font-size: 10px; text-align: center;">Jaminan Kematian (JK)</td>
            <td width="40%" style="font-size: 10px; text-align: right;">{{ number_format($value->iuranJK, 2, '.', ',') }}</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">D</td>
            <td width="40%" style="font-size: 10px; text-align: center;">Jaminan Pensiun (JP)</td>
            <td width="40%" style="font-size: 10px; text-align: right;">{{ number_format($value->iuranJP, 2, '.', ',') }}</td>
		</tr>
        <tr>
			<td width="10%" style="font-size: 10px; text-align: center;">E</td>
            <td width="40%" style="font-size: 10px; text-align: center;">Jumlah (A + B + C + D)</td>
            <td width="40%" style="font-size: 10px; text-align: right;">{{ number_format(($value->iuranJKK + $value->iuranJHT + $value->iuranJK + $value->iuranJP), 2, '.', ',') }}</td>
		</tr>
        <tr style="background-color: grey;">
            <td colspan="3" style="font-size: 10px; font-weight: 700;">BAGIAN V - Denda Iuran</td>
        </tr>
        <tr>
			<td colspan="2" style="font-size: 10px; text-align: left;">Jumlah Denda Iuran</td>
            <td style="font-size: 10px; text-align: right;"></td>
		</tr>
        <tr style="background-color: grey;">
            <td colspan="3" style="font-size: 10px; font-weight: 700;">BAGIAN VI - Jumlah Seluruhnya</td>
        </tr>
        <tr>
			<td colspan="2" style="font-size: 10px; text-align: left;">Jumlah Seluruhnya (III + IV + V)</td>
            <td style="font-size: 10px; text-align: right;"></td>
		</tr>
	</table>
    <br><br>
    <table style="width:100%; border-collapse:collapse;">
        <tr>
            <td width="50%" style="font-size: 10px; border-bottom: 1px solid #000; text-align: left;"></td>
            <td width="20%" style="font-size: 10px; border-bottom: 1px solid #000; text-align: left;"></td>
            <td width="5%" >&nbsp;</td>
            <td width="20%" style="font-size: 10px; border-bottom: 1px solid #000; text-align: center;">xx/xx/xxxx</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="font-size: 10px; border-top: 1px solid #000; text-align: left;">Nama dan tanda tangan pimpinan perusahaan</td>
            <td style="font-size: 10px; border-top: 1px solid #000; text-align: left;">Jabatan</td>
            <td>&nbsp;</td>
            <td style="font-size: 10px; border-top: 1px solid #000; text-align: center;">Tanggal</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <br>
    <table style="width:100%; font-size: 10px;">
        <tr>
            <td>Keterangan :</td>
        </tr>
        <tr>
            <td>1. TKL = Lajang &nbsp;&nbsp;&nbsp;&nbsp; TK Kel = Berkeluarga</td>
        </tr>
        <tr>
            <td>2. *) Upah diatas Rp. 1 Juta dihitung Rp. 1 Juta</td>
        </tr>
        <tr>
            <td>3. Formulir BPJS Ketenagakerjaan 2 wajib diisi setiap bulan dan diserahkan kepada BPJS Ketenagakerjaan bersamaan</td>
        </tr>
        <tr>
            <td>dengan pembayaran iuran serta dilampirkan dengan :</td>
        </tr>
        <tr>
            <td>a. Formulir BPJS Ketenagakerjaan 1a bila ada penambahan tenaga kerja</td>
        </tr>
        <tr>
            <td>b. Formulir BPJS Ketenagakerjaan 1b bila ada pengurangan tenaga kerja</td>
        </tr>
        <tr>
            <td>c. Formulir BPJS Ketenagakerjaan 2a bila terjadi perubahan upah dan jumlah tenaga kerja</td>
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