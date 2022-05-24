<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_journal_report.judul') }}</title>
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
	</style>
</head>
<body>
@foreach($data as $key => $value)
    <h1 style="text-align:left">{{ $value->headerA }}</h1>
    <h2 style="text-align:left">FOR : {{ $value->headerC }}</h2>
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
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
            @foreach($value->excelColumns as $dataTables)
            <tr>
                <td>{{ $dataTables->accountNo }}</td>
                <td>{{ $dataTables->nameOfAccount }}</td>
                <td>{{ $dataTables->costCenter }}</td>
                <td>{{ $dataTables->costCenterName }}</td>
                <td>{{ $dataTables->description }}</td>
                <td>{{ $dataTables->debit }}</td>
                <td>{{ $dataTables->credit }}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $value->totalDebit }}</td>
                <td>{{ $value->totalKredit }}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</body>
</html>