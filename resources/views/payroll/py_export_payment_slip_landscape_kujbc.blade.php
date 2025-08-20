<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_payment_slip.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
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
		<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
			<tr>
				<td style="width:15%;">Nama</td>
				<td style="width:2%;">:</td>
				<td style="width:33%;">{{ $value->employeeNo }} {{ $value->employeeName }}</td>

				<td colspan="3" style="width:50%; font-weight: bold;">{{ $value->namaPerusahaan }}</td>
			</tr>
			<tr>
				<td>Seksi</td>
				<td>:</td>
				<td>{{ $value->division }}</td>

				<td>Bank</td>
				<td align="center">:</td>
				<td>{{ $value->noRekening }}</td>
			</tr>
			<tr>
				<td>Periode</td>
				<td>:</td>
				<td>{{ $value->slipPeriod }}</td>

				<td>NPWP</td>
				<td align="center">:</td>
				<td>{{ $value->npwp }}</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>{{ $value->email }}</td>

				<td>Status</td>
				<td align="center">:</td>
				<td>{{ $value->taxStatus }}</td>
			</tr>
		</table>
		<br />
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
						@foreach($value->a as $key2 => $value2)
							<?php
								$totalIncome += (float) $value2->columnValue;
							?>
							@if((float) $value2->columnValue !== 0.0)
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
						@foreach($value->d as $key2 => $value2)
							<?php
								$totalDeduction += (float) $value2->columnValue;
							?>
							@if((float) $value2->columnValue !== 0.0)
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
				<td style="width:50%; vertical-align: top; border-right: 1px solid black;">
					<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
						<tr>
							<td width="55%" style="border-bottom: 1px solid black;">JUMLAH UPAH</td>
							<td width="3%" style="border-bottom: 1px solid black;">IDR</td>
							<td width="42%" style="border-bottom: 1px solid black; text-align: right; padding-right: 10px;">{{ number_format($totalIncome, 0, ',', '.')}}</td>
						</tr>
						<tr>
							<td width="55%" style="border-bottom: 1px solid black;">UPAH NETTO</td>
							<td width="3%" style="border-bottom: 1px solid black;">IDR</td>
							<td width="42%" style="border-bottom: 1px solid black; text-align: right; padding-right: 10px;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}}</td>
						</tr>
					</table>
				</td>
				<td style="width:50%; vertical-align: top;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td width="55%" style="border-bottom: 1px solid black; padding-left: 10px;">JUMLAH POTONGAN</td>
							<td width="3%" style="border-bottom: 1px solid black;">IDR</td>
							<td width="42%" style="border-bottom: 1px solid black; text-align: right;">{{ number_format($totalDeduction, 0, ',', '.')}}</td>
						</tr>
						<tr>
							<td colspan="3" width="100%" style="border-bottom: 1px solid black;">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
			<tr>
				<td width="15%">Jam Lembur</td>
				<td width="1%">:</td>
				<td width="67%">{{ $value->pynjlbac }}</td>
				<td width="17%">Accepted By,</td>
			</tr>
			<tr>
				<td width="15%">Penghasilan Bruto</td>
				<td width="1%">:</td>
				<td width="67%">IDR</td>
			</tr>
			<tr>
				<td width="15%">Saldo Medical</td>
				<td width="1%">:</td>
				<td width="67%">IDR {{ number_format($value->saldo_Medical, 0, ',', '.') }}</td>
			</tr>
			<tr>
				<td colspan="3" width="83%">&nbsp;</td>
				<td width="17%">{{ $value->employeeName }}</td>
			</tr>
		</table>
		
		@if($key != array_key_last($data))
			<div class="page_break"></div>
		@endif
    @endforeach
</body>
</html>