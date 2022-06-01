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

        @page { margin-bottom: 150px; size: auto; }
        /* header { position: fixed; left: 0px; top: -90px; right: 0px; height: 150px; text-align: center; } */
        footer { position: absolute; left: 25px; bottom: -85px; right: 0px; height: 150px; }
        table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto; margin: 4px 0 4px 0; }
        td    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group }
	</style>
</head>
<body>
    <table>
        <tr>
            <th colspan="4" style="text-align:center; font-weight:bold; background-color:lightblue; padding:7px"><h3>{{ __('payroll_salary_historical_report.list') }}</h3></th>
        </tr>
    </table>
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align: center; background-color:lightgray; padding:5px">{{ __('payroll_salary_historical_report.header_no') }}</th>
                <th style="text-align: center; background-color:lightgray; padding:5px">{{ $data[0]->employeeNo }} {{ $data[0]->employeeName }}</th>
                <th style="text-align: center; background-color:lightgray; padding:5px">{{ $data[0]->joinDate }}</th>
                <th style="text-align: center; background-color:lightgray; padding:5px">{{ $data[0]->position }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data[0]->detail as $key => $dataTable)
            <tr>
                <td style="text-align: center; padding:3px">{{ $key+1 }}</td>
                <td style="text-align: center; padding:3px">{{ $dataTable->period }}</td>
                <td style="text-align: center; padding:3px">{{ $dataTable->basicSalary }}</td>
                <td style="text-align: center; padding:3px">{{ $dataTable->remark }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>