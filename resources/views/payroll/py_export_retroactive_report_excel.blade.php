<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_retroactive_report.judul') }}</title>
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
                <th colspan="8">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="8">{{ $data_company[0]->address }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="8" style="text-align:center; font-weight:bold;"><h3>Retroactive Report</h3></th>
            </tr>
            <tr>
                <th colspan="8" style="text-align:center; font-weight:bold;"><pre>Period : {{ date('F Y', strtotime($data_period)) }}</pre></th>
            </tr>
            <tr></tr>
        </thead>
    </table>
    <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Full Name</th>
                @foreach($data[0]->field as $key => $value)
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ $value->field }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($data as $key => $value)
            <tr>
                <td style="text-align:center; border:1px solid #000;">{{ $no++ }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->employeeNo }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->fullName }}</td>
                @foreach($value->field as $key2 => $value2)
                    <td style="text-align:center; border:1px solid #000;">{{ $value2->value }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>