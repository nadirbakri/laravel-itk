<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_monthly_jamsostek_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		* { box-sizing: border-box; }
		html, body, #header {
            margin-top: 1%;
            margin-bottom: 0;
            margin-left: 1%;
            margin-right: 1%;
            padding: 0 !important;
            font-family: Arial, Helvetica, sans-serif;
        }
		.table_detail td{
			border:1px solid #000;
            padding: 4px;
		}
		.table_detail tr th{
			border:1px solid #000;
            background-color: #C0C0C0;
		}
		.table_detail{
			border-collapse:collapse;
		}
        label,input{
            display: inline-block;
            vertical-align: middle;
        }
	</style>
</head>
<body>
	<table style="width:100%; padding-bottom: 7px;">
		<tr>
			<td colspan="3" width="50%"><img src="{{ public_path('/pictures/bpjs_excel.png') }}"></td>
            <td colspan="4" style="font-size: 16px; font-weight: 700; text-align:center; padding-left: 50px;">FORM 1B DAFTAR TENAGA KERJA KELUAR</td>
		</tr>
        <tr>
            <td colspan="5">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
		</tr>
        <tr>
			<td colspan="5" style="font-size: 10px; font-weight: 700; text-align:left;">Nama Perusahaan :</td>
            <td style="font-size: 10px; font-weight: 700; text-align:right;">NPP :</td>
            <td style="font-size: 10px; font-weight: 700; padding-left: 5px; text-align:left;">{{ $bpjsNo }}</td>
        </tr>
        @if(!empty($data))
        <tr>
			<td colspan="5" style="font-size: 10px; font-weight: 700; text-align:left;">{{ $data[0]->companyName }}</td>
            <td style="font-size: 10px; font-weight: 700; text-align:right;">Unit :</td>
            <td style="font-size: 10px; font-weight: 700; padding-left: 5px; text-align:left;">{{ $data[0]->companyName }}</td>
        </tr>
        @else
        <tr>
			<td colspan="5" style="font-size: 10px; font-weight: 700; text-align:left;">{{ $companyName }}</td>
            <td style="font-size: 10px; font-weight: 700; text-align:right;">Unit :</td>
            <td style="font-size: 10px; font-weight: 700; padding-left: 5px; text-align:left;">{{ $companyName }}</td>
        </tr>
        @endif
        <tr>
			<td colspan="5" style="font-size: 10px; font-weight: 700; text-align:left;">&nbsp;</td>
            <td style="font-size: 10px; font-weight: 700; text-align:right;">Bulan :</td>
            <td style="font-size: 10px; font-weight: 700; padding-left: 5px; text-align:left;">{{ date('m/Y', strtotime($period)) }}</td>
        </tr>
	</table>
    <table class="table_detail" style="width:100%; border-collapse:collapse;">
        <tr>
            <th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">No.</th>
            <th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">Nama TK</th>
			<th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">Tgl Lahir</th>
            <th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">NIK</th>
            <th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">KPJ</th>
			<th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">KTP</th>
			<th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">Upah</th>
        </tr>
        <tr style="background-color: #C0C0C0;">
            <th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">&nbsp;</th>
            <th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">Sesuai KTP</th>
			<th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">DD-MM-YYYY</th>
            <th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">&nbsp;</th>
            <th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">Jika Punya</th>
			<th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">16 Digit (Wajib Isi)</th>
			<th style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">Take Home Pay</th>
        </tr>
        <?php
            $totalJamsostekSalary = 0;
        ?>
        @if(!empty($data))
        @foreach($data as $key => $value)
        <?php
            $totalJamsostekSalary += $value->jamsostekSalary;
        ?>
        <tr>
            <td style="font-size: 10px; text-align: center; border:1px solid #000;">{{ ($key + 1) }}</td>
            <td style="font-size: 10px; text-align: left; border:1px solid #000;">{{ $value->fullName }}</td>
			<td style="font-size: 10px; text-align: left; border:1px solid #000;">{{ date('d-m-Y', strtotime($value->birthDate)) }}</td>
            <td style="font-size: 10px; text-align: center; border:1px solid #000;">{{ $value->employeeNo }}</td>
            <td style="font-size: 10px; text-align: center; border:1px solid #000;">{{ $value->bpjsTenagaKerjaNo }}</td>
			<td style="font-size: 10px; text-align: center; border:1px solid #000;">{{ $value->idNo }}</td>
			<td style="font-size: 10px; text-align: center; border:1px solid #000;">{{ number_format($value->jamsostekSalary, 2, '.', ',') }}</td>
        </tr>
        @endforeach
        @else
        <tr style="background-color: #C0C0C0;">
            <td colspan="7" style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #C0C0C0;">No Records Found</td>
        </tr>
        @endif
        @if($grandTotal)
        <tr style="background-color: #FFFF00;">
            <td colspan="6" style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #FFFF00;">Total</td>
            <td style="font-size: 10px; text-align: center; font-weight: 500; border:1px solid #000; background-color: #FFFF00;">{{ number_format($totalJamsostekSalary, 2, '.', ',') }}</td>
        </tr>
        @endif
    </table>
    <br>
    <table style="width:100%; padding-bottom: 7px;">
		<tr>
			<td colspan="6">&nbsp;</td>
            <td style="font-size: 10px; font-weight: 700; text-align:center; padding-left: 50px;">{{ date('F Y', strtotime($period)) }}</td>
		</tr>
        <tr>
            <td colspan="6">&nbsp;</td>
            <td>&nbsp;</td>
		</tr>
        <tr>
            <td colspan="6">&nbsp;</td>
            <td>&nbsp;</td>
		</tr>
        <tr>
            <td colspan="6">&nbsp;</td>
            @if(!empty($data))
            <td style="font-size: 10px; font-weight: 700; text-align:center; padding-left: 50px;">{{ $data[0]->title . " " . $data[0]->signerName }}</td>
            @else
            <td style="font-size: 10px; font-weight: 700; text-align:center; padding-left: 50px;">-</td>
            @endif
        </tr>
	</table>
</body>
</html>