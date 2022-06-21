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
    <!-- START HEADER -->
    <table style="width:100%; border:1px solid #000; padding:20px;">
        <thead style="border-bottom:1px solid #000;">
            <tr>
                <td colspan="6" style="text-align:left;">{{$value->slipName}}</td>
                <td colspan="6" style="text-align:right;">LOGO</td>
            </tr>
            <br>
            <tr>
                <td colspan="2">Employee No</td>
                <td colspan="2">{{$value->employeeNo}}</td>
                <td colspan="2">Join Date</td>
                <td colspan="2">{{$value->joinDate}}</td>
                <td colspan="2">custom1</td>
                <td colspan="2">{{$value->custom1}}</td>
            </tr>
            <tr>
                <td colspan="2">Employee Name</td>
                <td colspan="2">{{$value->employeeName}}</td>
                <td colspan="2">Position</td>
                <td colspan="2">{{$value->position}}</td>
                <td colspan="2">custom2</td>
                <td colspan="2">{{$value->custom2}}</td>
            </tr>
            <br>
        </thead>
        <tbody>
            <br>
            <tr>
                <td colspan="6" style="vertical-align:top">
                    <!-- <div style="width:100%; height:100px;"> -->
                    <table style="width:100%;">
                        <tr>
                            <td>Allowance</td> 
                        </tr>
                        <br>
                        <?php
                        if($value->allowance1Label != null && $value->allowance1Field != null && $value->allowance1Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance1Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance1Field.'</td></tr>');
                        }
                        if($value->allowance2Label != null && $value->allowance2Field != null && $value->allowance2Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance2Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance2Field.'</td></tr>');
                        }
                        if($value->allowance3Label != null && $value->allowance3Field != null && $value->allowance3Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance3Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance3Field.'</td></tr>');
                        }
                        if($value->allowance4Label != null && $value->allowance4Field != null && $value->allowance4Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance4Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance4Field.'</td></tr>');
                        }
                        if($value->allowance5Label != null && $value->allowance5Field != null && $value->allowance5Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance5Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance5Field.'</td></tr>');
                        }
                        if($value->allowance6Label != null && $value->allowance6Field != null && $value->allowance6Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance6Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance6Field.'</td></tr>');
                        }
                        if($value->allowance7Label != null && $value->allowance7Field != null && $value->allowance7Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance7Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance7Field.'</td></tr>');
                        }
                        if($value->allowance8Label != null && $value->allowance8Field != null && $value->allowance8Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance8Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance8Field.'</td></tr>');
                        }
                        if($value->allowance9Label != null && $value->allowance9Field != null && $value->allowance9Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance9Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance9Field.'</td></tr>');
                        }
                        if($value->allowance10Label != null && $value->allowance10Field != null && $value->allowance10Field != 0){
                            echo('<tr><td colspan="2">'.$value->allowance10Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->allowance10Field.'</td></tr>');
                        }
                        ?>
                        <tr>
                            <td colspan="2">Total Allowance</td>
                            <td colspan="2" style="text-align:left;">IDR</td>
                            <td colspan="2" style="text-align:left;">{{$value->totalAllowance}}</td>
                        </tr>
                        <br>
                        <tr style="color:white;">
                            <td colspan="2">Take Home Pay</td>
                            <td colspan="2">IDR</td>
                            <td colspan="2">{{$value->takeHomePay}}</td>
                        </tr>
                    </table>
                    <!-- </div> -->
                </td>
                <td colspan="6" style="vertical-align:top">
                    <!-- <div style="width:100%; height:100px;"> -->
                    <table style="width:100%;">
                        <tr>
                            <td>Deduction</td>    
                        </tr>
                        <br>
                        <?php
                        if($value->deduction1Label != null && $value->deduction1Field != null && $value->deduction1Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction1Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction1Field.'</td></tr>');
                        }
                        if($value->deduction2Label != null && $value->deduction2Field != null && $value->deduction2Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction2Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction2Field.'</td></tr>');
                        }
                        if($value->deduction3Label != null && $value->deduction3Field != null && $value->deduction3Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction3Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction3Field.'</td></tr>');
                        }
                        if($value->deduction4Label != null && $value->deduction4Field != null && $value->deduction4Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction4Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction4Field.'</td></tr>');
                        }
                        if($value->deduction5Label != null && $value->deduction5Field != null && $value->deduction5Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction5Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction5Field.'</td></tr>');
                        }
                        if($value->deduction6Label != null && $value->deduction6Field != null && $value->deduction6Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction6Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction6Field.'</td></tr>');
                        }
                        if($value->deduction7Label != null && $value->deduction7Field != null && $value->deduction7Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction7Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction7Field.'</td></tr>');
                        }
                        if($value->deduction8Label != null && $value->deduction8Field != null && $value->deduction8Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction8Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction8Field.'</td></tr>');
                        }
                        if($value->deduction9Label != null && $value->deduction9Field != null && $value->deduction9Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction9Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction9Field.'</td></tr>');
                        }
                        if($value->deduction10Label != null && $value->deduction10Field != null && $value->deduction10Field != 0){
                            echo('<tr><td colspan="2">'.$value->deduction10Label.'</td>');
                            echo('<td colspan="2" style="text-align:left;">IDR</td>');
                            echo('<td colspan="2" style="text-align:left;">'.$value->deduction10Field.'</td></tr>');
                        }
                        ?>
                        <tr>
                            <td colspan="2">Total Deduction</td>
                            <td colspan="2" style="text-align:left;">IDR</td>
                            <td colspan="2" style="text-align:left;">{{$value->totalDeduction}}</td>
                        </tr>
                        <br>
                        <tr>
                            <td colspan="2">Take Home Pay</td>
                            <td colspan="2">IDR</td>
                            <td colspan="2">{{$value->takeHomePay}}</td>
                        </tr>
                    </table>
                    <!-- </div> -->
                </td>
            </tr>
            <br><br>
            <tr>
                <td colspan="8"> </td>
                <td colspan="4">{{$value->location}}, {{$value->printDate}}</td>
            </tr>
            <br><br><br>
            <tr>
                <td colspan="8"> </td>
                <td colspan="4">{{$value->employeeName}}</td>
            </tr>
        </tbody>
    </table>    
    <!-- END HEADER -->

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