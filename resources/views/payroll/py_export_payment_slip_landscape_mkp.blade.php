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
			font-family: 'Arial Bold', sans-serif;
			margin: 3%;
			font-size: 11px;
		}
		.table {
			width: 100%;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	@foreach($data as $key => $value)
		<table class="table" style="font-size: 15px; font-weight: 700;">
			<tr>
				<td style="text-align:left;">
					{{ $value->namaPerusahaan }}
				</td>
				<td>
					PAYSLIP
				</td>
			</tr>
		</table>
		<hr />
		<br />
		<table class="table" style="border-collapse: collapse;">
			<tr>
				<td width="20%">Name</td>
				<td width="1%">:</td>
				<td width="29%">{{ $value->employeeName }}</td>
				<td width="20%">Level</td>
				<td width="1%">:</td>
				<td width="29%">{{ $value->level }}</td>
			</tr>
			<tr>
				<td width="20%">Position</td>
				<td width="1%">:</td>
				<td width="29%">{{ $value->position }}</td>
				<td width="20%">Area</td>
				<td width="1%">:</td>
				<td width="29%">{{ $value->location }}</td>
			</tr>
			<tr>
				<td width="20%">Divisi</td>
				<td width="1%">:</td>
				<td width="29%">{{ $value->division }}</td>
				<td width="20%">Month</td>
				<td width="1%">:</td>
				<td width="29%">PAYROLL {{ strtoupper($periode) }}</td>
			</tr>
		</table>
		<br />
		<?php
			$totalIncome = 0;
			$totalDeduction = 0;
			$countA = count($value->a);
			$countD = count($value->d);
			$rowSpanD = $countA - $countD;
		?>
		<table class="table" style="border-collapse: collapse;">
			<tr>
				<td style="width:50%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td colspan="3" style="font-weight: bold; text-align: left; padding-bottom: 1%; border-bottom: 1px solid black;">COMPENSATION & BENEFITS</td>
						</tr>
						@foreach($value->a as $key2 => $value2)
							<?php
								$totalIncome += (float) $value2->columnValue;
							?>
							<tr>
								<td width="55%">{{ $value2->columnLabel }}</td>
								<td width="3%">IDR</td>
								<td width="42%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
						<tr style="font-weight: bold">
							<td width="55%">Total</td>
							<td width="3%">IDR</td>
							<td width="42%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $totalIncome, 0, ',', '.')}}</td>
						</tr>
					</table>
				</td>
				<td style="width:50%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td colspan="3" style="font-weight: bold; text-align: left; padding-bottom: 1%; border-bottom: 1px solid black;">DEDUCTION</td>
						</tr>
						@foreach($value->d as $key2 => $value2)
							<?php
								$totalDeduction += (float) $value2->columnValue;
							?>
							<tr>
								<td width="55%" style="padding-left: 10px;">{{ $value2->columnLabel }}</td>
								<td width="3%">IDR</td>
								<td width="42%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
						@for($i = 0; $i < $rowSpanD; $i++)
							<tr>
								<td width="55%">&nbsp;</td>
								<td width="3%">&nbsp;</td>
								<td width="42%">&nbsp;</td>
							</tr>
						@endfor
						<tr style="font-weight: bold">
							<td width="55%" style="padding-left: 10px;">Total Deduction</td>
							<td width="3%">IDR</td>
							<td width="42%" style="text-align:right;">{{ number_format((float) $totalDeduction, 0, ',', '.')}}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="table" style="border-collapse: collapse;">
			<tr>
				<td style="width:50%; vertical-align: top; border-bottom: 1px solid black;">
					<table style="width:100%; border-collapse: collapse;">
						@foreach($value->c as $key2 => $value2)
							<tr>
								<td width="55%">{{ $value2->columnLabel }}</td>
								<td width="3%">IDR</td>
								<td width="42%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
					</table>
				</td>
				<td style="width: 50%; border-bottom: 1px solid black;">
					&nbsp;
				</td>
			</tr>
		</table>
		<table class="table" style="border-collapse: collapse;">
			<tr>
				<td style="width:50%; vertical-align: top;">
					<table style="width:100%; border-collapse: collapse;">
						<tr style="font-weight: bold">
							<td width="55%">Take Home Pay</td>
							<td width="3%">IDR</td>
							<td width="42%" style="text-align:right; padding-right: 10px;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}}</td>
						</tr>
					</table>
				</td>
				<td style="width: 50%;">
					&nbsp;
				</td>
			</tr>
		</table>
		<br />
		<table class="table">
			<thead>
				<tr style="font-weight: bold;">
					<td>Transfer to:</td>
					<td>HC Dept:</td>
					<td>Receive by:</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ $value->bankName }}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>No A/C {{ $value->noRekening }}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>{{ $value->beneficiaryName }}</td>
					<td style="text-decoration: underline;">Magdalena Rossy R</td>
					<td>{{ $value->employeeName }}</td>
				</tr>
			</tbody>
		</table>

		@if($key != array_key_last($data))
			<div class="page_break"></div>
		@endif
    @endforeach
</body>
</html>