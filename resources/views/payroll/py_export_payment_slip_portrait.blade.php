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

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
@foreach($data as $key => $value)
    <table class="table" style="width:100%; padding-left:1%; padding-right:1%; padding-bottom:1%;">
		<tr>
			<td style="padding: 0; margin: 0; text-align:center; font-size: 16px; font-weight: 700;">
				SLIP GAJI KARYAWAN
			</td>
		</tr>
		<tr>
			<td style="padding: 0; margin: 0; text-align:center; font-size: 16px; font-weight: 700;">
				PT {{ $value->namaCabang }}
			</td>
		</tr>
	</table>
	<br>
	<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:1%; border-collapse: collapse;">
		<tr>
			<td width="20%">NO</td>
			<td width="1%">:</td>
			<td width="29%" style="padding-left: 10px;">{{ $no }}</td>
			<td width="20%">NIK</td>
			<td width="1%">:</td>
			<td width="29%" colspan="2">{{ $value->employeeNo }}</td>
		</tr>
		<tr>
			<td width="20%">PERIODE</td>
			<td width="1%">:</td>
			<td width="29%" style="padding-left: 10px;">{{ $first_day }} {{ $last_day }}</td>
			<td width="20%">NAMA KARYAWAN</td>
			<td width="1%">:</td>
			<td width="29%">{{ $value->employeeName }}</td>
		</tr>
		<tr>
			<td width="20%">TANGGAL TRANSFER</td>
			<td width="1%">:</td>
			<td width="29%" style="padding-left: 10px;">{{ $transfer_date }}</td>
			<td width="20%">RANK</td>
			<td width="1%">:</td>
			<td width="29%">{{ $value->rank }}</td>
		</tr>
		<tr>
			<td width="20%">NAMA CABANG</td>
			<td width="1%">:</td>
			<td width="29%" style="padding-left: 10px;"></td>
			<td width="20%">JABATAN</td>
			<td width="1%">:</td>
			<td width="29%">{{ $value->jabatan }}</td>
		</tr>
		<tr>
			<td width="20%">NAMA PERUSAHAAN</td>
			<td width="1%">:</td>
			<td width="29%" style="padding-left: 10px;">PT {{ $value->namaCabang }}</td>
			<td width="20%">NOMOR REKENING</td>
			<td width="1%">:</td>
			<td width="29%">{{ $value->noRekening }}</td>
		</tr>
	</table>
	<br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	?>
	<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:2%; border-collapse: collapse;">
    	<tr>
        	<td style="width:50%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<td colspan="3" style="text-align: center; padding-bottom: 1%; border-bottom: 1px solid black;">PENERIMAAN</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<tr>
							<td width="55%">{{ $value2->columnLabel }}</td>
							<td width="3%">:</td>
							<td width="42%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
				</table>
			</td>
			<td style="width:50%; vertical-align: top; border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="3" style="text-align: center; padding-bottom: 1%; border-bottom: 1px solid black;">PEMOTONGAN</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<tr>
							<td width="55%" style="padding-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="3%">:</td>
							<td width="42%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
					@endforeach
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:2%; border-collapse: collapse;">
    	<tr>
        	<td style="width:50%; padding-top: 1%; padding-bottom: 1%; vertical-align: top; border-bottom: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="55%">JUMLAH PENERIMAAN</td>
						<td width="3%">:</td>
						<td width="42%" style="text-align: right; padding-right: 10px;">{{ number_format($totalIncome, 0, ',', '.')}}</td>
					</tr>
					<tr>
						<td width="55%">NETTO YANG DIBAYARKAN</td>
						<td width="3%">:</td>
						<td width="42%" style="text-align: right; padding-right: 10px;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
			<td style="width:50%; padding-top: 1%; padding-bottom: 1%; vertical-align: top; border-bottom: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="55%" style="padding-left: 10px;">JUMLAH POTONGAN</td>
						<td width="3%">:</td>
						<td width="42%" style="text-align: right;">{{ number_format($totalDeduction, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:1%; padding-right:2%; padding-top: 0.5%; padding-bottom: 1%; border-collapse: collapse;">
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