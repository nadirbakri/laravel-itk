<!DOCTYPE html>
<html>
<head>
    <title>Period Fund Report</title>
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
                    <th colspan="11" style="font-size: 15px;"><b>DANA PENSIUN INDOMOBIL GROUP</b></th>
                </tr>
            </thead>
        </table>
        <br>
        <table>
            <tr>
                <td colspan="5">NAMA PERUSAHAAN</td>
                <td>:</td>
                <td colspan="5"><b>PT. {{ $data[0]->companyName }}</b></td>
            </tr>
            <tr>
                <td colspan="5">ALAMAT</td>
                <td>:</td>
                <td colspan="5">{{ $data[0]->companyAddress }}</td>
            </tr>
            <tr>
                <td colspan="5">PERIODE / BULAN</td>
                <td>:</td>
                <td colspan="5"><b>{{ date('F-y', strtotime($data[0]->periodeYear . '-' . $data[0]->periodeMonth . '-01')) }}</b></td>
            </tr>
        </table>
        <br>
        <table style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align: center; text-align: center; border:1px solid #000;"><b>FORM</b></th>
                    <th rowspan="2" colspan="4" style="width: 200px; vertical-align: center; text-align: center; border:1px solid #000;"><b>URAIAN</b></th>
                    <th colspan="6" style="text-align: center; border:1px solid #000;"><b>JUMLAH</b></th>
                </tr>
                <tr>
                    <th style="vertical-align: center; text-align: center; border:1px solid #000;"><b>KARYAWAN</b></th>
                    <th colspan="5" style="height: 50px; vertical-align: center; text-align: center; border:1px solid #000;"><b>GAJI<br>RP.</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">Bulan Lalu</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->previousMonth->totalEmployee)) ? $data[0]->previousMonth->totalEmployee : '0' }}</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">Rp</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->previousMonth->totalBasicSalary)) ? $data[0]->previousMonth->totalBasicSalary : '-' }}</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="text-align: center; border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right;border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;"><b>PENAMBAHAN</b></td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">Karyawan Masuk</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->additionalEmployee->totalEmployee)) ? $data[0]->additionalEmployee->totalEmployee : '0' }}</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">Rp</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->additionalEmployee->totalBasicSalary)) ? $data[0]->additionalEmployee->totalBasicSalary : '-' }}</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">Kenaikan Gaji</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->increasingBasicSalary->totalEmployee)) ? $data[0]->increasingBasicSalary->totalEmployee : '0' }}</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">Rp</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->increasingBasicSalary->totalBasicSalary)) ? $data[0]->increasingBasicSalary->totalBasicSalary : '-' }}</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="text-align: center; border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right;border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;"><b>PENGURANGAN</b></td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">Karyawan Keluar</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->reductionOfEmployee->totalEmployee)) ? $data[0]->reductionOfEmployee->totalEmployee : '0' }}</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">Rp</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->reductionOfEmployee->totalBasicSalary)) ? $data[0]->reductionOfEmployee->totalBasicSalary : '-' }}</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">Penurunan Gaji</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->decreasingBasicSalary->totalEmployee)) ? $data[0]->decreasingBasicSalary->totalEmployee : '0' }}</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">Rp</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">{{ (!empty($data[0]->decreasingBasicSalary->totalBasicSalary)) ? $data[0]->decreasingBasicSalary->totalBasicSalary : '-' }}</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="text-align: center; border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right;border-top:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-right:1px solid #000; border-left:1px solid #000;"><b>TOTAL</b></td>
                    <td style="text-align: center; border-right:1px solid #000; border-left:1px solid #000;">{{ $data[0]->totalEmployee }}</td>
                    <td style="border-right:1px solid #000; border-left:1px solid #000;">Rp</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right; border-right:1px solid #000; border-left:1px solid #000;">{{ $data[0]->total }}</td>
                </tr>
                <tr>
                    <td style="border-bottom:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td colspan="4" style="border-bottom:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="text-align: center; border-bottom:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td style="border-bottom:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                    <td data-format="#,##0" colspan="4" style="text-align: right;border-bottom:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <br>
        <?php
        $totalSeluruh = $data[0]->iuran + $dendaBulan - $kelebihanBayar + $kurangBayar - $penguranganIuran + $materai;
        ?>
        <table>
            <tr>
                <td style="text-align: left;">A.</td>
                <td style="width: 100px; text-align: left;">Iuran</td>
                <td style="width: 70px; text-align: left;">9% x</td>
                <td style="text-align: left;">Rp</td>
                <td data-format="#,##0" style="width: 200px; text-align: right;">{{ $data[0]->total }}</td>
                <td style="text-align: right;">=</td>
                <td style="text-align: left;">Rp</td>
                <td data-format="#,##0" colspan="4" style="text-align: right;">{{ $data[0]->iuran }}</td>
            </tr>
            <tr>
                <td style="text-align: left;">B.</td>
                <td colspan="4" style="text-align: left;">Denda Bulan</td>
                <td style="text-align: right;">=</td>
                <td style="text-align: left;">Rp</td>
                <td data-format="#,##0" colspan="4" style="text-align: right;">{{ (!empty($dendaBulan) || $dendaBulan != 0) ? $dendaBulan : '-' }}</td>
            </tr>
            <tr>
                <td style="text-align: left;">C.</td>
                <td colspan="4" style="text-align: left;">Kelebihan Bayar</td>
                <td style="text-align: right;">=</td>
                <td style="text-align: left;">Rp</td>
                <td data-format="#,##0" colspan="4" style="text-align: right;">{{ (!empty($kelebihanBayar) || $kelebihanBayar != 0) ? $kelebihanBayar : '-' }}</td>
            </tr>
            <tr>
                <td style="text-align: left;">D.</td>
                <td colspan="4" style="text-align: left;">Kurang Bayar</td>
                <td style="text-align: right;">=</td>
                <td style="text-align: left;">Rp</td>
                <td data-format="#,##0" colspan="4" style="text-align: right;">{{ (!empty($kurangBayar) || $kurangBayar != 0) ? $kurangBayar : '-' }}</td>
            </tr>
            <tr>
                <td style="text-align: left;">E.</td>
                <td colspan="4" style="text-align: left;">Pengurangan Iuran karena Pengunduran diri Karyawan<br>(Kepesertaan Kurang dari 3 tahun)</td>
                <td style="text-align: right;">=</td>
                <td style="text-align: left;">Rp</td>
                <td data-format="#,##0" colspan="4" style="text-align: right;">{{ (!empty($penguranganIuran) || $penguranganIuran != 0) ? $penguranganIuran : '-' }}</td>
            </tr>
            <tr>
                <td style="text-align: left;">F.</td>
                <td colspan="4" style="text-align: left;">Materai</td>
                <td style="text-align: right;">=</td>
                <td style="text-align: left; border-bottom: 2px solid #000;">Rp</td>
                <td data-format="#,##0" colspan="4" style="text-align: right; border-bottom: 2px solid #000;">{{ (!empty($materai) || $materai != 0) ? $materai : '-' }}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: left;">&nbsp;</td>
                <td style="text-align: left;">Rp</td>
                <td data-format="#,##0" colspan="4" style="text-align: right;">{{ $totalSeluruh }}</td>
            </tr>
        </table>
    @endif
</body>
</html>