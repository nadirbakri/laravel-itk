<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_spt_pph_report.judul') }}</title>
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
	<table style="width:100%; border-collapse:collapse;">
		<tr>
			<td style="border-right: 2px solid #000;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/LogoFormulir1721A1.PNG'))) }}" style="width: 190px; height: 80px;" alt="Logo"></td>
            <td style="font-size: 13px; font-weight: 700; text-align:center; border-right: 2px solid #000;">BUKTI PEMOTONGAN PAJAK PENGHASILAN<br>PASAL 21 BAGI PEGAWAI TETAP ATAU<br>PENERIMA PENSIUN ATAU TUNJANGAN HARI<br>TUA/JAMINAN HARI TUA BERKALA<br><br></td>
			<td colspan="2" style="font-size: 13px; font-weight: 700; text-align:center; border-left: 2px solid #000;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/LogoKananSPT1721A.PNG'))) }}" style="width: 170px; height: 90px;" alt="Logo"></td>
		</tr>
        <tr>
			<td width="26%" style="font-size: 12px; font-weight: 700; text-align:center; border-right: 2px solid #000;">KEMENTERIAN KEUANGAN RI<br>DIREKTORAT JENDERAL<br>PAJAK</td>
            <td width="50%" style="font-size: 12px; font-weight: 700; padding-left: 20px; border-top: 2px solid #000;">NOMOR : 1.1-12.21-000000001</td>
            <td width="7%" style="border-top: 2px solid #000; border-right: 2px solid #000;">&nbsp;</td>
            <td width="23%" style="font-size: 12px; text-align: center;"><div style="text-decoration: underline; display:inline;">{{ date('m', strtotime('2020-' . $value->masaAwal . '-01')) }}</div> - <div style="text-decoration: underline; display:inline;">{{ date('m', strtotime('2020-' . $value->masaAkhir . '-01')) }}</div></td>
        </tr>
	</table>
    <table style="width:100%; border: 1px solid #000;">
		<tr>
            <?php $arr_npwp = explode("-", $value->companyNPWP); ?>
			<td width="12%" style="font-size: 11px; font-weight: 700;">NPWP PEMOTONG</td>
            <td width="3%" style="font-size: 11px; font-weight: 700;">:</td>
            @if(count($arr_npwp) > 1)
			<td width="20%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp[0] }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp[1] }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%"style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp[1] }}</td>
            @else
            <td width="20%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->companyNPWP }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;"> </td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%"style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;"> </td>
            @endif
            <td style="font-size: 11px; font-weight: 700;">&nbsp;</td>
		</tr>
        <tr>
            <td style="font-size: 11px; font-weight: 700;">NAMA PEMOTONG</td>
            <td style="font-size: 11px; font-weight: 700; ">:</td>
			<td colspan="6" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->companyName }}</td>
        </tr>
	</table>
    <br>
    <div style="font-size: 11px; font-weight: 700;">A. IDENTITAS PENERIMA PENGHASILAN YANG DIPOTONG</div>
    <table style="width:100%; border: 1px solid #000;">
		<tr>
            <?php $arr_npwp2 = explode("-", $value->taxRegisteredNo); ?>
			<td width="15%" style="font-size: 10px; font-weight: 700;">1. NPWP</td>
            <td width="3%" style="font-size: 10px; font-weight: 700; ">:</td>
            @if(count($arr_npwp2) > 1)
			<td width="20%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp2[0] }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp2[1] }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%"style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp2[1] }}</td>
            @else
			<td width="20%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->taxRegisteredNo }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;"> </td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%"style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;"> </td>
            @endif
            <td colspan="8" style="font-size: 10px; font-weight: 700;">6. STATUS / JUMLAH TANGGUNGAN KELUARGA UNTUK PTKP</td>
		</tr>
        <tr>
            <td style="font-size: 10px; font-weight: 700;">2. NIK / NO PASPOR</td>
            <td style="font-size: 10px; font-weight: 700; ">:</td>
			<td colspan="5" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->idNo }}</td>
            <td width="2%" style="font-size: 10px; font-weight: 700;">K/</td>
            <td width="5%" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;"></td>
            <td width="2%" style="font-size: 10px; font-weight: 700;">TK/</td>
            <td width="5%" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;"></td>
            <td width="2%" style="font-size: 10px; font-weight: 700;">HB/</td>
            <td width="5%" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;"></td>
            <td colspan="2" style="font-size: 10px; font-weight: 700;"></td>
        </tr>
        <tr>
            <td style="font-size: 10px; font-weight: 700;">3. NAMA</td>
            <td style="font-size: 10px; font-weight: 700; ">:</td>
			<td colspan="5" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->employeeName }}</td>
            <td width="20%" colspan="6" style="font-size: 10px; font-weight: 700;">7. NAMA JABATAN</td>
            <td width="3%" style="font-size: 10px; font-weight: 700; ">:</td>
            <td width="17%" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->namaJabatan }}</td>
        </tr>
        <tr>
            <td style="font-size: 10px; font-weight: 700;">4. ALAMAT</td>
            <td style="font-size: 10px; font-weight: 700; ">:</td>
			<td colspan="5" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->alamat }}</td>
            <td width="20%" colspan="6" style="font-size: 10px; font-weight: 700;">8. KARYAWAN ASING</td>
            <td width="3%" style="font-size: 10px; font-weight: 700; ">:</td>
            <td width="17%" style="font-size: 10px; font-weight: 700;">
            @if($value->flagIsExpat)
            <input type="checkbox" id="karyawan_asing" name="karyawan_asing" value="Karyawan Asing" checked/> <label for="karyawan_asing" style="word-wrap:break-word;"> Ya</label>
            @else
            <input type="checkbox" id="karyawan_asing" name="karyawan_asing" value="Karyawan Asing" /> <label for="karyawan_asing" style="word-wrap:break-word;"> Ya</label>
            @endif
            </td>
        </tr>
        <tr>
            <td style="font-size: 10px; font-weight: 700;">5. JENIS KELAMIN</td>
            <td style="font-size: 10px; font-weight: 700; ">:</td>
			<td colspan="5" style="font-size: 10px; font-weight: 700;">
            @if($value->gender == "M")
            <input type="checkbox" id="laki_laki" name="laki_laki" value="Laki-laki" checked/> <label for="laki_laki" style="word-wrap:break-word;"> LAKI-LAKI</label>
            <input type="checkbox" id="perempuan" name="perempuan" value="Perempuan" /> <label for="perempuan" style="word-wrap:break-word;"> PEREMPUAN</label>
            @else
            <input type="checkbox" id="laki_laki" name="laki_laki" value="Laki-laki" /> <label for="laki_laki" style="word-wrap:break-word;"> LAKI-LAKI</label>
            <input type="checkbox" id="perempuan" name="perempuan" value="Perempuan" checked/> <label for="perempuan" style="word-wrap:break-word;"> PEREMPUAN</label>
            @endif
            </td>
            <td width="20%" colspan="6" style="font-size: 10px; font-weight: 700;">9. KODE NEGARA DOMISILI</td>
            <td width="3%" style="font-size: 10px; font-weight: 700; ">:</td>
            <td width="17%" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->nationalityCode }}</td>
        </tr>
	</table>
    <br>
    <div style="font-size: 11px; font-weight: 700;">B. RINCIAN PENGHASILAN DAN PERHITUNGAN PPh PASAL 21</div>
    <table class="table_detail" style="width:100%;">
		<tr>
			<td colspan="2" style="font-size: 10px; font-weight: 700; text-align: center;">URAIAN</td>
            <td style="font-size: 10px; font-weight: 700; text-align: center;">JUMLAH (Rp)</td>
		</tr>
        <tr>
            <td colspan="2" style="font-size: 10px; font-weight: 700;">KODE OBJEK PAJAK : 
            @if($value->taxStatus == null)
            <input type="checkbox" id="tipe1" name="tipe1" value="Tipe 1" checked/> <label for="tipe1" style="word-wrap:break-word;"> 21-100-01</label>
            <input type="checkbox" id="tipe2" name="tipe2" value="Tipe 2" /> <label for="tipe2" style="word-wrap:break-word;"> 21-100-02</label>
            @else
            <input type="checkbox" id="tipe1" name="tipe1" value="Tipe 1" /> <label for="tipe1" style="word-wrap:break-word;"> 21-100-01</label>
            <input type="checkbox" id="tipe2" name="tipe2" value="Tipe 2" checked/> <label for="tipe2" style="word-wrap:break-word;"> 21-100-02</label>
            @endif
            </td>
			<td style="font-size: 10px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 10px; font-weight: 700;">PENGHASILAN BRUTO : </td>
			<td style="font-size: 10px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td width="5%" style="font-size: 10px;">1.</td>
            <td width="75%" style="font-size: 10px;">GAJI/PENSIUN ATAU THT/JHT</td>
			<td width="20%" style="font-size: 10px; text-align: right;"> {{ number_format($value->c1, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">2.</td>
            <td  style="font-size: 10px;">TUNJANGAN PPh</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c2, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">3.</td>
            <td  style="font-size: 10px;">TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c3, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">4.</td>
            <td  style="font-size: 10px;">HONORARIUM DAN IMBALAN LAIN SEJENISNYA</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c4, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">5.</td>
            <td  style="font-size: 10px;">PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c5, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">6.</td>
            <td  style="font-size: 10px;">PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c6, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">7.</td>
            <td  style="font-size: 10px;">TANTIEM, BONUS, GRATIFIKASI , JASA PRODUKSI DAN THR</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c7, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">8.</td>
            <td  style="font-size: 10px;">JUMLAH PENGHASILAN BRUTO (1 S.D. 7)</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c8, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 10px; font-weight: 700;">PENGURANGAN : </td>
			<td style="font-size: 10px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">9.</td>
            <td  style="font-size: 10px;">BIAYA JABATAN/BIAYA PENSIUN</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c9, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">10.</td>
            <td  style="font-size: 10px;">IURAN PENSIUN ATAU THT/JHT</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c10, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">11.</td>
            <td  style="font-size: 10px;">JUMLAH PENGURANGAN (9 S.D. 10)</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c11, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 10px; font-weight: 700;">PERHITUNGAN PPh PASAL 21 : </td>
			<td style="font-size: 10px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">12.</td>
            <td  style="font-size: 10px;">JUMLAH PENGHASILAN NETO (8 - 11)</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c12, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">13.</td>
            <td  style="font-size: 10px;">PENGHASILAN NETO MASA SEBELUMNYA</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c13, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">14.</td>
            <td  style="font-size: 10px;">JUMLAH PENGHASILAN NETO UNTUK PERHITUNGAN PPh PASAL 21 (SETAHUN/DISETAHUNKAN)</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c14, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">15.</td>
            <td  style="font-size: 10px;">PENGHASILAN TIDAK KENA PAJAK (PTKP)</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c15, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">16.</td>
            <td  style="font-size: 10px;">PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN (14 - 15)</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c16, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">17.</td>
            <td  style="font-size: 10px;">PPh PASAL 21 ATAS PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c17, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">18.</td>
            <td  style="font-size: 10px;">PPh PASAL 21 YANG DIPOTONG MASA SEBELUMNYA</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c18, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">19.</td>
            <td  style="font-size: 10px;">PPh PASAL 21 TERUTANG</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c19, 0, '.', ',') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 10px;">20.</td>
            <td  style="font-size: 10px;">PPh PASAL 21 DAN PPh PASAL 26 YANG TELAH DIPOTONG DAN DILUNASI</td>
			<td  style="font-size: 10px; text-align: right;"> {{ number_format($value->c20, 0, '.', ',') }}</td>
        </tr>
	</table>
    <br>
    <div style="font-size: 12px; font-weight: 700;">C. IDENTITAS PEMOTONG</div>
    <table style="width:100%; border: 1px solid #000;">
		<tr>
            <?php $arr_npwp3 = explode("-", $value->signerNPWP); ?>
			<td width="15%" style="font-size: 10px; font-weight: 700;">1. NPWP</td>
            <td width="3%" style="font-size: 10px; font-weight: 700; ">:</td>
			@if(count($arr_npwp3) > 1)
			<td width="20%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp3[0] }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp3[1] }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%"style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $arr_npwp3[1] }}</td>
            @else
            <td width="20%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->signerNPWP }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;"> </td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="8%"style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;"> </td>
            @endif
            <td colspan="5" width="20%" style="font-size: 10px; font-weight: 700;">3. TANGGAL & TANDA TANGAN</td>
            <td rowspan="2" style="font-size: 10px; font-weight: 700;">
            <table style="width: 100%; height: 4%; border: 1px solid #000;">
            </table>
            </td>
		</tr>
        <tr>
            <td style="font-size: 10px; font-weight: 700;">2. NAMA</td>
            <td style="font-size: 10px; font-weight: 700; ">:</td>
			<td colspan="5" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->signerName }}</td>
            <td width="5%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ date('d', strtotime($value->printDate)) }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="5%" style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ date('m', strtotime($value->printDate)) }}</td>
            <td width="1%" style="font-size: 11px; font-weight: 700;">-</td>
            <td width="5%"style="font-size: 11px; font-weight: 700; border-bottom: 1px solid #000;">{{ date('Y', strtotime($value->printDate)) }}</td>
        </tr>
	</table>
    <br>
	<table style="width:100%;">
		<tr>
			<td width="90%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/LogoFormulir1721A1Bottom1.png'))) }}" style="width: 70px; height: 10px;" alt="Logo"></td>
			<td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/LogoFormulir1721A1Bottom2.png'))) }}" style="width: 90px; height: 10px;" alt="Logo"></td>
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