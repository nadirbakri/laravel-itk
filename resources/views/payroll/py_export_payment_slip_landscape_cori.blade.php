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
        .double-layer-hr {
            position: relative;
            border: none; /* Hilangkan garis default */
            height: 0; /* Tidak ada tinggi pada elemen utama */
            margin: 1%; /* Tambahkan jarak atas dan bawah */
        }

        .double-layer-hr:before,
        .double-layer-hr:after {
            content: ""; /* Inisialisasi pseudo-elemen */
            position: absolute;
            left: 0;
            right: 0;
            border-top: 1.5px dashed black; /* Garis dashed */
        }

        .double-layer-hr:before {
            top: -2px; /* Posisi layer pertama */
        }

        .double-layer-hr:after {
            top: 2px; /* Posisi layer kedua */
        }

        hr {
            margin-left:1%; 
            margin-right:1%;
        }

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	@foreach($data as $key => $value)
    <hr>
    <table style="width:100%; padding-left:1%; padding-right:1%;">
		<tr>
            <td width="40%" style="font-size: 16px; text-align:left; font-family: 'Arial Alternates', sans-serif;">PT. CORINTHIAN INDUSTRIES INDONESIA</td>
			@if($display_logo == "1")
            <td width="20%" rowspan="4">&nbsp;</td>
            <td width="40%" rowspan="4" style="text-align:right;">
				<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_cori.png'))) }}" style="width: 205px; height: 45px" alt="Logo">
			</td>
			@else
			<td width="60%" rowspan="4" style="text-align:right; height: 45px">&nbsp;</td>
			@endif
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 13px; padding-left:1%; padding-right:1%; border-collapse: collapse;">
		<tr>
			<td colspan="3" style="padding-bottom: 10px;">Pay Slip</td>
		</tr>
		<tr>
			<td width="15%">For the month of</td>
			<td width="1%">:</td>
			<td width="84%" style="padding-left: 10px;">{{ $periode }}</td>
		</tr>
    </table>
    <table class="table" style="width:100%; font-size: 13px; padding-left:1%; padding-right:1%; padding-bottom: 1%; border-collapse: collapse;">
		<tr>
			<td colspan="3">&nbsp;</td>
			<td width="15%">PAGE</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">25</td>
		</tr>
		<tr>
			<td width="15%">BUNDY</td>
			<td width="1%">:</td>
			<td colspan="4" style="padding-left: 10px;">{{ $value->employeeNo }}</td>
		</tr>
		<tr>
			<td width="15%">NAME</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->employeeName }}</td>
			<td width="15%">DEPT/SECTION</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->jabatan }}</td>
		</tr>
	</table>
    <hr>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	?>
	<table class="table" style="width:100%; font-size: 13px; padding-left:1%; padding-right:1%; border-collapse: collapse;">
    	<tr>
        	<td style="width:50%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: left;">Addition</td>
                        <td colspan="3" style="text-align: left;">:</td>
					</tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<tr>
                            <td width="5%" style="padding-left: 20px;">{{ ($key2 + 1) }}</td>
                            @if($value2->columnLabel == 'TUNJANGAN MAKAN' || $value2->columnLabel == 'TUNJANGAN TRANSPORTASI')
                            <td width="40%" style="padding-left: 5px;">{{ $value2->columnLabel }}</td>
							<td width="32%" style="text-align: center;">
                                <span style="padding-right: 10px;">0.00</span>X<span style="padding-left: 20px;">20,000</span>
                            </td>
                            @else
                            <td colspan="2" style="padding-left: 5px;">{{ $value2->columnLabel }}</td>
                            @endif
                            <td width="2%">Rp.</td>
							<td width="26%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, '.', ',')}}</td>
						</tr>
					@endforeach
                    <tr>
                        <td colspan="3">&nbsp;</td>
						<td width="2%" style="border-top: 1px solid black;">&nbsp;</td>
                        <td width="26%" style="border-top: 1px solid black;">&nbsp;</td>
					</tr>
				</table>
			</td>
			<td style="width:50%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: left;">Deduction</td>
                        <td colspan="3" style="text-align: left;">:</td>
					</tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<tr>
                            <td width="5%" style="padding-left: 20px;">{{ ($key2 + 1) }}</td>
                            @if($value2->columnLabel == 'ANGSURAN PINJAMAN')
                            <td width="40%" style="padding-left: 5px;">{{ $value2->columnLabel }}</td>
							<td width="32%" style="text-align: center;">
                                <span style="padding-right: 10px;">0</span>X<span style="padding-left: 20px;">463,828</span>
                            </td>
                            @else
                            <td colspan="2" style="padding-left: 5px;">{{ $value2->columnLabel }}</td>
                            @endif
                            <td width="2%">Rp.</td>
							<td width="26%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, '.', ',')}}</td>
						</tr>
					@endforeach
                    <tr>
                        <td colspan="3" style="text-align:center; padding-top: 10px;">Total Deduction</td>
						<td width="2%" style="padding-top: 10px; border-top: 1px solid black;">Rp.</td>
                        <td width="26%" style="text-align:right; padding-right: 10px; padding-top: 10px; border-top: 1px solid black;">{{ number_format((float) $totalDeduction, 0, '.', ',')}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 13px; padding-left:1%; padding-right:1%; border-collapse: collapse;">
    	<tr>
        	<td style="width:50%; vertical-align: top;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
                    <tr>
                        <td colspan="3" style="text-align:center;">Total Addition</td>
						<td width="2%">Rp.</td>
                        <td width="26%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $totalIncome, 0, '.', ',')}}</td>
					</tr>
				</table>
			</td>
			<td style="width:50%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
                    <tr>
                        <td colspan="3" style="text-align:center;">Take Home Pay</td>
						<td width="2%">Rp.</td>
                        <td width="26%" style="text-align:right; padding-right: 10px;">{{ number_format((float) ($totalIncome - $totalDeduction), 0, '.', ',')}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; padding-left:1%; padding-right:2%; padding-top: 0.5%; padding-bottom: 1%; border-collapse: collapse;">
		<tr>
			<td width="27%" style="padding: 0; margin: 0; font-weight: 600; text-decoration: underline;">KETERANGAN</td>
			<td width="1.5%" style="margin-left: 10px;">:</td>
			<td width="70%" style="text-align: left; padding: 0; margin: 0;">0</td>
		</tr>
		<tr>
			<td width="27%" style="padding: 0; margin: 0;">ANGSURAN KE</td>
			<td width="1.5%" style="margin-left: 10px;">:</td>
			<td width="70%" style="text-align: left; padding: 0; margin: 0;">0</td>
		</tr>
		<tr>
			<td width="27%" style="padding: 0; margin: 0;">SISA BULAN ANGSURAN</td>
			<td width="1.5%" style="margin-left: 10px;">:</td>
			<td width="70%" style="text-align: left; padding: 0; margin: 0;">0</td>
		</tr>
		<tr>
			<td width="27%" style="border-bottom: 1px solid black;">SISA PINJAMAN</td>
			<td width="1.5%" style="margin-left: 10px; border-bottom: 1px solid black;">:</td>
			<td width="70%" style="text-align: left; border-bottom: 1px solid black;">0</td>
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