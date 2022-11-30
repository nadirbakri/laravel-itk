<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_payment_slip.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 20px;
			margin-right: 20px;
			margin-bottom: 5px;
			margin-top: 5px;
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
	<table style="width:100%; border:1px solid #000; padding:3%;">
		<tr>
			@if($display_logo == "1")
			<td colspan="2" style="text-align:left; font-size: 25px; font-weight: 700;">{{ $value->slipName }}</td>
			<td colspan="2" style="text-align:right;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_intikom.png'))) }}" style="width: 160px; height: 50px" alt="Logo"></td>
			@endif
		</tr>
		<br>
		<tr>
			<td width="15%" style="font-size: 15px; font-weight: 600;">Employee No</td>
			<td width="17%" style="border-bottom: 1px dashed black;">{{ $value->employeeNo }}</td>
			<td width="15%" style="font-size: 15px; font-weight: 600; padding-left: 10px;">Join Date</td>
			<td width="17%" style="border-bottom: 1px dashed black;">{{ date('d F Y', strtotime($value->joinDate)) }}</td>
		</tr>
		<tr>
			<td width="15%" style="font-size: 15px; font-weight: 600;">Employee Name</td>
			<td width="17%" style="border-bottom: 1px dashed black;">{{ $value->employeeName }}</td>
			<td width="15%" style="font-size: 15px; font-weight: 600; padding-left: 10px;">Position</td>
			<td width="17%" style="border-bottom: 1px dashed black;">{{ $value->position }}</td>
		</tr>
		<tr>
			@if($value->custom1 != null)
			<td width="15%" style="font-size: 15px; font-weight: 600;">Custom 1</td>
			<td width="17%" style="border-bottom: 1px dashed black;">{{ $value->custom1 }}</td>
			@endif
			@if($value->custom2 != null)
			<td width="15%" style="font-size: 15px; font-weight: 600;">Custom 2</td>
			<td width="17%" style="border-bottom: 1px dashed black;">{{ $value->custom2 }}</td>
			@endif
		</tr>
	</table>
	<table style="border:1px solid #000; width:100%; padding:2%;">
		<tr>
			<td colspan="3" style="font-size: 20px; font-weight: 600; padding-bottom: 1%;">Allowance</td>
		</tr>
		<tr>
			<td width="30%">{{ ($value->allowance1Label != null) ? $value->allowance1Label : 'Allowance 1' }}</td>
			<td width="10%" style="text-align:center;">IDR</td>
			<td width="20%" style="text-align:right;">{{ number_format($value->allowance1Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance2Label != null) ? $value->allowance2Label : 'Allowance 2' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance2Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance3Label != null) ? $value->allowance3Label : 'Allowance 3' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance3Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance4Label != null) ? $value->allowance4Label : 'Allowance 4' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance4Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance5Label != null) ? $value->allowance5Label : 'Allowance 5' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance5Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance6Label != null) ? $value->allowance6Label : 'Allowance 6' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance6Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance7Label != null) ? $value->allowance7Label : 'Allowance 7' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance3Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance8Label != null) ? $value->allowance8Label : 'Allowance 8' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance3Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance9Label != null) ? $value->allowance9Label : 'Allowance 9' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance9Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->allowance10Label != null) ? $value->allowance10Label : 'Allowance 10' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->allowance10Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>Total Allowance</td>
			<td style="text-align:center; border-top: 1px solid black;">IDR</td>
			<td style="text-align:right; border-top: 1px solid black;">{{ number_format($value->totalAllowance, 2, ',', '.') }}</td>
		</tr>
		<tr>
			<td colspan="3" style="font-size: 22px; font-weight: 600; padding-top: 0.5%; padding-bottom: 1%;">Deduction</td>
		</tr>
		<tr>
			<td width="30%">{{ ($value->deduction1Label != null) ? $value->deduction1Label : 'Deduction 1' }}</td>
			<td width="10%" style="text-align:center;">IDR</td>
			<td width="20%" style="text-align:right;">{{ number_format($value->deduction1Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction2Label != null) ? $value->deduction2Label : 'Deduction 2' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction2Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction3Label != null) ? $value->deduction3Label : 'Deduction 3' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction3Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction4Label != null) ? $value->deduction4Label : 'Deduction 4' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction4Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction5Label != null) ? $value->deduction5Label : 'Deduction 5' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction5Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction6Label != null) ? $value->deduction6Label : 'Deduction 6' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction6Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction7Label != null) ? $value->deduction7Label : 'Deduction 7' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction7Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction8Label != null) ? $value->deduction8Label : 'Deduction 8' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction8Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction9Label != null) ? $value->deduction9Label : 'Deduction 9' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction9Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>{{ ($value->deduction10Label != null) ? $value->deduction10Label : 'Deduction 10' }}</td>
			<td style="text-align:center;">IDR</td>
			<td style="text-align:right;">{{ number_format($value->deduction10Field, 2, ',', '.') }}</td></tr>
		</tr>
		<tr>
			<td>Total Deduction</td>
			<td style="text-align:center; border-top: 1px solid black;">IDR</td>
			<td style="text-align:right; border-top: 1px solid black;">{{ number_format($value->totalDeduction, 2, ',', '.') }}</td>
		</tr>
		<br>
		<tr>
			<td>Take Home Pay</td>
			<td style="text-align:center; border-bottom: 1px solid black;">IDR</td>
			<td style="text-align:right; border-bottom: 1px solid black;">{{ number_format($value->takeHomePay, 2, ',', '.') }}</td>
		</tr>
		<br><br>
		<tr>
			<td colspan="2"> </td>
			<td style="text-align:right;">{{ $value->location }}, {{ date('d F Y', strtotime($value->printDate)) }}</td>
		</tr>
		<br><br>
		<tr>
			<td colspan="2"> </td>
			<td style="text-align:right;">{{ $value->employeeName }}</td>
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