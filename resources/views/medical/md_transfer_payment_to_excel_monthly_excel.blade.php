<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_transfer_payment_to_excel_monthly.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
        .table_detail td{
            text-align:center;
			border:1px solid #000;
			text-align:center;
		}
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="display:flex; text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee Name</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Payment Currency Code</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Payment Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
            <tr>
                <td style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $value->employeeNo }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value->fullName }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value->claimCurrencyCode }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value->paymentAmounts }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>