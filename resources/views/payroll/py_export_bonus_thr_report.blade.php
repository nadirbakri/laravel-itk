<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_bonus_thr_report.judul') }}</title>
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
            margin: 0;
            padding: 0;
			margin-left: 20px;
			margin-right: 20px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
		.table_detail td{
			border:1px solid #000;
            padding:6px;
			text-align:center;
		}
		.table_detail th{
			border:1px solid #000;
            padding:6px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    <p style="text-align:left">{{ $data[0]->companyName }}</p>
    <p style="text-align:left">{{ $data[0]->address }}</p>
    <h3 style="text-align:center">{{ $data[1]->reportName }} Report</h3>
    <h5 style="text-align:center">{{ __('payroll_bonus_thr_report.label_payment_period') }}<span style="display: inline-block; margin-left: 30px;"></span>{{ $data[1]->paymentPeriodFrom }} {{ __('payroll_bonus_thr_report.label_to') }} {{ $data[1]->paymentPeriodTo }}</h5>
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th>{{ __('payroll_bonus_thr_report.header_no') }}</th>
                <th>{{ __('payroll_bonus_thr_report.label_employee_no') }}</th>
                <th>{{ __('payroll_bonus_thr_report.header_employee_name') }}</th>
                <th>{{ __('payroll_bonus_thr_report.header_join_date') }}</th>
                <th>{{ __('payroll_bonus_thr_report.header_currency_code') }}</th>
                <th>{{ __('payroll_bonus_thr_report.header_amount') }}</th>
                <th>{{ __('payroll_bonus_thr_report.header_service_year') }}</th>
                <th>{{ __('payroll_bonus_thr_report.header_performance') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data[1]->columnDetail as $key => $dataTable)
            <tr>
                <td>{{ $dataTable->columnD }}</td>
                <td>{{ $dataTable->columnE }}</td>
                <td>{{ $dataTable->columnF }}</td>
                <td>{{ $dataTable->columnG }}</td>
                <td>{{ $dataTable->columnH }}</td>
                <td>{{ $dataTable->columnI }}</td>
                <td>{{ $dataTable->columnJ }}</td>
                <td>{{ $dataTable->columnK }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">{{ __('payroll_bonus_thr_report.grand_total') }}</td>
                <td>{{ $data[1]->columnL }}</td>
                <td>{{ $data[1]->columnM }}</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            $page = sprintf(_("Page %d/%d"),  $PAGE_NUM, $PAGE_COUNT);
            // Uncomment the following line if you use a Laravel-based i18n
            //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.5;  //  default
            $char_space = 0.5;  //  default
            $angle = 0.5;   //  default

            // Compute text width to center correctly
            $textWidth = $fontMetrics->getTextWidth($page, $font, $size);

            $x = ($pdf->get_width() - $textWidth) / 2;
            $y = $pdf->get_height() - 45;

            $pdf->text($x, $y, $page, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script>
</body>
</html>