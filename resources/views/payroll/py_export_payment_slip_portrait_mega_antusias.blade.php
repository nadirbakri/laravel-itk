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
            font-family: 'ArialAlternates';
            font-style: normal;
            font-weight: normal;
            src: url({{ storage_path('fonts/arial.ttf') }}) format('truetype');
        }

		@font-face {
            font-family: 'ArialCustomBold';
            font-style: normal;
            font-weight: 700;
            src: url({{ storage_path('fonts/arialbold.ttf') }}) format('truetype');
        }

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
		.table_detail{
			border-collapse:collapse;
		}	

		.div-footer {
			position: relative; 
			bottom: -2.8cm; 
			left: 0cm; 
			right: 0cm;
			height: 5.7cm;
			font-size: 7.5px;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	@foreach($data as $key => $value)
    <table class="table" style="width:100%; padding-left:3%; padding-right:3%; padding-bottom:1%; font-family: 'ArialCustomBold', sans-serif;">
		<tr>
			<td style="padding: 0; margin: 0; text-align:left; font-size: 14px;">
				{{ strtoupper($value->namaPerusahaan) }}
			</td>
		</tr>
		<tr>
			<td style="padding: 0; margin: 0; text-align:left; font-size: 14px;">
				@if($slip_code == 'Salary')
                BUKTI PENERIMAAN GAJI
                @elseif($slip_code == 'Bonus')
                BUKTI PENERIMAAN BONUS
                @elseif($slip_code == 'THR')
                BUKTI PENERIMAAN THR
                @endif
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:3%; padding-right:3%; border-collapse: collapse; font-family: 'ArialCustomBold', sans-serif; border-bottom: 1px solid black;">
        <tr>
			<td width="15%" style="padding-left: 10px;">BULAN</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->payrollCutOff }}</td>
			<td width="15%" style="padding-left: 10px;">Kode Wilayah</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->level2 }}</td>
		</tr>
		<tr>
			<td width="15%" style="padding-left: 10px;">NIK/Status Pjk</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->employeeNo }} / {{ $value->ptkp }}</td>
			<td width="15%" style="padding-left: 10px;">Kode Lokasi</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->level3 }}</td>
		</tr>
		<tr>
			<td width="15%" style="padding-left: 10px;">Nama</td>
			<td width="1%" style="">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->employeeName }}</td>
			<td width="15%" style="padding-left: 10px;">Kode Toko</td>
			<td width="1%" style="">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->level5 }}</td>
		</tr>
	</table>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	$totalDataIncome = 0;
	$totalDataDeduction = 0;
	?>
	<table class="table" style="width:100%; font-size: 12px; padding-left:3%; padding-right:3%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
		@if($slip_code == 'Salary')
    	<tr>
        	<td style="width:55%; vertical-align: top; padding-right: 50px;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
                    <tr>
                        <td colspan="4">PENDAPATAN&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                    </tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<?php
							$totalDataIncome++;
						?>
						<tr>
							<td width="25%" style="padding-left: 20px;">{{ $value2->columnLabel }}</td>
                            <td width="1%">:</td>
							<td width="8%">Rp.</td>
							<td width="8%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
                    <tr>
                        <td width="25%" style="padding-left: 20px;">Total Pendapatan</td>
                        <td width="1%">:</td>
                        <td width="8%" style="border-top: 1px solid black;">Rp.</td>
                        <td width="8%" style="text-align:right; border-top: 1px solid black;">{{ number_format((float) $totalIncome, 0, ',', '.')}}</td>
                    </tr>
				</table>
			</td>
			<td style="width:45%; vertical-align: top; padding-right: 10px;">
				<table style="width:100%; border-collapse: collapse;">
                    <tr>
                        <td colspan="4">POTONGAN&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                    </tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<?php
							$totalDataDeduction++;
						?>
						<tr>
							<td width="17%" style="padding-left: 20px;">{{ $value2->columnLabel }}</td>
                            <td width="1%">:</td>
							<td width="5%">Rp.</td>
							<td width="8%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
					<tr>
                        <td width="17%" style="padding-left: 20px;">Total Potongan</td>
                        <td width="1%">:</td>
                        <td width="5%" style="border-top: 1px solid black;">Rp.</td>
                        <td width="8%" style="text-align:right; border-top: 1px solid black;">{{ number_format((float) $totalDeduction, 0, ',', '.')}}</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="17%" style="padding-left: 20px;">Total Diterima</td>
                        <td width="1%">:</td>
                        <td width="5%">Rp.</td>
                        <td width="8%" style="text-align:right;">{{ number_format(($value->takeHomePaySalary + $value->takeHomePayBonus + $value->takeHomePayTHR), 0, ',', '.')}}</td>
                    </tr>
				</table>
			</td>
		</tr>
		@elseif($slip_code == 'THR')
		<tr>
        	<td style="width:55%; vertical-align: top; padding-right: 50px;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<?php
							$totalDataIncome++;
						?>
						<tr>
							<td width="25%" style="padding-left: 20px;">{{ $value2->columnLabel }}</td>
                            <td width="1%">:</td>
							<td width="8%">Rp.</td>
							<td width="8%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<?php
							$totalDataDeduction++;
						?>
						<tr>
							<td width="17%" style="padding-left: 20px;">{{ $value2->columnLabel }}</td>
                            <td width="1%">:</td>
							<td width="5%">Rp.</td>
							<td width="8%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
					<br>
                    <tr>
                        <td width="25%" style="padding-left: 20px;">THR Bersih</td>
                        <td width="1%">:</td>
                        <td width="8%" style="border-top: 1px solid black;">Rp.</td>
                        <td width="8%" style="text-align:right; border-top: 1px solid black;">{{ number_format((float) ($totalIncome - $totalDeduction), 0, ',', '.')}}</td>
                    </tr>
					<br><br><br><br>
					<tr>
                        <td width="25%" style="padding-left: 20px;">Jumlah</td>
                        <td width="1%">:</td>
                        <td width="8%">Rp.</td>
                        <td width="8%" style="text-align:right;">{{ number_format((float) ($totalIncome - $totalDeduction), 0, ',', '.')}}</td>
                    </tr>
					<br>
					<tr>
                        <td width="25%" style="padding-left: 20px;">THR Diterima</td>
                        <td width="1%">:</td>
                        <td width="8%">Rp.</td>
                        <td width="8%" style="text-align:right;">{{ number_format($value->takeHomePayTHR, 0, ',', '.')}}</td>
                    </tr>
				</table>
			</td>
		</tr>
		@endif
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:3%; padding-right:3%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
		@if($slip_code == 'Salary')
    	<tr>
        	<td style="width:55%; vertical-align: top; padding-right: 50px;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
				</table>
			</td>
			<td style="width:45%; vertical-align: top; padding-right: 10px;">
				<table style="width:100%; border-collapse: collapse;">
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">Jakarta, {{ date('d', strtotime($transfer_date)) }} {{ $periode }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">Yang Menerima</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">(&nbsp;&nbsp;&nbsp;&nbsp; {{ $value->employeeName }} &nbsp;&nbsp;&nbsp;&nbsp;)</td>
                    </tr>
				</table>
			</td>
		</tr>
		@elseif($slip_code == 'THR')
		<br>
		<tr>
        	<td style="width:55%; vertical-align: top; padding-right: 50px;">
				<table style="width:100%; border-collapse: collapse;">
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">Jakarta, {{ date('d', strtotime($transfer_date)) }} {{ $periode }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">Yang Menerima</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">(&nbsp;&nbsp;&nbsp;&nbsp; {{ $value->employeeName }} &nbsp;&nbsp;&nbsp;&nbsp;)</td>
                    </tr>
				</table>
			</td>
		</tr>
		@endif
	</table>
	<div class="div-footer" style="font-family: 'Arial Alternates', sans-serif;">
		<table class="table" style="width:100%; font-size: 12px; padding-left:3%; padding-right:3%; border-collapse: collapse; font-family: 'ArialCustomBold', sans-serif; border-top: 1px solid black;">
			<tr>
				<td width="5%" style="padding-left: 10px;">No ID</td>
				<td width="1%">:</td>
				<td width="34%" style="padding-left: 5px;">{{ $value->nik }}</td>
				<td width="5%" style="padding-left: 10px;">Email</td>
				<td width="1%">:</td>
				<td width="34%" style="padding-left: 5px;">{{ $value->email }}</td>
			</tr>
		</table>
	</div>

    @if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
    @endforeach
</body>
</html>