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
			margin: 1%;
			font-size: 15px;
		}

		.no-page-break {
			page-break-inside: avoid;
		}

		.div-footer {
			position: fixed; 
			bottom: -0.8cm; 
			left: 0cm; 
			right: 0cm;
			height: 4cm;
			font-size: 15px;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
@foreach($data as $key => $value)
<main>
    <table style="width:100%; padding-left:1%; padding-right:1%;">
		<tr>
            <td width="20%" style="padding-top: 2%; font-size: 16px; text-align:left; font-family: 'Arial Alternates', sans-serif;">PT. CIBOODLE INDONESIA</td>
			@if($display_logo == "1")
            <td width="50%" rowspan="4">&nbsp;</td>
            <td width="30%" rowspan="4" style="text-align:right;">
				<!-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_digima.png'))) }}" style="width: 175px; height: 85px" alt="Logo"> -->
				<!-- <table style="width: 100%;">
					<tr>
						<td>
							
						</td>
					</tr>
				</table> -->
			</td>
			@else
			<td width="80%" rowspan="4" style="text-align:right; height: 85px">&nbsp;</td>
			@endif
		</tr>
	</table>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
        <tr>
			<td colspan="9" style="border-top: 1px solid black;">&nbsp;</td>
		</tr>
		<tr>
			<td width="13%">Employee Name</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="30%">{{ $value->employeeName }}</td>
			<td width="9%">Bank</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="18%">{{ $value->bankName }}</td>
			<td width="9%">Month</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="15%">{{ $value->slipPeriod }}</td>
		</tr>
		<tr>
			<td width="13%">Departement</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="30%">{{ $value->departemen }}</td>
			<td width="9%">Account No</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="18%">{{ $value->noRekening }}</td>
			<td width="9%">NPWP</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="15%">{{ $value->npwp }}</td>
		</tr>
		<tr>
			<td width="13%">Employee ID Oracle</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="30%">{{ $value->employeeNo }}</td>
			<td width="9%">ID Card No</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="18%">{{ $value->nik }}</td>
			<td width="9%">Status Tax</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="15%">{{ $value->taxStatus }}</td>
		</tr>
		<tr>
			<td colspan="9" style="border-bottom: 1px solid black;">&nbsp;</td>
		</tr>
	</table>
	<br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	?>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:45%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: left; padding-bottom: 3%;">EARNING</td>
					</tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<tr>
							<td width="60%" style="margin-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="37%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
				</table>
			</td>
			<td style="width:10%; vertical-align: top;"></td>
			<td style="width:45%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
					<tr>
						<td colspan="2" style="text-align: left; padding-bottom: 3%;">DEDUCTION</td>
					</tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<tr>
							<td width="60%" style="margin-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="37%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
					<tr>
						<td width="60%" style="padding: 0; margin: 0;">&nbsp;</td>
						<td width="37%" style="text-align: right; padding: 0; margin: 0; border-top: 1px solid black;">{{ number_format($totalDeduction, 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="60%" style="padding: 0; margin: 0;">Salary Adjustment</td>
						<td width="37%" style="text-align: right; padding: 0; margin: 0;">{{ number_format(0, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div class="div-footer" style="font-family: 'Arial Alternates', sans-serif;">
		<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
			<tr>
				<td style="width:45%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td width="60%" style="margin-left: 10px; padding-top: 3%;">TOTAL EARNING</td>
							<td width="37%" style="text-align:right; padding-top: 3%;">{{ number_format((float) $totalIncome, 0, ',', '.')}}</td>
						</tr>
					</table>
				</td>
				<td style="width:10%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black;"></td>
				<td style="width:45%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black;">
					<table style="width:100%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
						<tr>
							<td width="60%" style="margin-left: 10px; padding-top: 3%;">TOTAL DEDUCTION</td>
							<td width="37%" style="text-align:right; padding-top: 3%;">{{ number_format((float) $totalDeduction, 0, ',', '.')}}</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td width="60%" style="margin-left: 10px;">TAKEHOMEPAY</td>
							<td width="37%" style="text-align:right;">{{ number_format((float) ($totalIncome + $totalDeduction), 0, ',', '.')}}</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
			<tr>
				<td style="width:100%; vertical-align: top;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td colspan="2" style="text-align: left;">*this salary slip is an automatic generated from system</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	@if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
	@endforeach
</main>
</body>
</html>