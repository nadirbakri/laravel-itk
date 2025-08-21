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
		* { box-sizing: border-box; }

		html {
			font-family: 'Arial Bold', sans-serif;
			margin: 3%;
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
		@if($display_logo === "1")
			@if($companyCode == 'GOC')
				<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_goc.png'))) }}" style="width: 200px;" alt="Logo GOC">
			@elseif($companyCode == 'NAC')
				<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_nac.png'))) }}" style="width: 170px;" alt="Logo NAC">
			@endif
		@endif
		<table class="table" style="font-size: 15px; font-weight: bold;">
			<tr>
				<td style="text-align: center">
					Rincian Upah Bulan {{ $periode }}
				</td>
			</tr>
		</table>
		<br />
		<table class="table" style="font-weight: bold;">
			<tr>
				<td width="20%">Kode Karyawan</td>
				<td width="1%">:</td>
				<td width="29%" style="padding-right: 20px;">{{ $value->employeeNo }}</td>
				<td width="20%" style="padding-left: 20px;">Posisi</td>
				<td width="1%">:</td>
				<td width="29%">{{ $value->position }}</td>
			</tr>
			<tr>
				<td width="20%">Nama Karyawan</td>
				<td width="1%">:</td>
				<td width="29%" style="padding-right: 20px;">{{ $value->employeeName }}</td>
				<td width="20%" style="padding-left: 20px;">Dept</td>
				<td width="1%">:</td>
				<td width="29%">{{ $value->departemen }}</td>
			</tr>
			<tr>
				<td width="20%">No. NPWP</td>
				<td width="1%">:</td>
				<td width="29%" style="padding-right: 20px;">{{ $value->npwp }}</td>
				<td colspan="3" style="padding-left: 20px;">&nbsp;</td>
			</tr>
		</table>
		<br />
		<hr />
		<hr />
		<?php
			$totalIncome = 0;
			$totalDeduction = 0;
			if (!function_exists('terbilang')) {
				function terbilang($angka) {
					$angka = abs($angka);
					$baca = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
					$hasil = "";

					if ($angka < 12) {
						$hasil = " " . $baca[$angka];
					} elseif ($angka < 20) {
						$hasil = terbilang($angka - 10) . " Belas ";
					} elseif ($angka < 100) {
						$hasil = terbilang($angka / 10) . " Puluh " . terbilang($angka % 10);
					} elseif ($angka < 200) {
						$hasil = " Seratus " . terbilang($angka - 100);
					} elseif ($angka < 1000) {
						$hasil = terbilang($angka / 100) . " Ratus " . terbilang($angka % 100);
					} elseif ($angka < 2000) {
						$hasil = " Seribu " . terbilang($angka - 1000);
					} elseif ($angka < 1000000) {
						$hasil = terbilang($angka / 1000) . " Ribu " . terbilang($angka % 1000);
					} elseif ($angka < 1000000000) {
						$hasil = terbilang($angka / 1000000) . " Juta " . terbilang($angka % 1000000);
					} elseif ($angka < 1000000000000) {
						$hasil = terbilang($angka / 1000000000) . " Miliar " . terbilang($angka % 1000000000);
					}

					return trim($hasil);
				}
			}
		?>
		<br />
		<table class="table">
			<tr>
				<td style="width:50%; vertical-align: top;">
					<table class="table">
						@foreach($value->a as $key2 => $value2)
							@if($value2->columnLabel !== 'Total Upah' && $value2->columnLabel !== 'THP')
								<?php
									$totalIncome += (float) $value2->columnValue;
								?>
								<tr>
									<td width="40%">{{ $value2->columnLabel }}</td>
									<td width="1%">:</td>
									<td width="59%" style="text-align:right; padding-right: 20px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
								</tr>
							@endif
						@endforeach
					</table>
				</td>
				<td style="width:50%; vertical-align: top;">
					<table class="table">
						@foreach($value->d as $key2 => $value2)
							@if($value2->columnLabel !== 'Total Potongan')
								<?php
									$totalDeduction += (float) $value2->columnValue;
								?>
								<tr>
									<td width="40%" style="padding-left: 20px;">{{ $value2->columnLabel }}</td>
									<td width="1%">:</td>
									<td width="59%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
								</tr>
							@endif
						@endforeach
					</table>
				</td>
			</tr>
			<tr>
				<td style="width:50%; vertical-align: top;">
					<table class="table">
						<tr>
							<td width="40%" style="text-align: right; padding-right: 10px;">Total Upah</td>
							<td width="1%">:</td>
							<td width="59%" style="text-align:right; padding-right: 20px;">{{ number_format($totalIncome, 0, ',', '.')}}</td>
						</tr>
						<tr>
							<td width="40%" style="text-align: right; padding-right: 10px;">THP</td>
							<td width="1%">:</td>
							<td width="59%" style="text-align:right; padding-right: 20px;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}}</td>
						</tr>
					</table>
				</td>
				<td style="width:50%; vertical-align: top;">
					<table class="table">
						<tr>
							<td width="40%" style="text-align: right; padding-left: 20px; padding-right: 10px;">Total Potongan</td>
							<td width="1%">:</td>
							<td width="59%" style="text-align:right;">{{ number_format($totalDeduction, 0, ',', '.')}}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="table">
			{{-- <tr>
				<td width="20%">Terbilang</td>
				<td width="1%">:</td>
				<td width="79%" style="padding-right: 40px;">{{ terbilang($totalIncome - $totalDeduction) }} Rupiah</td>
			</tr> --}}
		</table>
		<table class="table" style="margin-top: 2%;font-weight: bold;">
			<tr>
				<td width="70%" style="text-align: left; vertical-align: top;">Dibuat Oleh</td>
				<td width="30%" style="text-align: left; vertical-align: top;">Diterima Oleh</td>
			</tr>
			<tr>
				@if($companyCode == 'GOC')
					<td style="position: relative; text-align: left; vertical-align: middle; padding-top: 10px;">
						<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_goc.png'))) }}" 
							style="width: 200px;" alt="Logo GOC">
						<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/ttd_goc_nac.png'))) }}" 
							style="position: absolute; top: -7%; left: 0; width: 180px;" 
							alt="TTD GOC">
					</td>
				@elseif($companyCode == 'NAC')
					<td style="position: relative; text-align: left; vertical-align: middle; padding-top: 10px;">
						<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_nac.png'))) }}" 
							style="width: 170px;" alt="Logo NAC">
						<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/ttd_goc_nac.png'))) }}" 
							style="position: absolute; top: -7%; left: 0; width: 180px;" 
							alt="TTD NAC">
					</td>
				@endif
				<td style="text-align: left; vertical-align: top; padding: 0;">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td width="70%" style="text-align: left; vertical-align: top;">( Nuryani Purba )</td>
				<td width="30%" style="text-align: left; vertical-align: top;">( {{ $value->employeeName }} )</td>
			</tr>
			<tr>
				<td width="70%" style="text-align: left; vertical-align: top;">( ASSISTEN MANAGER FINANCE & ACCOUNTING )</td>
				<td width="30%" style="text-align: left; vertical-align: top;">( {{ $value->position }} )</td>
			</tr>
		</table>

		@if($key != array_key_last($data))
			<div class="page_break"></div>
		@endif
    @endforeach
</body>
</html>