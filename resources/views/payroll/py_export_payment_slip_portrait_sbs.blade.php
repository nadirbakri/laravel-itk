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
			font-size: 11px;
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

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	@foreach($data as $key => $value)
    <table class="table" style="width:100%; padding-left:5%; padding-right:15%; padding-bottom:1%; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td style="padding: 0; margin: 0; text-align:left; font-size: 13px; font-weight: 700;">
				{{ strtoupper($value->namaPerusahaan) }}
			</td>
            @if($display_logo == "1")
			<td width="20%" rowspan="3" style="text-align:right;">
				<table style="width: 100%;">
					<tr>
						<td style="text-align:right;">
							<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_sbs.png'))) }}" style="width: 60px; height: 60px" alt="Logo">
						</td>
					</tr>
				</table>
			</td>
			@else
			<td width="20%" rowspan="3" style="text-align:right;">&nbsp;</td>
			@endif
		</tr>
		<tr>
			<td colspan="2" style="padding: 0; margin: 0; text-align:center; font-size: 13px; font-weight: 700;">
				SLIP GAJI
			</td>
		</tr>
        <tr>
			<td colspan="2" style="padding: 0; margin: 0; text-align:center; font-size: 13px; font-weight: 700;">
				{{ strtoupper($value->slipPeriod) }}
			</td>
		</tr>
	</table>
	<br>
	<table class="table" style="width:100%; padding-left:5%; padding-right:5%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td width="12%">Nama</td>
			<td width="1%">:</td>
			<td width="32%" style="padding-left: 10px;">{{ $value->employeeName }}</td>
            <td width="10%">&nbsp;</td>
			<td width="12%">No. Rekening</td>
			<td width="1%">:</td>
			<td width="32%" colspan="2">{{ $value->noRekening }}</td>
		</tr>
		<tr>
			<td width="12%">NIK</td>
			<td width="1%">:</td>
			<td width="32%" style="padding-left: 10px;">{{ $value->employeeNo }}</td>
            <td width="10%">&nbsp;</td>
			<td width="8%">Departemen</td>
			<td width="1%">:</td>
			<td width="32%">{{ $value->departemen }}</td>
		</tr>
	</table>
	<br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	?>
	<table class="table" style="width:100%; padding-left:5%; padding-right:6%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:40%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<td colspan="3" style="text-align: left; padding-bottom: 1%; font-weight: 700;">PENERIMAAN :</td>
					</tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<tr>
							<td width="45%">{{ $value2->columnLabel }}</td>
							<td width="3%">:</td>
							<td width="27%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
                            <td width="25%">&nbsp;</td>
						</tr>
					@endforeach
				</table>
			</td>
            <td style="width:10%; vertical-align: top;">&nbsp;</td>
			<td style="width:40%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="3" style="text-align: left; padding-bottom: 1%; font-weight: 700;">PEMOTONGAN :</td>
					</tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<tr>
							<td width="45%">{{ $value2->columnLabel }}</td>
							<td width="3%">:</td>
							<td width="27%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
                            <td width="25%">&nbsp;</td>
						</tr>
					@endforeach
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; padding-left:5%; padding-right:6%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:40%; padding-top: 1%; padding-bottom: 1%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
                    <tr>
						<td width="45%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="27%" style="text-align: right; padding-right: 10px; border-top: 1px solid black;">&nbsp;</td>
                        <td width="25%">&nbsp;</td>
					</tr>
					<tr>
						<td width="45%">TOTAL PENERIMAAN</td>
						<td width="3%">:</td>
						<td width="27%" style="text-align: right; padding-right: 10px;">{{ number_format($totalIncome, 0, ',', '.')}}</td>
                        <td width="25%">&nbsp;</td>
					</tr>
                    <tr>
						<td colspan="4">&nbsp;</td>
					</tr>
                    <tr>
						<td width="45%" style="font-weight: 700;">UPAH YANG DITERIMA</td>
						<td width="3%" style="font-weight: 700;">:</td>
						<td width="27%" style="text-align: right; padding-right: 10px; font-weight: 700;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}}</td>
                        <td width="25%">&nbsp;</td>
					</tr>
				</table>
			</td>
            <td style="width:10%; vertical-align: top;">&nbsp;</td>
			<td style="width:40%; padding-top: 1%; padding-bottom: 1%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
                    <tr>
						<td width="45%">&nbsp;</td>
						<td width="3%">&nbsp;</td>
						<td width="27%" style="text-align: right; padding-right: 10px; border-top: 1px solid black;">&nbsp;</td>
                        <td width="25%">&nbsp;</td>
					</tr>
					<tr>
						<td width="45%">TOTAL POTONGAN</td>
						<td width="3%">:</td>
						<td width="27%" style="text-align: right;">{{ number_format($totalDeduction, 0, ',', '.')}}</td>
                        <td width="25%">&nbsp;</td>
					</tr>
                    <tr>
						<td colspan="4">&nbsp;</td>
					</tr>
                    <tr>
						<td width="45%">Diterima di rekening tgl</td>
						<td width="3%">:</td>
						<td width="27%" style="text-align: right;">{{ $transfer_date }}</td>
                        <td width="25%">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

    @if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
    @endforeach
    <script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            $text = sprintf(_("Page %d/%d"),  $PAGE_NUM, $PAGE_COUNT);
            // Uncomment the following line if you use a Laravel-based i18n
            //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.5;  //  default
            $char_space = 0.5;  //  default
            $angle = 0.5;   //  default

            // Compute text width to center correctly
            $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

            $x = ($pdf->get_width() - $textWidth) / 2;
            $y = $pdf->get_height() - 35;

            $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script>
</body>
</html>