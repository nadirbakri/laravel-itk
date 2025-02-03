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
            margin-left: 2%;
            margin-right: 2%;
            padding: 0 !important;
            /* border-top:1px dashed #999; */
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
        .table_detail td table {
            border: none; /* Remove border for the inner table */
            width: 80%; /* Matches the inline style */
            margin: 0;
            padding: 0;
        }

        .table_detail td table td {
            border: none; /* Remove borders for inner table cells */
            padding: 0;
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
    <?php
    $formattedSeqNo = str_pad($value->seqNo, 7, '0', STR_PAD_LEFT);
    ?>
	<table style="width:100%; border-collapse:collapse; padding-bottom: 7px; margin: 0 !important; border-bottom: 2px solid #000;">
        <tr>
            <td style="font-size: 9px; color: #fff; padding-left: 10px;">{{ $value->employeeNo }}</td>
            <td style="">&nbsp;</td>
			<td colspan="3" style="font-size: 9px; color: #fff; text-align: right; padding-right: 10px;">{{ $value->email }}</td>
		</tr>
        <tr>
            <td style="padding-left: 10px; border-top:1px dashed #999;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/BlackFormulir1721A1.PNG'))) }}" style="width: 30px; height: 10px;" alt="Logo"></td>
            <td style="border-top:1px dashed #999;">&nbsp;</td>
			<td colspan="3" style="text-align: right; padding-right: 10px; border-top:1px dashed #999;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/BlackFormulir1721A1.PNG'))) }}" style="width: 30px; height: 10px;" alt="Logo"></td>
		</tr>
		<tr>
            <td rowspan="4" style="border-right: 2px solid #000; text-align: center;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/LogoFormulir1721A1White.PNG'))) }}" style="width: 75px; height: 70px;" alt="Logo"></td>
            <td rowspan="4" style="font-size: 11px; font-weight: 700; text-align:center; border-right: 2px solid #000;">BUKTI PEMOTONGAN PAJAK PENGHASILAN PASAL 21<br>BAGI PEGAWAI TETAP ATAU PENERIMA PENSIUN YANG<BR>MENERIMA UANG TERKAIT PENSIUN SECARA BERKALA<br></td>
			<td colspan="3" style="text-align: right; padding-right: 10px;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/BlackWhiteFormulir1721A1.PNG'))) }}" style="width: 70px; height: 15px;" alt="Logo"></td>
		</tr>
        <tr>
            <td colspan="3" style="font-size: 10px; font-weight: 700; text-align: center;">FORMULIR 1721 - A1</td>
        </tr>
        <tr>
            <td colspan="3" style="font-size: 7px; font-weight: 0; text-align: center;">Lembar ke-1 : untuk Penerima Penghasilan</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
			<td width="26%" style="font-size: 10px; font-weight: 700; text-align:center; border-right: 2px solid #000;">KEMENTERIAN KEUANGAN R.I.<br>DIREKTORAT JENDERAL PAJAK</td>
            <td width="50%" style="font-size: 11px; padding-left: 20px; border-top: 2px solid #000;">
                <table style="width:100%; padding-left: 5%; padding: 0 !important; margin: 0 !important;">
                    <tr>
                        <td width="15%" style="font-size: 9px; font-weight: 700;">NOMOR :</td>
                        <td width="3%" style="font-size: 7px; padding-top: 0.5%;">H.01</td>
                        <td style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">1112{{date('y') - 1}}{{ $formattedSeqNo }}</td>
                    </tr>
                </table>
            </td>
            <td width="7%" style="border-top: 2px solid #000; border-right: 2px solid #000;">&nbsp;</td>
            <td width="23%" style="font-size: 11px; text-align: center; border-bottom: 1px solid #000;">
                <table style="width:100%; padding: 0 !important; margin: 0 !important; text-align: center;">
                    <tr>
                        <td colspan="4" style="font-size: 7px; font-weight: 700; text-align: center;">MASA PEROLEHAN PENGHASILAN<br>[mm - mm]</td>
                    </tr>
                    <tr>
                        <td width="10%" style="">&nbsp;</td>
                        <td width="3%" style="font-size: 7px; padding-top: 0.5%;">H.02</td>
                        <td style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ date('m', strtotime('2020-' . $value->masaAwal . '-01')) }} - {{ date('m', strtotime('2020-' . $value->masaAkhir . '-01')) }}/{{date('Y') - 1}}</td>
                        <td width="10%" style="">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
	</table>
    <table style="width:100%; margin-bottom: 13px; border: 2px solid #000;">
		<tr>
			<td width="12%" style="font-size: 10px; font-weight: 700;">NPWP PEMOTONG</td>
            <td width="3%" style="font-size: 10px; font-weight: 700; text-align: center;">:</td>
            <td width="3%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">H.03</td>
            <td width="50%" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->companyNPWP }}</td>
            <td style="font-size: 10px; font-weight: 700;">&nbsp;</td>
		</tr>
        <tr>
            <td width="12%" style="font-size: 10px; font-weight: 700;">NITKU PEMOTONG</td>
            <td width="3%" style="font-size: 10px; font-weight: 700; text-align: center;">:</td>
            <td width="3%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">H.03</td>
			<td style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ ($value->companyNPWP == "-") ? $value->companyNPWP : $value->companyNPWP . "000000" }}</td>
            <td style="font-size: 10px; font-weight: 700;">&nbsp;</td>
        </tr>
        <tr>
            <td width="12%" style="font-size: 10px; font-weight: 700;">NAMA PEMOTONG</td>
            <td width="3%" style="font-size: 10px; font-weight: 700; text-align: center;">:</td>
            <td width="3%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">H.04</td>
			<td colspan="2" style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->companyName }}</td>
        </tr>
	</table>
    <div style="font-size: 10px; font-weight: 700;">A. IDENTITAS PENERIMA PENGHASILAN YANG DIPOTONG</div>
    <table style="width:100%; margin-bottom: 13px; border: 1px solid #000;">
		<tr>
			<td width="13%" style="font-size: 9px; font-weight: 700;">1. NPWP</td>
            <td width="1%" style="font-size: 9px; font-weight: 700; ">:</td>
            <td width="3%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.01</td>
			<td width="45%" colspan="5" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->taxRegisteredNo }} / {{ $value->idNo }}</td>
            <td width="3%" style="">&nbsp;</td>
            <td colspan="13" style="font-size: 9px; font-weight: 700;">6. STATUS / JUMLAH TANGGUNGAN KELUARGA UNTUK PTKP</td>
		</tr>
        <tr>
            <?php
            $str0 = "";
            $str1 = "";
            $str2 = "";
            
            if (preg_match('/TK\/(\d+)/', $value->taxStatus, $matches)){
                $str1 = $matches[1];
            } elseif (preg_match('/K\/(\d+)/', $value->taxStatus, $matches)) {
                $str0 = $matches[1];
            } elseif (preg_match('/HB\/(\d+)/', $value->taxStatus, $matches)) {
                $str2 = $matches[1];
            }
            ?>
            <td style="font-size: 9px; font-weight: 700;">2. NITKU</td>
            <td colspan="2" style="font-size: 9px; font-weight: 700; ">:</td>
			<td colspan="5" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ ($value->idNo == "-") ? $value->idNo : $value->idNo . "000000" }}</td>
            <td width="3%" style="">&nbsp;</td>
            <td width="1%" style="font-size: 9px; font-weight: 700;">K/</td>
            <td width="5%" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $str0 }}</td>
            <td width="3%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.07</td>
            <td width="3%" style="">&nbsp;</td>
            <td width="1%" style="font-size: 9px; font-weight: 700;">TK/</td>
            <td width="5%" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $str1 }}</td>
            <td width="3%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.08</td>
            <td width="2%" style="">&nbsp;</td>
            <td width="1%" style="">&nbsp;</td>
            <td width="1%" style="font-size: 9px; font-weight: 700;">HB/</td>
            <td width="5%" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $str2 }}</td>
            <td width="3%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.09</td>
            <td width="3%" style="">&nbsp;</td>
        </tr>
        <tr>
            <td style="font-size: 9px; font-weight: 700;">3. NIK</td>
            <td style="font-size: 9px; font-weight: 700; ">:</td>
            <td style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.02</td>
			<td colspan="5" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->idNo }}</td>
            <td width="3%" style="">&nbsp;</td>
            <td width="20%" colspan="6" style="font-size: 9px; font-weight: 700;">8. NAMA JABATAN</td>
            <td width="1%" style="font-size: 9px; font-weight: 700; ">:</td>
            <td width="3%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.10</td>
            <td colspan="6" width="17%" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->namaJabatan }}</td>
        </tr>
        <tr>
            <td style="font-size: 9px; font-weight: 700;">4. NAMA</td>
            <td style="font-size: 9px; font-weight: 700; ">:</td>
            <td style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.03</td>
			<td colspan="5" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->employeeName }}</td>
            <td width="3%" style="">&nbsp;</td>
            <td width="20%" colspan="6" style="font-size: 9px; font-weight: 700;">9. KARYAWAN ASING</td>
            <td width="1%" style="font-size: 9px; font-weight: 700; ">:</td>
            <td style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.11</td>
            <td colspan="6" width="17%" style="font-size: 9px; font-weight: 700; padding-top: 5px;">
            @if($value->flagIsExpat)
            <input type="checkbox" id="karyawan_asing" name="karyawan_asing" value="Karyawan Asing" checked/> <label for="karyawan_asing" style="word-wrap:break-word;"> YA</label>
            @else
            <input type="checkbox" id="karyawan_asing" name="karyawan_asing" value="Karyawan Asing" /> <label for="karyawan_asing" style="word-wrap:break-word;"> YA</label>
            @endif
            </td>
        </tr>
        <tr>
            <td style="font-size: 9px; font-weight: 700;">5. ALAMAT</td>
            <td style="font-size: 9px; font-weight: 700; ">:</td>
            <td style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.04</td>
			<td colspan="5" style="font-size: 9px; font-weight: 700; height: 3%; border-bottom: 1px solid #000;">{{ $value->alamat }}</td>
            <td width="3%" style="">&nbsp;</td>
            <td width="20%" colspan="6" style="font-size: 9px; font-weight: 700;">10. KODE NEGARA DOMISILI</td>
            <td width="1%" style="font-size: 9px; font-weight: 700; ">:</td>
            <td style="font-size: 7px; padding-top: 0.5%; text-align: center;">A.12</td>
            <td colspan="6" width="17%" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ ($value->flagIsExpat) ? $value->nationalityCode : "" }}</td>
        </tr>
        <tr>
            <td style="font-size: 9px; font-weight: 700;">6. JENIS KELAMIN</td>
            <td style="font-size: 9px; font-weight: 700; ">:</td>
            <td style="font-size: 7px; text-align: center;">A.05</td>
			<td colspan="5" style="font-size: 9px; font-weight: 700; padding-top: 5px;">
            @if($value->gender == "M")
            <input type="checkbox" id="laki_laki" name="laki_laki" value="Laki-laki" checked/> <label for="laki_laki" style="word-wrap:break-word; padding-right: 30px;"> LAKI-LAKI</label>
            <span style="font-size: 7px; font-weight: 0; margin-bottom: 30px; text-align: center;">A.06</span>
            <input type="checkbox" id="perempuan" name="perempuan" value="Perempuan" /> <label for="perempuan" style="word-wrap:break-word;"> PEREMPUAN</label>
            @else
            <input type="checkbox" id="laki_laki" name="laki_laki" value="Laki-laki" /> <label for="laki_laki" style="word-wrap:break-word;  padding-right: 30px;"> LAKI-LAKI</label>
            <span style="font-size: 7px; font-weight: 0; margin-bottom: 30px; text-align: center;">A.06</span>
            <input type="checkbox" id="perempuan" name="perempuan" value="Perempuan" checked/> <label for="perempuan" style="word-wrap:break-word;"> PEREMPUAN</label>
            @endif
            </td>
            <td width="20%" colspan="12" style="font-size: 9px; font-weight: 700;">&nbsp;</td>
        </tr>
	</table>
    <div style="font-size: 10px; font-weight: 700;">B. RINCIAN PENGHASILAN DAN PERHITUNGAN PPh PASAL 21</div>
    <table class="table_detail" style="width:100%; margin-bottom: 13px;">
		<tr>
			<td colspan="2" style="font-size: 10px; font-weight: 700; text-align: center;">URAIAN</td>
            <td style="font-size: 10px; font-weight: 700; text-align: center;">JUMLAH (Rp)</td>
		</tr>
        <tr>
            <td colspan="2" style="font-size: 9px; font-weight: 700; text-align: center; padding: 0 !important; margin: 0 !important;">
                <table style="width:70%; padding-left: 5%; padding: 0 !important; margin: 0 !important;">
                    <tr>
                        <td style="font-size: 9px; font-weight: 700; text-align: center;">KODE OBJEK PAJAK : </td>
                        <td style="font-size: 9px; font-weight: 700; text-align: center; padding-top: 5px;">
                            @if(!empty($value->taxStatus))
                                <input type="checkbox" id="tipe1" name="tipe1" value="Tipe 1" style="padding: 0 !important; margin: 0 !important;" checked/> <label for="tipe1" style="word-wrap:break-word;"> 21-100-01</label>
                            @else
                                <input type="checkbox" id="tipe1" name="tipe1" value="Tipe 1" style="padding: 0 !important; margin: 0 !important;"/> <label for="tipe1" style="word-wrap:break-word;"> 21-100-01</label>
                            @endif
                        </td>
                        <td style="font-size: 9px; font-weight: 700; text-align: center; padding-top: 5px;">
                            @if(!empty($value->taxStatus))
                                <input type="checkbox" id="tipe2" name="tipe2" value="Tipe 2" style="padding: 0 !important; margin: 0 !important;" /> <label for="tipe2" style="word-wrap:break-word;"> 21-100-02</label>
                            @else
                                <input type="checkbox" id="tipe2" name="tipe2" value="Tipe 2" style="padding: 0 !important; margin: 0 !important;" checked/> <label for="tipe2" style="word-wrap:break-word;"> 21-100-02</label>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
			<td style="font-size: 9px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 9px; font-weight: 700;">PENGHASILAN BRUTO</td>
			<td style="font-size: 9px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td width="5%" style="font-size: 9px;">1.</td>
            <td width="75%" style="font-size: 9px;">GAJI ATAU UANG PENSIUNAN BERKALA</td>
			<td width="20%" style="font-size: 9px; text-align: right;"> {{ number_format($value->c1, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">2.</td>
            <td  style="font-size: 9px;">TUNJANGAN PPh</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c2, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">3.</td>
            <td  style="font-size: 9px;">TUNJANGAN LAINNYA, UANG LEMBUR DAN SEGALANYA</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c3, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">4.</td>
            <td  style="font-size: 9px;">HONORARIUM DAN IMBALAN LAIN SEJENISNYA</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c4, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">5.</td>
            <td  style="font-size: 9px;">PREMI ASURANSI YANG DIBAYARKAN PEMBERI KERJA</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c5, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">6.</td>
            <td  style="font-size: 9px;">PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c6, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">7.</td>
            <td  style="font-size: 9px;">TANTIEM, BONUS, GRATIFIKASI , JASA PRODUKSI DAN THR</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c7, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">8.</td>
            <td  style="font-size: 9px;">JUMLAH PENGHASILAN BRUTO (1 S.D. 7)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c8, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 9px; font-weight: 700;">PENGURANGAN</td>
			<td style="font-size: 9px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">9.</td>
            <td  style="font-size: 9px;">BIAYA JABATAN/BIAYA PENSIUN</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c9, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">10.</td>
            <td  style="font-size: 9px;">IURAN TERKAIT PENSIUN ATAU HARI TUA</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c10, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">11.</td>
            <td  style="font-size: 9px;">ZAKAT/SUMBANGAN KEAGAMAAN YANG BERSIFAT WAJIB YANG DIBAYARKAN MELALUI PEMBERI KERJA</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c11, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">12.</td>
            <td  style="font-size: 9px;">JUMLAH PENGURANGAN (9 S.D. 11)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c12, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 9px; font-weight: 700;">PERHITUNGAN PPh PASAL 21</td>
			<td style="font-size: 9px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">13.</td>
            <td  style="font-size: 9px;">JUMLAH PENGHASILAN NETO (8 - 12)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c13, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">14.</td>
            <td  style="font-size: 9px;">PENGHASILAN NETO MASA PAJAK SEBELUMNYA</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c14, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">15.</td>
            <td  style="font-size: 9px;">JUMLAH PENGHASILAN NETO UNTUK PERHITUNGAN PPh PASAL 21 (SETAHUN/DISETAHUNKAN)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c15, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">16.</td>
            <td  style="font-size: 9px;">PENGHASILAN TIDAK KENA PAJAK (PTKP)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c16, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">17.</td>
            <td  style="font-size: 9px;">PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN (15 - 16)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c17, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">18.</td>
            <td  style="font-size: 9px;">PPh PASAL 21 ATAS PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c18, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">19.</td>
            <td  style="font-size: 9px;">PPh PASAL 21 YANG TELAH DIPOTONG MASA PAJAK SEBELUMNYA</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c19, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">20.</td>
            <td  style="font-size: 9px;">PPh PASAL 21 DITANGGUNG PEMERINTAH (DTP) YANG TELAH DIPOTONG MASA PAJAK SEBELUMNYA</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format($value->c20, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">21.</td>
            <td  style="font-size: 9px;">PPh PASAL 21 TERUTANG (18 - 19 - 20)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ isset($value->c21) ? number_format($value->c21, 0, ',', '.') : number_format(0, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">22.</td>
            <td  style="font-size: 9px;">PPh PASAL 21 DAN PPh PASAL 26 YANG TELAH DIPOTONG DAN DILUNASI PADA SELAIN MASA PAJAK TERAKHIR</td>
			<td style="font-size: 9px; font-weight: 700; background-color: grey;"></td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">&nbsp;</td>
            <td  style="font-size: 9px;">22a. PPh PASAL 21 DIPOTONG</td>
			<td  style="font-size: 9px; text-align: right;"> {{ isset($value->c22) ? number_format($value->c22, 0, ',', '.') : number_format(0, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">&nbsp;</td>
            <td  style="font-size: 9px;">22b. PPh PASAL 21 DITANGGUNG PEMERINTAH (DTP)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format(0, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">23.</td>
            <td  style="font-size: 9px;">PPh PASAL 21 KURANG BAYAR/LEBIH BAYAR MASA PAJAK TERAKHIR</td>
			<td  style="font-size: 9px; text-align: right;"> {{ isset($value->c23) ? number_format($value->c23, 0, ',', '.') : number_format(0, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">&nbsp;</td>
            <td  style="font-size: 9px;">23a. PPh PASAL 21 DIPOTONG</td>
			<td  style="font-size: 9px; text-align: right;"> {{ isset($value->c23) ? number_format($value->c23, 0, ',', '.') : number_format(0, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td  style="font-size: 9px;">&nbsp;</td>
            <td  style="font-size: 9px;">23b. PPh PASAL 21 DITANGGUNG PEMERINTAH (DTP)</td>
			<td  style="font-size: 9px; text-align: right;"> {{ number_format(0, 0, ',', '.') }}</td>
        </tr>
	</table>
    <div style="font-size: 11px; font-weight: 700;">C. IDENTITAS PENANDA TANGAN</div>
    <table style="width:100%; margin: 0; border: 1px solid #000;">
		<tr>
			<td width="10%" style="font-size: 9px; font-weight: 700;">1. NPWP/NIK</td>
            <td width="1%" style="font-size: 9px; font-weight: 700; text-align: center;">:</td>
            <td width="5%" style="font-size: 7px; padding-top: 0.5%; text-align: center;">C.01</td>
            <td width="30%" style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->signerNPWP }}</td>
            <td width="5%" style="font-size: 9px; font-weight: 700;">&nbsp;</td>
            <td width="27%" style="font-size: 9px; font-weight: 700;">
                3. TANGGAL & TANDA TANGAN <br>
                <span style="font-size: 7px; text-align: center; font-weight: 0;">C.03</span>
            </td>
            <td rowspan="2" style="font-size: 9px; font-weight: 700;">
            <table style="width: 100%; height: 5%; text-align: center; vertical-align: middle;">
            </table>
            </td>
		</tr>
        <tr>
            <td style="font-size: 9px; font-weight: 700;">2. NAMA</td>
            <td style="font-size: 9px; font-weight: 700; text-align: center;">:</td>
            <td style="font-size: 7px;  padding-top: 0.5%; text-align: center;">C.02</td>
			<td style="font-size: 9px; font-weight: 700; border-bottom: 1px solid #000;">{{ $value->signerName }}</td>
            <td style="font-size: 9px; font-weight: 700;">&nbsp;</td>
            <td style="font-size: 10px; font-weight: 700; border-bottom: 1px solid #000;">{{ date('d/m/Y', strtotime($value->printDate)) }}</td>
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