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

		.div-footer {
			position: fixed; 
			bottom: -0.8cm; 
			left: 0cm; 
			right: 0cm;
			height: 2cm;
			font-size: 7.5px;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
@foreach($data as $key => $value)
<main>
    <table style="width:100%; padding-left:1%; padding-right:1%;">
		<tr>
			<td width="80%" rowspan="4" style="text-align:right;">&nbsp;</td>
            <th width="20%" style="font-size: 12px; text-align:right; color: red; font-family: 'Arial Bold', sans-serif;">*CONFIDENTIAL</th>
		</tr>
		<tr>
			<td width="20%" rowspan="3">&nbsp;</td>
		</tr>
	</table>
	<br><br>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Bold', sans-serif;">
		<tr>
			<th width="80%" style="text-align: left; font-size: 16px;">{{ $value->namaPerusahaan }}</th>
			<th width="20%" style="text-align:right; font-size: 16px;">PAYSLIP</th>
		</tr>
	</table>
	<br>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td width="18%">Payroll cut off</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->payrollCutOff }}</td>
			<td width="18%">Bank Account No.</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="33%">{{ $value->noRekening }}</td>
		</tr>
		<tr>
			<td width="18%">ID / Name</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->employeeNo }} / {{ $value->employeeName }}</td>
			<td width="18%">Email</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="33%">{{ $value->email }}</td>
		</tr>
		<tr>
			<td width="18%">Job position</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->jabatan }}</td>
            <td colspan="3" width="54%">&nbsp;</td>
		</tr>
		<tr>
			<td width="18%">Divisi</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->level }}</td>
			<td colspan="3" width="54%">&nbsp;</td>
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
			<th style="width: 48%; text-align: left; padding-left: 3%; padding-top: 0.4%; padding-bottom: 0.6%; background-color: #e2e2e2;">{{ empty($value->a_Name) ? '' : $value->a_Name }}</th>
			<th style="width: 52%; text-align: left; padding-left: 4%; padding-top: 0.4%; padding-bottom: 0.6%; background-color: #e2e2e2;">{{ empty($value->d_Name) ? '' : $value->d_Name }}</th>
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
						@if(!empty($value2->columnValue) && $value2->columnValue != 0)
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
						@if(!empty($value2->columnValue) && $value2->columnValue != 0)
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
	<table class="no-page-break" style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<th style="width: 48%; text-align: left; padding-left: 3%; padding-top: 0.4%; padding-bottom: 0.6%;">{{ empty($value->b_Name) ? '' : $value->b_Name }}</th>
			<th style="width: 52%; text-align: left; padding-left: 3.5%; padding-top: 0.4%; padding-bottom: 0.6%;">{{ empty($value->c_Name) ? '' : $value->c_Name }}</th>
		</tr>
	</table>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-top: 0.7%; padding-left:1%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:48%; vertical-align: top;">
				@if(!empty($value->b))
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse; border-top: 1px solid #e2e2e2;">
					@foreach($value->b as $key2 => $value2)
						<?php
							$totalBenefit += (float) $value2->columnValue;
						?>
						@if(!empty($value2->columnValue) && $value2->columnValue != 0)
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
				@endif
			</td>
			<td style="width:52%; vertical-align: top;">
				@if(!empty($value->c))
				<table style="width:100%; border-collapse: collapse; border-top: 1px solid #e2e2e2;">
					@foreach($value->c as $key2 => $value2)
						@if(!empty($value2->columnValue) && $value2->columnValue != 0)
							<tr>
								<td style="width: 42%; text-align: left; padding-top: 0.4%; padding-left: 2%;">{{ $value2->columnLabel }}</td>
								<td style="width: 10%; text-align: right; padding-top: 0.4%; padding-right: 6%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}d</td>
							</tr>
						@endif
					@endforeach
				</table>
				@endif
			</td>
		</tr>
	</table>
	<div class="div-footer" style="font-family: 'Arial Alternates', sans-serif;">
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
		</div>
	@if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
	@endforeach
</main>
</body>
</html>