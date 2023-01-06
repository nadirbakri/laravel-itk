<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_severance_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
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
	</style>
</head>
<body>
    @foreach($data as $key => $value)
    <h3>{{ $value[0]->companyName }} <br> {{ $value[0]->address }}</h3>
    <h3 style="text-align:center">Severance Report</h3>
    <h5 style="text-align:center">Payment Period : {{ $value[1]->paymentDateFrom }} to {{ $value[1]->paymentDateTo }}</h5>
    <br>
    <table style="width:100%; font-size:12px;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th>No</th>
                <th>Employee No</th>
                <th>Employee Name</th>
                <th width="10%">Join Date</th>
                <th width="10%">Termination Date</th>
                <th>Amount</th>
                <th>Gratuty Pay</th>
                <th>Leave Balance</th>
                <th>Rest Leave Payment</th>
                <th>Adjusment</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($value[1]->employeeColumn as $dataTable)
            <tr>
                <td>{{$dataTable->columnD}}</td>
                <td>{{$dataTable->columnE}}</td>
                <td>{{$dataTable->columnF}}</td>
                <td>{{$dataTable->columnG}}</td>
                <td>{{$dataTable->columnH}}</td>
                <td>{{$dataTable->columnI}}</td>
                <td>{{$dataTable->columnJ}}</td>
                <td>{{$dataTable->columnK}}</td>
                <td>{{$dataTable->columnL}}</td>
                <td>{{$dataTable->columnM}}</td>
                <td>{{$dataTable->columnN}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="9" style="border-right:none;"></td>
                <td style="border-left:none; font-weight:200;">Total</td>
                <td>{{$value[1]->columnO}}</td>
            </tr>
        </tbody>
    </table>
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