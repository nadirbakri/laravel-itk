<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_journal_report.judul') }}</title>
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
		}
		.table_detail th{
			border:1px solid #000;
		}
		.table_detail{
			border-collapse:collapse;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
    <table>
        <tbody>
            <tr>{{ $value[0]->headerA }}</tr>
            <tr>{{ $value[0]->headerC }}</tr>            
        </tbody>
    </table>
	<table>
        <thead>
            <tr>
                <th>Account No</th>
                <th>Name of Account</th>
                <th>Cost Center</th>
                <th>Cost Center Name</th>
                <th>Description</th>
                <th>Debit</th>
                <th>Credit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value[0]->excelColumns)
            <tr>
                <td>{{ $data->AccountNo }}</td>
                <td>{{ $data->NameOfAccount }}</td>
                <td>{{ $data->CostCenter }}</td>
                <td>{{ $data->CostCenterName }}</td>
                <td>{{ $data->Description }}</td>
                <td>{{ $data->Debit }}</td>
                <td>{{ $data->Credit }}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $value[0]->totalDebit }}</td>
                <td>{{ $value[0]->totalKredit }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>