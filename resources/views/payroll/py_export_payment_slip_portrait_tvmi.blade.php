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
			margin: 30px 50px;
			font-size: 11px;
		}
		.table {
			width: 100%;
			border-collapse: collapse;
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
					SLIP GAJI
				</td>
			</tr>
		</table>
		<hr />
		<?php
			$totalIncome = 0;
			$totalDeduction = 0;
		?>
		<table class="table" style="margin-bottom: 40px;">
			<tr style="margin-bottom: 30px;">
				<td style="width:50%; vertical-align: top; padding-left: 30px; padding-right: 15px;">
					<table class="table" style="margin: 20px;">
						<tr>
							<td width="33%">&nbsp;</td>
							<td width="33%">{{ $value->employeeNo }}</td>
							<td width="33%">&nbsp;</td>
						</tr>
						<tr>
							<td width="33%">&nbsp;</td>
							<td width="33%">{{ $value->employeeName }}</td>
							<td width="33%">&nbsp;</td>
						</tr>
						<tr>
							<td width="33%">&nbsp;</td>
							<td width="33%">{{ $value->position }}</td>
							<td width="33%">&nbsp;</td>
						</tr>
					</table>
					<table class="table">
						@foreach($value->a as $key2 => $value2)
							<?php
								$totalIncome += (float) $value2->columnValue;
							?>
							<tr>
								<td width="50%">{{ $value2->columnLabel }}</td>
								<td width="50%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
					</table>
				</td>
				<td style="width:50%; vertical-align: top; padding-left: 15px; padding-right: 30px;">
					<table class="table" style="margin: 20px;">
						<tr>
							<td width="33%">&nbsp;</td>
							<td width="33%">{{ $value->departemen }} - {{ $value->division }}</td>
							<td width="33%">&nbsp;</td>
						</tr>
						<tr>
							<td width="33%">&nbsp;</td>
							<td width="33%">{{ $value->taxStatus }}</td>
							<td width="33%">&nbsp;</td>
						</tr>
						<tr>
							<td width="33%">&nbsp;</td>
							<td width="33%">{{ $value->npwp }}</td>
							<td width="33%">&nbsp;</td>
						</tr>
					</table>
					<table class="table">
						@foreach($value->d as $key2 => $value2)
							<?php
								$totalDeduction += (float) $value2->columnValue;
							?>
							<tr>
								<td width="50%" style="padding-left: 10px;">{{ $value2->columnLabel }}</td>
								<td width="50%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
					</table>
				</td>
			</tr>
		</table>
		<hr style="margin: 0px 30px;" />
		<table class="table">
			<tr>
				<td style="width:50%; vertical-align: top; padding-left: 30px; padding-right: 15px;">
					<table class="table" style="margin-top: 10px;">
						<tr>
							<td width="50%">SUB TOTAL</td>
							<td width="50%" style="text-align:right; padding-right: 10px;">{{ number_format($totalIncome, 0, ',', '.') }}</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td width="50%">NETT INCOME</td>
							<td width="50%" style="text-align: right; padding-right: 10px;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.') }}</td>
						</tr>
					</table>
				</td>
				<td style="width:50%; vertical-align: top; padding-left: 15px; padding-right: 30px;">
					<table class="table" style="margin-top: 10px;">
						<tr>
							<td width="50%" style="padding-left: 10px;">&nbsp;</td>
							<td width="50%" style="text-align: right;">{{ number_format($totalDeduction, 0, ',', '.') }}</td>
						</tr>	
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td width="50%">&nbsp;</td>
							<td width="50%" style="text-align: right;">Period&nbsp;{{ date('F Y', strtotime($period)) }}</td>
						</tr>	
					</table>
				</td>
			</tr>
		</table>
		@if($key != array_key_last($data))
			<div class="page_break"></div>
		@endif
    @endforeach
</body>
</html>