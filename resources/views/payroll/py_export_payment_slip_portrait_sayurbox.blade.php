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
			font-size: 13px;
		}

		.no-page-break {
			page-break-inside: avoid;
		}

		footer {
			position: fixed; 
			bottom: 0cm; 
			left: 0cm; 
			right: 0cm;
			height: 4.2cm;
			font-size: 9.5px;
			font-family: 'Arial Bold', sans-serif;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
<main>
@foreach($data as $key => $value)
    <table style="width:100%; padding-left:1%; padding-right:1%;">
		<tr>
			@if($display_logo == "1")
            <td width="30%" rowspan="4" style="text-align:right;">
				<table style="width: 100%;">
					<tr>
						<td>
							<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_sayurbox.png'))) }}" style="width: 175px; height: 35px" alt="Logo">
						</td>
					</tr>
				</table>
			</td>
			<td width="50%" rowspan="4">&nbsp;</td>
			@else
			<td width="80%" rowspan="4" style="text-align:right;">&nbsp;</td>
			@endif
            <th width="20%" style="font-size: 12px; text-align:right; color: red; font-family: 'Arial Bold', sans-serif;">*CONFIDENTIAL</th>
		</tr>
		<tr>
			<td width="20%" rowspan="3">&nbsp;</td>
		</tr>
	</table>
	<br><br>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Bold', sans-serif;">
		<tr>
			<th width="80%" style="text-align: left; font-size: 16px;">PT. Kreasi Nostra Mandiri (Bogor)</th>
			<th width="20%" style="text-align:right; font-size: 16px;">PAYSLIP</th>
		</tr>
	</table>
	<br>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td width="18%">Payroll cut off</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->payrollCutOff }}</td>
			<td width="18%">Grade / Level</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="33%">{{ $value->grade }} / {{ $value->level }}</td>
		</tr>
		<tr>
			<td width="18%">ID / Name</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->employeeNo }} / {{ $value->employeeName }}</td>
			<td width="18%">PTKP</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="33%">{{ $value->ptkp }}</td>
		</tr>
		<tr>
			<td width="18%">Job position</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->jabatan }}</td>
			<td width="18%">NPWP</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="33%">{{ $value->npwp }}</td>
		</tr>
		<tr>
			<td width="18%">Organization</td>
			<td width="2%" style="text-align:center;">:</td>
			<td colspan="4" width="80%">{{ $value->organisasi }}</td>
		</tr>
	</table>
	<br><br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	$totalBenefit = 0;
	?>
	<table class="no-page-break" style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<th style="width: 48%; text-align: left; padding-left: 3%; padding-top: 0.4%; padding-bottom: 0.6%; background-color: #e2e2e2;">Earnings</th>
			<th style="width: 52%; text-align: left; padding-left: 4%; padding-top: 0.4%; padding-bottom: 0.6%; background-color: #e2e2e2;">Deductions</th>
		</tr>
		
	</table>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-top: 0.7%; padding-left:1%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:48%; vertical-align: top; border-left: 1px solid #e2e2e2; border-right: 1px solid #e2e2e2;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
							<tr>
								<td style="width: 38%; text-align: left; padding-top: 0.4%; padding-left: 3%;">{{ $value2->columnLabel }}</td>
								<td style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endif
					@endforeach
				</table>
			</td>
			<td style="width:52%; vertical-align: top; border-left: 1px solid #e2e2e2; border-right: 1px solid #e2e2e2;">
				<table style="width:100%; border-collapse: collapse;">
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
							<tr>
								<td style="width: 42%; text-align: left; padding-top: 0.4%; padding-left: 2%;">{{ $value2->columnLabel }}</td>
								<td style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 7%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endif
					@endforeach
				</table>
			</td>
		</tr>
	</table>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-left:1%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:48%; vertical-align: top; border-left: 1px solid #e2e2e2; border-top: 1px solid #e2e2e2; border-bottom: 1px solid #e2e2e2;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<th style="width: 38%; text-align: left; padding-top: 0.4%; padding-left: 3%;">Total earnings</th>
						<td style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $totalIncome, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
			<td style="width:52%; vertical-align: top; border-right: 1px solid #e2e2e2; border-top: 1px solid #e2e2e2; border-bottom: 1px solid #e2e2e2;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<th style="width: 42%; text-align: left; padding-top: 0.4%; padding-left: 2%;">Total deductions</th>
						<td style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 6%;">{{ number_format((float) $totalDeduction, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-left:1%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:48%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<th style="width: 38%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</th>
						<td style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 15%;">&nbsp;</td>
					</tr>
				</table>
			</td>
			<td style="width:52%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<th style="width: 42%; text-align: left; padding-top: 0.4%; padding-left: 2%; font-size: 20px;">Take Home Pay</th>
						<th style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 6%; font-size: 20px;">Rp{{ number_format((float) $value->takeHomePaySalary, 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br><br>
	<table class="no-page-break" style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<th style="width: 48%; text-align: left; padding-left: 3%; padding-top: 0.4%; padding-bottom: 0.6%;">Benefits*</th>
			<th style="width: 52%; text-align: left; padding-left: 3.5%; padding-top: 0.4%; padding-bottom: 0.6%;">Attendance Summary</th>
		</tr>
	</table>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-top: 0.7%; padding-left:1%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:48%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse; border-top: 1px solid #e2e2e2;">
					@foreach($value->b as $key2 => $value2)
						<?php
							$totalBenefit += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
							<tr>
								<td style="width: 38%; text-align: left; padding-top: 0.4%; padding-left: 3%;">{{ $value2->columnLabel }}</td>
								<td style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
							</tr>
						@endif
					@endforeach
					<tr>
						<th style="width: 38%; text-align: left; padding-top: 0.4%; padding-left: 3%;">Total benefits</th>
						<th style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $totalBenefit, 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
			<td style="width:52%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse; border-top: 1px solid #e2e2e2;">
					@foreach($value->c as $key2 => $value2)
						@if($value2->columnValue > 0)
							<tr>
								<td style="width: 42%; text-align: left; padding-top: 0.4%; padding-left: 2%;">{{ $value2->columnLabel }}</td>
								<td style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 6%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}d</td>
							</tr>
						@endif
					@endforeach
				</table>
			</td>
		</tr>
	</table>

	@if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
	@endforeach
