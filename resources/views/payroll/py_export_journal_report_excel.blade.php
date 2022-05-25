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
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th colspan="7">{{ $value->headerA }}</th>
            </tr>
            <tr>
                <th colspan="7">{{ __('payroll_journal_report.judul') }}</th>
            </tr>
            <tr>
                <th colspan="7">FOR : {{ $value->headerC }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th style="border:1px solid #000; padding:4px;
                background-color:#84c2e0; text-align:center;">Account No</th>
                <th style="border:1px solid #000; padding:4px;
                background-color:#84c2e0; text-align:center;">Name of Account</th>
                <th style="border:1px solid #000; padding:4px;
                background-color:#84c2e0; text-align:center;">Cost Center</th>
                <th style="border:1px solid #000; padding:4px;
                background-color:#84c2e0; text-align:center;">Cost Center Name</th>
                <th style="border:1px solid #000; padding:4px;
                background-color:#84c2e0; text-align:center;">Description</th>
                <th style="border:1px solid #000; padding:4px;
                background-color:#84c2e0; text-align:center; width:80px;">Debit</th>
                <th style="border:1px solid #000; padding:4px;
                background-color:#84c2e0; text-align:center; width:80px;">Credit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($value->excelColumns as $dataTables)
            <tr>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $dataTables->accountNo }}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $dataTables->nameOfAccount }}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $dataTables->costCenter }}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $dataTables->costCenterName }}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $dataTables->description }}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $dataTables->debit }}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $dataTables->credit }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="border:1px solid #000; text-align:center; padding:4px;"></td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">Total</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $value->totalDebit }}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $value->totalKredit }}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</body>
</html>