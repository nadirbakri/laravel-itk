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

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	@foreach($data as $key => $value)
    <table class="table" style="width:80%; padding-left:1%; padding-right:1%; padding-bottom:1%; font-family: 'ArialCustomBold', sans-serif;">
		<tr>
			<td style="padding: 0; margin: 0; text-align:left; font-size: 12px; font-weight: 700;">
				PT FITRA FAJAR SEJAHTERA
			</td>
		</tr>
		<tr>
			<td style="padding: 0; margin: 0; text-align:left; font-size: 12px; font-weight: 700;">
				SALARY SLIP
			</td>
		</tr>
	</table>
	<br>
	<table class="table" style="width:80%; font-size: 10px; font-weight: 700; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'ArialCustomBold', sans-serif;">
		<tr>
			<td width="14%">Emp. No</td>
			<td width="1%">:</td>
			<td width="35%" style="padding-left: 10px;">{{ $value->employeeNo }} / {{ $value->employeeName }}</td>
			<td width="27%" style="padding-left: 80px;">Division</td>
			<td width="1%">:</td>
			<td width="22%" style="padding-left: 10px;">{{ $value->jabatan }}</td>
		</tr>
		<tr>
			<td width="14%">Account No.</td>
			<td width="1%">:</td>
			<td width="35%" style="padding-left: 10px;">{{ $value->noRekening }}</td>
			<td width="27%" style="padding-left: 80px;">Departemen</td>
			<td width="1%">:</td>
			<td width="22%" style="padding-left: 10px;">{{ $value->departemen }}</td>
		</tr>
		<tr>
			<td width="14%" style="border-bottom: 1px solid black;">Periode</td>
			<td width="1%" style="border-bottom: 1px solid black;">:</td>
			<td width="35%" style="padding-left: 10px; border-right: 1px solid black; border-bottom: 1px solid black;">{{ $periode }}</td>
			<td width="27%" style="padding-left: 80px; border-left: 1px solid black; border-bottom: 1px solid black;">Location</td>
			<td width="1%" style="border-bottom: 1px solid black;">:</td>
			<td width="22%" style="padding-left: 10px; border-bottom: 1px solid black;">{{ $value->location }}</td>
		</tr>
	</table>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	$totalDataIncome = 0;
	$totalDataDeduction = 0;
	?>
	<table class="table" style="width:80%; font-size: 10px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:50%; vertical-align: top; border-bottom: 1px solid black; border-right: 1px solid black;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
						<?php
							$totalDataIncome++;
						?>
						<tr>
							<td width="65%">{{ $value2->columnLabel }}</td>
							<td width="10%">IDR</td>
							<td width="25%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
					@if($totalDataIncome < 22)
						@for($i = 0; $i <= (22 - $totalDataIncome); $i++)
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
						@endfor
					@endif
				</table>
			</td>
			<td style="width:50%; vertical-align: top; border-bottom: 1px solid black; border-left: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
						<?php
							$totalDataDeduction++;
						?>
						<tr>
							<td width="65%" style="padding-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="10%">IDR</td>
							<td width="25%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
					@if($totalDataDeduction < 22)
						@for($i = 0; $i <= (22 - $totalDataDeduction); $i++)
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
						@endfor
					@endif
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:80%; font-size: 10px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:50%; vertical-align: top; border-bottom: 1px solid black; border-right: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="65%">Total Pendapatan</td>
						<td width="10%">IDR</td>
						<td width="25%" style="text-align: right; padding-right: 10px;">{{ number_format($totalIncome, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
			<td style="width:50%; vertical-align: top; border-bottom: 1px solid black; border-left: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="65%" style="padding-left: 10px;">Total Potongan</td>
						<td width="10%">IDR</td>
						<td width="25%" style="text-align: right;">{{ number_format($totalDeduction, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:80%; font-size: 10px; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:50%; vertical-align: top; border-bottom: 1px solid black; border-right: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="65%">Take Home Pay</td>
						<td width="10%">IDR</td>
						<td width="25%" style="text-align: right; padding-right: 10px;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}}</td>
					</tr>
				</table>
			</td>
			<td style="width:50%; vertical-align: top; border-bottom: 1px solid black; border-left: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="65%" style="padding-left: 10px;">&nbsp;</td>
						<td width="10%">&nbsp;</td>
						<td width="25%" style="text-align: right;">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br><br>
	<table class="table" style="width:80%; font-size: 10px; font-weight: 700; padding-left:1%; padding-right:1%; border-collapse: collapse; font-family: 'ArialCustomBold', sans-serif;">
		<tr>
			<td width="14%">Email</td>
			<td width="1%">:</td>
			<td width="85%" style="padding-left: 10px;">{{ $value->nik }}</td>
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