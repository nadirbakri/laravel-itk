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
            <td style="width:70%; vertical-align: top;">
                <table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Bold', sans-serif;">
                    <tr>
                        <th colspan="2" style="text-align: left; font-size: 14px; padding-bottom: 4px;">{{ strtoupper($value->namaPerusahaan) }}</th>
                    </tr>
                    <tr>
                        <td width="25%" style="text-align:left; font-size: 14px; padding-bottom: 4px;">SALARY SLIP</td>
                        <td width="75%" style="text-align:left; font-size: 14px; padding-bottom: 4spx;">{{ $periode }}</td>
                    </tr>
					<tr>
						<th colspan="2" style="font-size: 14px; text-align:left; color: red; font-family: 'Arial Bold', sans-serif;">*CONFIDENTIAL</th>
                    </tr>
                </table>
            </td>
            <td style="width:30%; vertical-align: top;">
                <table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Bold', sans-serif;">
                    <tr>
                        <td style="text-align:right;">
                            @if($display_logo == "1")
							    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_mmi.jpg'))) }}" style="margin-left: 100px; width: 165px; height: 55px" alt="Logo">
                            @endif
						</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
	<br><br>
	<table style="width:100%; padding-left:2%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td width="18%">NAME / ID</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->employeeName }} / {{ $value->employeeNo }}</td>
			<td width="19%">Gol</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="32%">{{ $value->golongan }}</td>
		</tr>
		<tr>
			<td width="18%">Position</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->position }}</td>
			<td width="19%">PTKP</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="32%">{{ $value->taxStatus }}</td>
		</tr>
		<tr>
			<td width="18%">Dept.</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->departemen }}</td>
			<td width="19%">NPWP</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="32%">{{ $value->npwp }}</td>
		</tr>
		<tr>
			<td width="18%">Location</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="34%">{{ $value->location }}</td>
			<td width="19%">Email</td>
			<td width="2%" style="text-align:center;">:</td>
			<td width="32%">{{ $value->email }}</td>
		</tr>
	</table>
	<br><br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	?>
	<table class="no-page-break" style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<th style="width: 48%; text-align: left; padding-left: 2.5%; padding-top: 0.4%;">INCOME</th>
			<th style="width: 52%; text-align: left; padding-left: 6%; padding-top: 0.4%;">DEDUCTION</th>
		</tr>
		
	</table>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-top: 0.7%; padding-left:1.5%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:30%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<tr>
							<td style="width: 70%; text-align: left; padding-top: 0.4%; padding-left: 3%;">{{ $value2->columnLabel }}</td>
							<td style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
				</table>
			</td>
			<td style="width:20%; vertical-align: top;"></td>
			<td style="width:30%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<tr>
							<td style="width: 70%; text-align: left; padding-top: 0.4%;">{{ $value2->columnLabel }}</td>
							<td style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 7%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
				</table>
			</td>
			<td style="width:20%; vertical-align: top;"></td>
		</tr>
	</table>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-left:1.5%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:30%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<th style="width: 70%; text-align: left; padding-top: 0.4%; padding-left: 3%;">Total Income (A)</th>
						<th style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $totalIncome, 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
			<td style="width:20%; vertical-align: top;"></td>
			<td style="width:30%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<th style="width: 70%; text-align: left; padding-top: 0.4%;">Total Deduction (B)</th>
						<th style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 7%;">{{ number_format((float) $totalDeduction, 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
			<td style="width:20%; vertical-align: top;"></td>
		</tr>
	</table>
	<br>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-left:1.5%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:30%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<th style="width: 70%; text-align: left; padding-top: 0.4%; padding-left: 3%; font-size: 14px;">Take Home Pay (A-B)</th>
						<th style="width: 30%; text-align: right; padding-top: 0.4%; padding-right: 17%; font-size: 14px;">{{ number_format((float) $value->takeHomePaySalary, 0, ',', '.')}}</th>
					</tr>
				</table>
			</td>
			<td style="width:70%; vertical-align: top;"></td>
		</tr>
	</table>
	<br>
	<table class="no-page-break" style="width:100%; padding-left:1.5%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<th style="width: 30%; text-align: left; padding-left: 2.5%; padding-top: 0.4%; padding-bottom: 0.6%;">NOTE :</th>
			<th style="width: 70%; text-align: left; padding-left: 3.5%; padding-top: 0.4%; padding-bottom: 0.6%;"></th>
		</tr>
	</table>
	<table class="table no-page-break" style="width:100%; font-size: 14px; padding-left:1.5%; padding-right:0.1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:30%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<td style="width: 59%; text-align: left; padding-top: 0.4%; padding-left: 3%;">Leave Balance (days)</td>
						<td style="width: 1%; text-align: left; padding-top: 0.4%;">:</td>
						<td style="width: 40%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value->leaveBalance, 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td style="width: 59%; text-align: left; padding-top: 0.4%; padding-left: 3%;">Taken Balance (days)</td>
						<td style="width: 1%; text-align: left; padding-top: 0.4%;">:</td>
						<td style="width: 40%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value->takenLeave, 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td style="width: 59%; text-align: left; padding-top: 0.4%; padding-left: 3%;">Sick Balance (days)</td>
						<td style="width: 1%; text-align: left; padding-top: 0.4%;">:</td>
						<td style="width: 40%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value->sickleave, 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td style="width: 59%; text-align: left; padding-top: 0.4%; padding-left: 3%;">Work days</td>
						<td style="width: 1%; text-align: left; padding-top: 0.4%;">:</td>
						<td style="width: 40%; text-align: right; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value->attendance, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
			<td style="width:20%; vertical-align: top;"></td>
			<td style="width:35%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td style="width: 49%; text-align: left; padding-top: 0.4%;">Medical Balance - {{ date('Y', strtotime($period)) }}</td>
						<td style="width: 1%; text-align: left; padding-top: 0.4%;">:</td>
						<td style="width: 50%; text-align: right; padding-top: 0.4%; padding-right: 6%;">{{ number_format((float) $value->medicalBalance, 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td style="width: 49%; text-align: left; padding-top: 0.4%;">Remittance To</td>
						<td style="width: 1%; text-align: left; padding-top: 0.4%;">:</td>
						<td style="width: 50%; text-align: right; padding-top: 0.4%; padding-right: 6%;">{{ $value->bankName }}</td>
					</tr>
					<tr>
						<td style="width: 49%; text-align: left; padding-top: 0.4%;">Beneficiary No</td>
						<td style="width: 1%; text-align: left; padding-top: 0.4%;">:</td>
						<td style="width: 50%; text-align: right; padding-top: 0.4%; padding-right: 6%;">{{ $value->noRekening }}</td>
					</tr>
					<tr>
						<td style="width: 49%; text-align: left; padding-top: 0.4%;">Account Name</td>
						<td style="width: 1%; text-align: left; padding-top: 0.4%;">:</td>
						<td style="width: 50%; text-align: right; padding-top: 0.4%; padding-right: 6%;">{{ $value->beneficiaryName }}</td>
					</tr>
				</table>
			</td>
			<td style="width:15%; vertical-align: top;"></td>
		</tr>
	</table>
	@if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
	@endforeach
</main>
</body>
</html>