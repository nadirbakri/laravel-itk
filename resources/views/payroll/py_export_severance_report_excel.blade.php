<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_severance_report.judul') }}</title>
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
    <table>
        <thead>
            <tr>
                <th colspan="11" style="font-size:16px; font-weight:bold;">{{ $value[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="11" style="font-size:14px; font-weight:bold;">{{ $value[0]->address }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="11" style="text-align:center"><h3>Severance Report</h3></th>
            </tr>
            <tr>
                <th colspan="11" style="text-align:center"><p>Payment Period : {{ $value[1]->paymentDateFrom }} to {{ $value[1]->paymentDateTo }}</p></th>
            </tr>
            <tr></tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">No</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Employee No</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Employee Name</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Join Date</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">TerminationDate</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Amount</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Gratuty Pay</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Leave Balance</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Rest Leave Payment</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Adjusment</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($value[1]->employeeColumn as $dataTable)
            <tr>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnD}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnE}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnF}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnG}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnH}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnI}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnJ}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnK}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnL}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnM}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$dataTable->columnN}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="10" style="border:1px solid #000; text-align:center; padding:4px;"></td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value[1]->columnO}}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</body>
</html>