</main>
<footer>
	*These are the benefits you'll get from the company, but not included in your take-home pay (THP).
	<br>
	*Overtime duration (in hours) grouped by each multiplier
	<br><br>
	THIS IS COMPUTER GENERATED PRINTOUT AND NO SIGNATURE IS REQUIRED
	<br><br>
	PLEASE NOTE THAT THE CONTENTS OF THIS STATEMENT SHOULD BE TREATED WITH ABSOLUTE CONFIDENTIALITY EXCEPT TO THE EXTENT YOU ARE REQUIRED TO
	MAKE DISCLOSURE FOR ANY TAX, LEGAL, OR REGULATORY PURPOSES. ANY BREACH OF THIS CONFIDENTIALITY OBLIGATION WILL BE DEALT WITH SERIOUSLY, WHICH
	MAY INVOLVE DISCPLINARY ACTION BEING TAKEN.
	<br><br>
	HARAP DIPERHATIKAN, ISI PERNYATAAN INI ADALAH RAHASIA KECUALI ANDA DIMINTA UNTUK MENGUNGKAPKANNYA UNTUK KEPERLUAN PAJAK, HUKUM, ATAU
	KEPENTINGAN PEMERINTAH. SETIAP PELANGGARAN ATAS KEWAJIBAN MENJAGA KERAHASIAAN INI AKAN DIKENAKAN SANKSI, YANG MUNGKIN BERUPA TINDAKAN
	KEDISIPLINAN.
	<br><br>
	<table style="width:100%;">
		<tr>
			<td style="text-align: left;"><b>This payslip is generated by Stream</b></td>
			<td style="text-align: right;"><b>https://outsource-payroll.intikom.net</b></td>
		</tr>
	</table>

</footer>
</body>
</html>