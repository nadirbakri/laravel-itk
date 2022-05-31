<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_payment_slip.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <div class="row">
        <div class="col-6">
            <p>{{$value->slipName}}</p>
        </div>
        <div class="col-6">
            LOGO
        </div>
    </div>
    <div class="row">
        <div class="col-2"><p>Employee No</p></div>
        <div class="col-2"><p>{{$value->employeeNo}}</p></div>
        <div class="col-2"><p>Join Date</p></div>
        <div class="col-2"><p>{{$value->joinDate}}</p></div>
        <div class="col-2"><p>custom1</p></div>
        <div class="col-2"><p>{{$value->custom1}}</p></div>
    </div>
    <div class="row">
        <div class="col-2"><p>Employee Name</p></div>
        <div class="col-2"><p>{{$value->employeeNo}}</p></div>
        <div class="col-2"><p>Position</p></div>
        <div class="col-2"><p>{{$value}}</p></div>
        <div class="col-2"><p>custom2</p></div>
        <div class="col-2"><p>{{$value->custom2}}</p></div>
    </div>
    <!-- END HEADER -->
    <tr>
        <td colspan="4">{{ __('payroll_payment_slip.label_allowance') }}</td>
        <td></td>
        <td colspan="4">{{ __('payroll_payment_slip.label_deduction') }}</td>
    </tr>
    <tr>
        <td>{{ $value->allowance1Label }}</td>
        <td>{{ __('payroll_payment_slip.label_curr') }}</td>
        <td>{{ $value->allowance1Field }}</td>
        <td></td>
        <td>{{ $value->deduction1Label }}</td>
        <td>{{ __('payroll_payment_slip.label_curr') }}</td>
        <td>{{ $value->deduction1Field }}</td>
    </tr>
    <tr>
        <td>{{ $value->allowance2Label }}</td>
        <td>{{ __('payroll_payment_slip.label_curr') }}</td>
        <td>{{ $value->allowance2Field }}</td>
        <td></td>
        <td>{{ $value->deduction2Label }}</td>
        <td>{{ __('payroll_payment_slip.label_curr') }}</td>
        <td>{{ $value->deduction2Field }}</td>
    </tr>
    <tr>
        <td>{{ $value->allowance3Label }}</td>
        <td>{{ __('payroll_payment_slip.label_curr') }}</td>
        <td>{{ $value->allowance3Field }}</td>
        <td></td>
        <td>{{ $value->deduction3Label }}</td>
        <td>{{ __('payroll_payment_slip.label_curr') }}</td>
        <td>{{ $value->deduction3Field }}</td>
    </tr>
    
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