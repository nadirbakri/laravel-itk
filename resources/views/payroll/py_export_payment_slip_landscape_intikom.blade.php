<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_payment_slip.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		@font-face {
            font-family: 'Arial Alternates';
            font-style: normal;
            font-weight: normal;
            src: url('fonts/arial.ttf') format('truetype');
        }

		@font-face {
            font-family: 'Arial Bold';
            font-style: normal;
            font-weight: normal;
            src: url('fonts/arialbold.ttf') format('truetype');
        }

		* { box-sizing: border-box; }
		html {
			margin: 5%;
		}
		.table_detail td{
			border:1px solid #000;
			text-align:center;
            padding:4px;
		}
		.table_detail th{
			border:1px solid #000;
            padding:4px;
            background-color:#84c2e0;
		}
		/* .table{
			border-collapse:collapse;
		} */

		.div-footer {
			position: relative; 
			bottom: -1.8cm; 
			left: 0cm; 
			right: 0cm;
			height: 1.7cm;
			font-size: 7.5px;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	@foreach($data as $key => $value)
    <table style="width:100%; font-size: 13px; padding-left:1%; padding-right:1%; font-family: 'Arial Bold', sans-serif;">
		<tr>
			@if($display_logo == "1")
			<td width="7%" rowspan="2" style="text-align:right;">
				<table style="width: 100%;">
					<tr>
						<td>
							<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_intikom_bulat.png'))) }}" style="width: 65px; height: 65px" alt="Logo">
						</td>
					</tr>
				</table>
			</td>
			<td width="65%" rowspan="2">&nbsp;</td>
			@else
			<td width="7%" rowspan="2" style="text-align:right;">&nbsp;</td>
			<td width="65%" rowspan="2">&nbsp;</td>
			@endif
			<td width="20%"><b>PT. INTIKOM BERLIAN MUSTIKA</b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th colspan="3">SLIP {{ strtoupper($slip_code) }}</th>
		</tr>
		<tr>
			<th colspan="3">{{ $periode }}</th>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
        <tr>
			<td width="15%" style="padding-left: 10px;">NIK / Name</td>
			<td width="1%">:</td>
			<td width="44%" style="padding-left: 10px;">{{ $value->employeeNo }} / {{ $value->employeeName }}</td>
			<td width="10%" style="padding-left: 10px;">Email</td>
			<td width="1%">:</td>
			<td width="29%" style="padding-left: 10px;">{{ $value->email }}</td>
		</tr>
		<tr>
			<td width="15%" style="padding-left: 10px;">Dept</td>
			<td width="1%">:</td>
			<td width="44%" style="padding-left: 10px;">{{ $value->departemen }}</td>
			<td width="10%" style="padding-left: 10px;">NPWP</td>
			<td width="1%">:</td>
			<td width="29%" style="padding-left: 10px;">{{ $value->npwp }}</td>
		</tr>
		<tr>
			<td width="15%" style="padding-left: 10px;">PTKP / Position</td>
			<td width="1%" style="">:</td>
			<td width="44%" colspan="4" style="padding-left: 10px;">{{ $value->taxStatus }} / {{ $value->rank }}</td>
		</tr>
	</table>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	$totalDataIncome = 0;
	$totalDataDeduction = 0;
	?>
	<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:50%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<td colspan="3" style="padding-left: 2%; border-bottom: 1px solid black;"><b>INCOME&nbsp;&nbsp;&nbsp;:</b></td>
					</tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
						<?php
							$totalDataIncome++;
						?>
						<tr>
							<td width="55%">{{ $value2->columnLabel }}</td>
							<td width="3%">IDR</td>
							<td width="42%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
					@if($totalDataIncome < 20)
						@for($i = 0; $i <= (20 - $totalDataIncome); $i++)
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
						@endfor
					@endif
				</table>
			</td>
			<td style="width:50%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; ">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="3" style="padding-left: 2%; border-bottom: 1px solid black;"><b>DEDUCTION&nbsp;&nbsp;&nbsp;:</b></td>
					</tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
						<?php
							$totalDataDeduction++;
						?>
						<tr>
							<td width="55%" style="padding-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="3%">IDR</td>
							<td width="42%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
					@if($totalDataDeduction < 20)
						@for($i = 0; $i <= (20 - $totalDataDeduction); $i++)
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
						@endfor
					@endif
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:50%; vertical-align: top; border-bottom: 1px solid black;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<td width="55%">Total Salary Allowance</td>
						<td width="3%">IDR</td>
						<td width="42%" style="text-align: right; padding-right: 10px;">{{ number_format($totalIncome, 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td width="55%">Take Home Pay</td>
						<td width="3%">IDR</td>
						<td width="42%" style="text-align: right; padding-right: 10px;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
			<td style="width:50%; vertical-align: top; border-bottom: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="55%" style="padding-left: 10px;">Total Deduction</td>
						<td width="3%">IDR</td>
						<td width="42%" style="text-align: right;">{{ number_format($totalDeduction, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td width="70%" colspan="3">{{ empty($value->bankName) ? "BANK CENTRAL ASIA" : strtoupper($value->bankName) }}</td>
			<td width="30%">Jakarta, {{ date('d/m/Y', strtotime($transfer_date)) }}</td>
		</tr>
		<tr>
			<td width="10%">Acc No.</td>
			<td width="3%">:</td>
			<td width="70%" colspan="2" style="padding-left: 7px;">{{ $value->noRekening }}</td>
		</tr>
		<tr>
			<td width="10%">Ben. Name</td>
			<td width="3%">:</td>
			<td width="70%" colspan="2" style="padding-left: 7px;">{{ $value->beneficiaryName }}</td>
		</tr>
		<tr>
			<td width="70%" colspan="4">
				Disclaimer : This document was issued electronically and is therefore valid without signature
			</td>
		</tr>
	</table>
	
    @if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
    @endforeach
</body>
</html>