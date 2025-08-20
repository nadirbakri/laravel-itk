<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_payment_slip.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/payroll_detail.css') }}">
	<style type="text/css">
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
		<div style="position: relative; width: 100%;">
			<div style="text-align: center; font-size: 16px; font-weight: 700;">
				SLIP GAJI
			</div>
			@if($display_logo === "1")
				<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_imat_imur.jpg'))) }}" 
					style="position: absolute; top: 0; right: 0; width: 80px;" 
					alt="Logo IMAT IMUR">
			@endif
		</div>
		<br />
		<table class="table" style="border-collapse: collapse;">
			<tr>
				<td colspan="6" style="font-size: 14px; font-weight: bold;">{{ $value->namaPerusahaan }}</td>
			</tr>
			<tr>
				<td width="10%">Bulan</td>
				<td width="1%">:</td>
				<td width="22%">{{ $value->slipPeriod }}</td>
				<td colspan="3" width="33%">&nbsp;</td>
				<td width="33%">{{ $value->bankName }}</td>
			</tr>
			<tr>
				<td width="10%">NIP</td>
				<td width="1%">:</td>
				<td width="22%">{{ $value->employeeNo }}</td>
				<td width="10%">TANGGAL MASUK</td>
				<td width="1%">:</td>
				<td width="22%">{{ $value->joinDate }}</td>
				<td width="33%">{{ $value->noRekening }}</td>
			</tr>
			<tr>
				<td width="10%">NAMA</td>
				<td width="1%">:</td>
				<td width="22%">{{ $value->employeeName }}</td>
				<td width="10%">BAGIAN</td>
				<td width="1%">:</td>
				<td width="22%">{{ $value->position }}</td>
				<td colspan="3" width="33%">&nbsp;</td>
			</tr>
			<tr>
				<td width="10%">STATUS</td>
				<td width="1%">:</td>
				<td width="22%">{{ $value->taxStatus }}</td>
				<td width="10%">DEPARTEMEN</td>
				<td width="1%">:</td>
				<td width="22%">{{ $value->departemen }}</td>
				<td colspan="3" width="33%">&nbsp;</td>
			</tr>
		</table>
		<hr />
		<br />
		<?php
			$totalAllowance = 0;
			$totalDeduction = 0;
			$totalCompany = 0;
			$totalBenefit = 0;
			$THP = (float) $value->takeHomePaySalary + (float) $value->takeHomePayBonus + (float) $value->takeHomePayTHR;
		?>
		<table class="table" style="border-collapse: collapse;">
			<tr>
				<td style="width:33%; vertical-align: top;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td colspan="2" style="font-weight: bold; text-align: left; padding-bottom: 2%;">I. ALLOWANCE (Pendapatan)</td>
						</tr>
						@foreach($value->a as $key2 => $value2)
							<?php
								$totalAllowance += (float) $value2->columnValue;
							?>
							<tr>
								<td width="55%">{{ $value2->columnLabel }}</td>
								<td width="45%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
					</table>
				</td>
				<td style="width:33%; vertical-align: top;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td colspan="2" style="font-weight: bold; text-align: left; padding-bottom: 2%;">III. DEDUCTION (Potongan Karyawan)</td>
						</tr>
						@foreach($value->d as $key2 => $value2)
							<?php
								$totalDeduction += (float) $value2->columnValue;
							?>
							<tr>
								<td width="55%">{{ $value2->columnLabel }}</td>
								<td width="45%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
					</table>
				</td>
				<td style="width:33%; vertical-align: top;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td colspan="2" style="font-weight: bold; text-align: left; padding-bottom: 2%;">IV. COMPANY (Beban Perusahaan)</td>
						</tr>
						@foreach($value->c as $key2 => $value2)
							<?php
								$totalCompany += (float) $value2->columnValue;
							?>
							<tr>
								<td width="55%">{{ $value2->columnLabel }}</td>
								<td width="45%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
					</table>
				</td>
			</tr>
			<tr>
				<td style="width:33%; vertical-align: top;">
					<table style="width:100%; border-collapse: collapse;">
						<tr>
							<td colspan="2" style="font-weight: bold; text-align: left; padding-bottom: 2%;">II. BENEFIT (Tunjangan Lain)</td>
						</tr>
						@foreach($value->b as $key2 => $value2)
							<?php
								$totalBenefit += (float) $value2->columnValue;
							?>
							<tr>
								<td width="55%">{{ $value2->columnLabel }}</td>
								<td width="45%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endforeach
					</table>
				</td>
				<td colspan="2" style="width:67%; vertical-align: top;">
					&nbsp;
				</td>
			</tr>
		</table>
		<br />
		<table class="table">
			<tr>
				<td style="width:33%; vertical-align: top;">
					<table style="width:100%; border-collapse: collapse;">
						<tbody style="font-weight: bold;">
							<tr>
								<td>Total Allowance</td>
								<td align="right">{{ number_format($totalAllowance, 0, ',', '.') }}</td>
							</tr>
							<tr>
								<td>Total Benefit</td>
								<td align="right">{{ number_format($totalBenefit, 0, ',', '.') }}</td>
							</tr>
							<tr>
								<td>Total Deduction</td>
								<td align="right">{{ number_format($totalDeduction, 0, ',', '.') }}</td>
							</tr>
							<tr>
								<td>THP</td>
								<td align="right">{{ number_format($THP, 0, ',', '.') }}</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td colspan="2" style="width:67%; vertical-align: top;">
					&nbsp;
				</td>
			</tr>
		</table>

		@if($key != array_key_last($data))
			<div class="page_break"></div>
		@endif
    @endforeach
</body>
</html>