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
			font-size: 13px;
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
    <table style="width:100%; padding-left:1%; padding-right:1%;">
		<tr>
			<td width="20%" colspan="2">PT. Logwin Air Indonesia</td>
			@if($display_logo == "1")
			<td width="20%" rowspan="2">&nbsp;</td>
			<td width="7%" rowspan="2" style="text-align:right;">
				<table style="width: 100%;">
					<tr>
						<td>
							<img class="ml-4" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_logwin.png'))) }}" style="width: 205px; height: 25px" alt="Logo">
						</td>
					</tr>
				</table>
			</td>
			@else
			<td width="28%" rowspan="2" style="text-align:right;">&nbsp;</td>
			@endif
		</tr>
		<tr>
			<td width="8%">SALARY SLIP</td>
			<td width="12%">{{ $period }}</td>
		</tr>
	</table>
	<br><br>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse;">
		<tr>
			<td width="18%">Name / Employee ID</td>
			<td width="24%">{{ $value->employeeName }}</td>
			<td width="15%" style="padding-left: 10px;">/ {{ $value->employeeNo }}</td>
			<td width="15%">NPWP</td>
			<td width="40%" colspan="2">{{ $value->npwp }}</td>
		</tr>
		<tr>
			<td width="18%">Position</td>
			<td width="39%" colspan="2">{{ $value->positionName }}</td>
			<td width="15%">Dept / Location</td>
			<td width="20%">{{ $value->departemen }}</td>
			<td width="15%" style="text-align: right;">/ {{ $value->location }}</td>
		</tr>
	</table>
	<br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	?>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse;">
    	<tr>
        	<td style="width:45%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: left; padding-bottom: 1%;">INCOME</td>
					</tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<tr>
							<td width="60%" style="margin-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="37%" style="text-align:right;">Rp. {{ number_format((float) $value2->columnValue, 0, ',', '.')}},-</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="60%" style="padding: 0; margin: 0;">Total Income (A)</td>
						<td width="37%" style="text-align: right; padding: 0; margin: 0;">Rp. {{ number_format($totalIncome, 0, ',', '.')}},-</td>
					</tr>
				</table>
			</td>
			<td style="width:8%; vertical-align: top;"></td>
			<td style="width:47%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: left; padding-bottom: 1%;">DEDUCTION</td>
					</tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<tr>
							<td width="60%" style="margin-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="37%" style="text-align:right;">Rp. {{ number_format((float) $value2->columnValue, 0, ',', '.')}},-</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="60%" style="padding: 0; margin: 0;">Total Deduction (B)</td>
						<td width="37%" style="text-align: right; padding: 0; margin: 0;">Rp. {{ number_format($totalDeduction, 0, ',', '.')}},-</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: left; padding-bottom: 1%;">INSURANCE COMPANY PART</td>
					</tr>
					@foreach($value->c as $key2 => $value2)
						<tr>
							<td width="60%" style="margin-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="37%" style="text-align:right;">Rp. {{ number_format((float) $value2->columnValue, 0, ',', '.')}},-</td>
						</tr>
					@endforeach
				</table>
			</td>
		</tr>
	</table>
	<br>
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse;">
    	<tr>
        	<td style="width:45%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="60%" style="padding: 0; margin: 0;">Take Home Pay (A - B)</td>
						<td width="37%" style="text-align: right; padding: 0; margin: 0;">Rp. {{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}},-</td>
					</tr>
				</table>
			</td>
			<td style="width:55%; vertical-align: top;">&nbsp;</td>
		</tr>
	</table>
	<br>
	@php
	$chunks = array_chunk($value->b, ceil(count($value->b) / 2));
	@endphp
	<table style="width:100%; padding-left:1%; padding-right:2%; border-collapse: collapse;">
    	<tr>
        	<td style="width:45%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: left; padding-bottom: 1%;">LEAVE TAKEN ({{ $strLeaveTaken }})</td>
					</tr>
					@if(isset($chunks[0]))
						@foreach($chunks[0] as $key2 => $value2)
							<tr>
								<td width="60%" style="margin-left: 10px;">{{ $value2->columnLabel }} :</td>
								<td width="37%" style="text-align:right;">{{ $value2->columnValue }}</td>
							</tr>
						@endforeach
					@endif
				</table>
			</td>
			<td style="width:8%; vertical-align: top;"></td>
			<td style="width:47%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: left; padding-bottom: 1%;">&nbsp;</td>
					</tr>
					@if(isset($chunks[1]))
						@foreach($chunks[1] as $key2 => $value2)
							<tr>
								<td width="60%" style="margin-left: 10px;">{{ $value2->columnLabel }} :</td>
								<td width="37%" style="text-align:right;">{{ $value2->columnValue }}</td>
							</tr>
						@endforeach
					@endif
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