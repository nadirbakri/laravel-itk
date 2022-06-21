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
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
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
	<table style="width:100%; padding:20px; border:1px solid #000;">
		<tr>
			<td colspan="2">{{$value->slipName}}</td>
			<td> </td>
			<td colspan="2" style="text-align:right;">LOGO</td>
		</tr>
		<br>
		<tr>
			<td>Employee No</td>
			<td>{{$value->employeeNo}}</td>
			<td></td>
			<td>Join Date</td>
			<td>{{$value->joinDate}}</td>
		</tr>
		<tr>
			<td>Employee Name</td>
			<td>{{$value->employeeName}}</td>
			<td></td>
			<td>Position</td>
			<td>{{$value->position}}</td>
		</tr>
		<tr>
			<td>custom1</td>
			<td>{{$value->custom1}}</td>
			<td colspan="3"> </td>
		</tr>
		<tr>
			<td>custom2</td>
			<td>{{$value->custom2}}</td>
			<td colspan="3"> </td>
		</tr>
		<br>
	</table>
	<table style="border:1px solid #000; width:100%; padding:20px;">
		<tr>
			<p>Allowance</p>
		</tr>
		<br>
		<?php
		if($value->allowance1Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance1Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance1Field.'</td></tr>');
		}
		if($value->allowance2Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance2Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance2Field.'</td></tr>');
		}if($value->allowance3Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance3Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance3Field.'</td></tr>');
		}if($value->allowance4Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance4Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance4Field.'</td></tr>');
		}if($value->allowance5Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance5Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance5Field.'</td></tr>');
		}if($value->allowance6Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance6Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance6Field.'</td></tr>');
		}if($value->allowance7Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance7Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance7Field.'</td></tr>');
		}if($value->allowance8Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance8Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance8Field.'</td></tr>');
		}if($value->allowance9Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance9Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance9Field.'</td></tr>');
		}if($value->allowance10Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->allowance10Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->allowance10Field.'</td></tr>');
		}
		?>
		<tr>
			<td colspan="2" style="text-align:left;">Total Allowance</td>
			<td colspan="1">IDR</td>
			<td colspan="2" style="text-align:left;">{{$value->totalAllowance}}</td>
		</tr>
		<br>
		<tr>
			<p>Deduction</p>
		</tr>
		<br>
		<?php
		if($value->deduction1Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction1Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction1Field.'</td></tr>');
		}
		if($value->deduction2Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction2Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction2Field.'</td></tr>');
		}if($value->deduction3Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction3Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction3Field.'</td></tr>');
		}if($value->deduction4Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction4Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction4Field.'</td></tr>');
		}if($value->deduction5Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction5Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction5Field.'</td></tr>');
		}if($value->deduction6Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction6Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction6Field.'</td></tr>');
		}if($value->deduction7Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction7Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction7Field.'</td></tr>');
		}if($value->deduction8Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction8Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction8Field.'</td></tr>');
		}if($value->deduction9Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction9Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction9Field.'</td></tr>');
		}if($value->deduction10Label != null){
			echo('<tr><td colspan="2" style="text-align:left;">'.$value->deduction10Label.'</td>');
			echo('<td colspan="1">IDR</td>');
			echo('<td colspan="2" style="text-align:left;">'.$value->deduction10Field.'</td></tr>');
		}
		?>
		<tr>
			<td colspan="2" style="text-align:left;">Total Allowance</td>
			<td colspan="1">IDR</td>
			<td colspan="2" style="text-align:left;">{{$value->totalDeduction}}</td>
		</tr>
		<br><br>
		<tr>
			<td colspan="2" style="text-align:left;">Take Home Pay</td>
			<td colspan="1">IDR</td>
			<td colspan="2" style="text-align:left;">{{$value->takeHomePay}}</td>
		</tr>
		<br><br>
		<tr>
			<td colspan="2"> </td>
			<td colapsn="1"> </td>
			<td colspan="2" style="text-align:center;">{{$value->location}}, {{$value->printDate}}</td>
		</tr>
		<br><br><br>
		<tr>
			<td colspan="2"> </td>
			<td colspan="1"> </td>
			<td colspan="2" style="text-align:center;">{{$value->employeeName}}</td>
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