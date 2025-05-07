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
			font-size: 12px;
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
    <table class="table" style="width:100%; padding-left:10%; padding-right:5%; padding-top:1%; padding-bottom:1%; font-family: 'Arial Alternates', sans-serif;">
		<tr>
			<td colspan="3" style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
                {{ strtoupper($value->namaPerusahaan) }}
			</td>
            <td style="width: 5%; padding: 0; margin: 0; text-align:left; font-size: 12px;">
                &nbsp;
			</td>
            <td style="width: 12%; padding: 0; margin: 0; text-align:left; font-size: 12px;">
                PERIODE
			</td>
            <td style="width: 20%; padding: 0; margin: 0; text-align:left; font-size: 12px;">
                {{ $value->slipPeriod }}
			</td>
            @if($display_logo == "1")
			<td width="20%" rowspan="4" style="text-align:right;">
				<table style="width: 100%;">
					<tr>
						<td style="text-align:right;">
							<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_rspik.png'))) }}" style="width: 155px; height: 65px" alt="Logo">
						</td>
					</tr>
				</table>
			</td>
			@else
			<td width="20%" rowspan="4" style="text-align:right;">&nbsp;</td>
			@endif
		</tr>
		<tr>
			<td colspan="3" style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
				SALARY SLIP for {{ $periode }}
			</td>
            <td style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
                &nbsp;
			</td>
            <td style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
                DEPARTEMEN
			</td>
            <td style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
                {{ $value->departemen }}
			</td>
		</tr>
        <tr>
			<td style="width: 10%; padding: 0; margin: 0; text-align:left; font-size: 12px;">
				Emp. No.
			</td>
            <td style="width: 10%; padding: 0; margin: 0; text-align:left; font-size: 12px;">
                {{ $value->employeeNo }}
			</td>
            <td style="width: 15%; padding: 0; margin: 0; text-align:left; font-size: 12px;">
                {{ $value->employeeName }}
			</td>
            <td style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
                &nbsp;
			</td>
            <td style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
                BAGIAN
			</td>
            <td style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
                {{ $value->division }}
			</td>
		</tr>
        <tr>
			<td style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
				Account No.
			</td>
            <td colspan="3" style="padding: 0; margin: 0; text-align:left; font-size: 12px;">
                {{ $value->noRekening }}
			</td>
		</tr>
	</table>
	<br>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	?>
	<table class="table" style="width:100%; padding-left:3%; padding-right:3%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:50%; vertical-align: top; border-top: 1px solid black;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
					<tr>
						<td colspan="3" style="text-align: left; padding-bottom: 1%; border-bottom: 1px solid black;">
                            <table style="width:100%; border-collapse: collapse;">
                                <tr>
                                    <td>Overtime</td>
                                    <td>{{ $value->totalOVT }}</td>
                                    <td>=</td>
                                    <td>{{ $value->ovt1 }}</td>
                                    <td>{{ $value->ovt2 }}</td>
                                    <td>{{ $value->ovt3 }}</td>
                                    <td>{{ $value->ovt4 }}</td>
                                    <td width="30%">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
					</tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						<tr>
							<td width="55%" style="padding: 2px;">{{ $value2->columnLabel }}</td>
							<td width="3%">RP.</td>
							<td width="42%" style="text-align:right; padding-right: 10px;">{{ number_format((float) $value2->columnValue, 0, '.', ',')}}</td>
						</tr>
					@endforeach
				</table>
			</td>
			<td style="width:50%; vertical-align: top; border-top: 1px solid black;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="3" style="text-align: center; padding-bottom: 1%; border-bottom: 1px solid black;">
                            <table style="width:100%; border-collapse: collapse;">
                                <tr>
                                    <td width="55%" style="text-align: right;">Overtime / Hour RP.</td>
                                    <td width="42%" style="text-align: left; padding-left: 30px;">{{ number_format($value->ovtTariff, 2, '.', ',')}}</td>
                                </tr>
                            </table>
                        </td>
					</tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						<tr>
							<td width="55%" style="padding-left: 10px;">{{ $value2->columnLabel }}</td>
							<td width="3%">RP.</td>
							<td width="42%" style="text-align:right; padding: 2px;">{{ number_format((float) $value2->columnValue, 0, '.', ',')}}</td>
						</tr>
					@endforeach
				</table>
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; padding-left:3%; padding-right:3%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
    	<tr>
        	<td style="width:50%; padding-top: 1%; padding-bottom: 1%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="55%" style="padding: 2px;">T O T A L</td>
						<td width="3%">RP.</td>
						<td width="42%" style="text-align: right; padding-right: 10px; border-top: 1px solid black;">{{ number_format($totalIncome, 0, '.', ',')}}</td>
					</tr>
					<tr>
						<td width="55%" style="padding: 2px;">Jumlah Uang Diterima</td>
						<td width="3%">RP.</td>
						<td width="42%" style="text-align: right; padding-right: 10px; border-bottom: 3px double black;">{{ number_format($totalIncome - $totalDeduction, 0, '.', ',')}}</td>
					</tr>
				</table>
			</td>
			<td style="width:50%; padding-top: 1%; padding-bottom: 1%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td width="55%" style="padding-left: 10px;">TOTAL POTONGAN</td>
						<td width="3%">RP.</td>
						<td width="42%" style="padding: 2px; text-align: right; border-top: 1px solid black;">{{ number_format($totalDeduction, 0, '.', ',')}}</td>
					</tr>
                    <tr>
						<td width="55%" style="padding-left: 10px;">&nbsp;</td>
						<td colspan="2" width="3%" style="padding: 2px;">JAKARTA, {{ $transfer_date }}</td>
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