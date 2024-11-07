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
    @if($display_logo == "1")
    <table class="table" style="width:100%; padding-left:2%; padding-right:2%; padding-bottom:1%;">
		<tr>
            <td>
                <!-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_digima.png'))) }}" style="width: 105px; height: 85px" alt="Logo"> -->
            </td>
		</tr>
	</table>
	<br>
    @endif
    <table class="table" style="width:100%; font-size: 13px; padding-left:1.5%; padding-right:2%; padding-bottom:1%; font-family: 'Arial Bold', sans-serif;">
		<tr>
            <td><b>SLIP GAJI - {{ strtoupper($periode) }}</b></td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:2%; padding-right:1%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td width="15%">Nama</td>
			<td width="1%">:</td>
			<td width="34%">{{ $value->employeeName }}</td>
			<td width="15%">NIK</td>
			<td width="1%">:</td>
			<td width="34%" colspan="2">{{ $value->employeeNo }}</td>
		</tr>
		<tr>
			<td width="15%">Jabatan</td>
			<td width="1%">:</td>
			<td width="34%">{{ $value->jabatan }}</td>
			<td width="15%">NPWP</td>
			<td width="1%">:</td>
			<td width="34%">{{ $value->npwp }}</td>
		</tr>
        <tr>
			<td colspan="6" style="border-bottom: 0.5px solid black;">&nbsp;</td>
		</tr>
	</table>
    <br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	?>
    <table class="table" style="width:100%; font-size: 13px; padding-left:1.5%; padding-right:2%; padding-bottom:1%; font-family: 'Arial Bold', sans-serif;">
		<tr>
            <td><b>RINCIAN GAJI</b></td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:2%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
        @foreach($value->a as $key2 => $value2)
            <?php
                $totalIncome += (float) $value2->columnValue;
            ?>
            <tr>
                <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
                @if($loop->first)
                <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">I.</td>
                @else
                <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
                @endif
                <td style="width: 30%; text-align: left; padding-top: 0.4%; padding-left: 3%;">{{ $value2->columnLabel }}</td>
                <td style="width: 1%; text-align: left; padding-top: 0.4%; padding-left: 3%;">:</td>
                <td style="width: 59%; text-align: left; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
            </tr>
        @endforeach
	</table>
    <table class="table" style="width:100%; font-size: 12px; padding-left:1.5%; padding-right:2%; padding-bottom:1%; font-family: 'Arial Bold', sans-serif;">
        <tr>
            <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
            <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
            <td style="width: 30%; text-align: left; padding-top: 0.4%; padding-left: 3%;"><b>TOTAL PENDAPATAN</b></td>
            <td style="width: 1%; text-align: left; padding-top: 0.4%; padding-left: 3%;">:</td>
            <td style="width: 59%; text-align: left; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $totalIncome, 0, ',', '.')}}</td>
        </tr>
	</table>
    <table class="table" style="width:100%; font-size: 12px; padding-left:2%; padding-right:2%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
        @foreach($value->d as $key2 => $value2)
            <?php
                $totalDeduction += (float) $value2->columnValue;
            ?>
            <tr>
                <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
                @if($loop->first)
                <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">II.</td>
                @else
                <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
                @endif
                <td style="width: 30%; text-align: left; padding-top: 0.4%; padding-left: 3%;">{{ $value2->columnLabel }}</td>
                <td style="width: 1%; text-align: left; padding-top: 0.4%; padding-left: 3%;">:</td>
                <td style="width: 59%; text-align: left; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
            </tr>
        @endforeach
	</table>
    <table class="table" style="width:100%; font-size: 12px; padding-left:1.5%; padding-right:2%; padding-bottom:1%; font-family: 'Arial Bold', sans-serif;">
        <tr>
            <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
            <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
            <td style="width: 30%; text-align: left; padding-top: 0.4%; padding-left: 3%;"><b>TOTAL POTONGAN</b></td>
            <td style="width: 1%; text-align: left; padding-top: 0.4%; padding-left: 3%;">:</td>
            <td style="width: 59%; text-align: left; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) $totalDeduction, 0, ',', '.')}}</td>
        </tr>
	</table>
    <table class="table" style="width:100%; font-size: 12px; padding-left:1.5%; padding-right:2%; padding-bottom:1%; font-family: 'Arial Bold', sans-serif;">
        <tr>
            <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
            <td style="width: 5%; text-align: left; padding-top: 0.4%; padding-left: 3%;">&nbsp;</td>
            <td style="width: 30%; text-align: left; padding-top: 0.4%; padding-left: 3%;"><b>Take Home Pay</b></td>
            <td style="width: 1%; text-align: left; padding-top: 0.4%; padding-left: 3%;">:</td>
            <td style="width: 59%; text-align: left; padding-top: 0.4%; padding-right: 17%;">{{ number_format((float) ($totalIncome - $totalDeduction), 0, ',', '.')}}</td>
        </tr>
	</table>
    <br><br><br>
    <table class="table" style="width:100%; font-size: 14px; padding-left:10%; padding-right:2%; padding-bottom:1%; font-family: 'Arial Bold', sans-serif;">
		<tr>
            <td>Payroll System</td>
		</tr>
        <tr>
            <td>STREAM</td>
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