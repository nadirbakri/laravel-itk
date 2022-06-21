<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_salary_historical_report.judul') }}</title>
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
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
		.table_detail td{
			text-align:center;
            padding: 3px;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="8">{{ $data[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="8">{{ $data[0]->address }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="8" style="text-align:center; font-weight:bold;"><h3>{{ $data[1]->reportName }} Report</h3></th>
            </tr>
            <tr>
                <th colspan="8" style="text-align:center; font-weight:bold;"><pre>{{ __('payroll_bonus_thr_report.label_payment_period') }}       {{ $data[1]->paymentPeriodFrom }} {{ __('payroll_bonus_thr_report.label_to') }} {{ $data[1]->paymentPeriodTo }}</pre></th>
            </tr>
            <tr></tr>
        </thead>
    </table>
    <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_bonus_thr_report.header_no') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_bonus_thr_report.label_employee_no') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_bonus_thr_report.header_employee_name') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_bonus_thr_report.header_join_date') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_bonus_thr_report.header_currency_code') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_bonus_thr_report.header_amount') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_bonus_thr_report.header_service_year') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_bonus_thr_report.header_performance') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data[1]->columnDetail as $key => $dataTable)
            <tr>
                <td style="text-align:center; border:1px solid #000;">{{ $dataTable->columnD }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $dataTable->columnE }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $dataTable->columnF }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $dataTable->columnG }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $dataTable->columnH }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $dataTable->columnI }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $dataTable->columnJ }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $dataTable->columnK }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align:center; border:1px solid #000;">{{ __('payroll_bonus_thr_report.grand_total') }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $data[1]->columnL }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $data[1]->columnM }}</td>
                <td style="text-align:center; border:1px solid #000;"></td>
                <td style="text-align:center; border:1px solid #000;"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>