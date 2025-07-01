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
			font-size: 10px;
		}

		.no-page-break {
			page-break-inside: avoid;
		}

		.div-footer {
			position: fixed;
			bottom: -0.8cm;
			left: 0cm;
			right: 0cm;
			height: 2cm;
			font-size: 7.5px;
		}

		.page_break { page-break-before: always; }

		.watermark {
			position: absolute;
			top: 40%;
			left: 35%;
			opacity: 0.08;
			z-index: -1;
			width: 250px;
			height: auto;
		}

		.watermark-container {
			position: relative;
			z-index: 1;
		}

		main {
			position: relative;
			z-index: 2;
		}
	</style>
</head>
<body>
@foreach($data as $key => $value)
<div class="watermark-container">
    @if($display_logo == "1")
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_mca.png'))) }}"
             class="watermark" alt="Watermark Logo">
    @endif

    <main>

    <table style="width:95%; margin-left: 15px; margin-right: 20px;">
        <tr>
            <td style="width:70%; vertical-align: top;">
                <table style="width:100%; margin-top: 2%; border-collapse: collapse; font-family: 'Arial Bold', sans-serif;">
                    <tr>
                        <th style="text-align: left; font-size: 15px; padding-bottom: 4px;">SLIP GAJI</th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
	<table style="width:95%; margin-left: 20px; margin-right: 20px; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td colspan="7" style="font-size: 13px;">{{ $value->namaPerusahaan }}</td>
		</tr>
        <tr>
			<td width="10%">BULAN</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="22.5%">{{ $periode }}</td>
            <td></td>
			<td width="10%">RANK</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="22%">{{ $value->rank }}</td>
            <td></td>
            <td colspan="2">{{ $value->bankName }}</td>
		</tr>
		<tr>
			<td width="10%">NIP</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="22.5%">{{ $value->employeeNo }}</td>
            <td></td>
			<td width="15%">DEPARTMENT</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="22%">{{ $value->level2 }}</td>
            <td></td>
            <td colspan="2">{{ $value->noRekening }}</td>
		</tr>
        <tr>
            <td width="10%">NAMA</td>
            <td width="1%" style="text-align:center;">:</td>
            <td width="22.5%">{{ $value->employeeName }}</td>
            <td></td>
            <td width="10%">SECTION</td>
            <td width="1%" style="text-align:center;">:</td>
            <td colspan="2">{{ $value->level3 }}</td>
        </tr>
		<tr>
            <td width="10%">STATUS</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="22.5%">{{ $value->taxStatus }}</td>
            <td></td>
			<td width="15%">LOKASI</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="22%">{{ $value->location }}</td>
            <td></td>
            <td colspan="2">{{ $value->employmentStatus }}</td>
		</tr>
        <tr>
			<td width="10%">TGL MASUK</td>
			<td width="1%" style="text-align:center;">:</td>
			<td width="22.5%">{{ \Carbon\Carbon::parse($value->tanggalMasuk)->format('d-M-Y') }}</td>

		</tr>
	</table>
	<br><br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	$totalCompany = 0;
	$totalBenefit = 0;
	?>
	<table class="no-page-break" style="width: 95%; margin-left: 20px; margin-right: 20px; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<th style="width: 33%; font-size: 11px; text-align: left; vertical-align: middle; padding: 10px 0; border-top: 1px solid #000;">
				I. Allowance (Pendapatan)
			</th>
			<th style="width: 33%; font-size: 11px; text-align: left; vertical-align: middle; padding: 10px 0; border-top: 1px solid #000;">
				III. Deduction (Potongan Karyawan)
			</th>
			<th style="width: 33%; font-size: 11px; text-align: left; vertical-align: middle; padding: 10px 0; border-top: 1px solid #000;">
				IV. Company (Beban Perusahaan)
			</th>
		</tr>
	</table>
	<table class="table no-page-break" style="width:95%; margin-left: 20px; margin-right: 20px; font-size: 11px; padding-top: 0.7%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:33%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						@if(!empty($value2->columnValue) && $value2->columnValue != 0)
						<tr>
							<td style="width: 70%; text-align: left; padding-top: 0.4%;">{{ $value2->columnLabel }}</td>
							<td style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 50%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
				</table>
				<br>
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<th colspan="2" style="width: 70%; font-size: 11px; text-align: left; padding-top: 0.4%;">II. Benefit (Tunjangan Lain)</th>
					</tr>
					<tr>
						<th colspan="2">&nbsp;</th>
					</tr>
					@foreach($value->b as $key2 => $value2)
						<?php
							$totalBenefit += (float) $value2->columnValue;
						?>
						@if(!empty($value2->columnValue) && $value2->columnValue != 0)
						<tr>
							<td style="width: 70%; text-align: left; padding-top: 0.4%;">{{ $value2->columnLabel }}</td>
							<td style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 50%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
				</table>
			</td>
			<td style="width:33%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						@if(!empty($value2->columnValue) && $value2->columnValue != 0)
						<tr>
							<td style="width: 70%; text-align: left; padding-top: 0.4%;">{{ $value2->columnLabel }}</td>
							<td style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 50%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
				</table>
			</td>
			<td style="width:33%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					@foreach($value->c as $key2 => $value2)
						<?php
							$totalCompany += (float) $value2->columnValue;
						?>
						@if(!empty($value2->columnValue) && $value2->columnValue != 0)
						<tr>
							<td style="width: 70%; text-align: left; padding-top: 0.4%;">{{ $value2->columnLabel }}</td>
							<td style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 50%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
				</table>
			</td>
		</tr>
	</table>
	<br>
	<table class="table no-page-break" style="width:95%; margin-left: 20px; margin-right: 20px; font-size: 11px; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:33%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 0.5%; border-collapse: collapse;">
					<tr>
						<th style="width: 70%; text-align: left; padding-top: 0.4%;">Total Allowance</th>
						<th style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 47%;">{{ number_format((float) $totalIncome, 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
			<td style="width:67%; vertical-align: top;"></td>
		</tr>
		<tr>
        	<td style="width:33%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 0.5%; border-collapse: collapse;">
					<tr>
						<th style="width: 70%; text-align: left; padding-top: 0.4%;">Total Benefit</th>
						<th style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 47%;">{{ number_format((float) $totalBenefit, 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
			<td style="width:67%; vertical-align: top;"></td>
		</tr>
		<tr>
        	<td style="width:33%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 0.5%; border-collapse: collapse;">
					<tr>
						<th style="width: 70%; text-align: left; padding-top: 0.4%;">Total Deduction</th>
						<th style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 47%;">{{ number_format((float) $totalDeduction, 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
			<td style="width:67%; vertical-align: top;"></td>
		</tr>
		<tr>
        	<td style="width:33%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 0.5%; border-collapse: collapse;">
					<tr>
						<th style="width: 70%; text-align: left; padding-top: 0.4%;">THP</th>
						<th style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 47%;">{{ number_format((float) ($totalIncome + $totalBenefit - $totalDeduction), 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
			<td style="width:67%; vertical-align: top;"></td>
		</tr>
	</table>
	</main>
</div>
	@if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
	@endforeach
</body>
</html>
