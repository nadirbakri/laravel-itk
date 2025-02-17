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
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>{{ $companyCode }}</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Jurnal Salary For</th>
                <th>{{ $period }}</th>
            </tr>
            <tr>
                <th style="border: 1px solid black;">Doc. No.</th>
                <th style="border: 1px solid black;">Company Code</th>
                <th style="border: 1px solid black;">Month-Year of Payroll</th>
                <th style="border: 1px solid black;">SAP GL Account</th>
                <th style="border: 1px solid black;">SAP GL Account Description</th>
                <th style="border: 1px solid black;">AmountD</th>
                <th style="border: 1px solid black;">AmountK</th>
                <th style="border: 1px solid black;"></th>
                <th style="border: 1px solid black;">SAP Cost Center</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
            <tr>
                <td style="border: 1px solid black;">{{ $value->DocNo }}</td>
                <td style="border: 1px solid black;">{{ $value->Company }}</td>
                <td style="border: 1px solid black;">{{ $value->MonthYearOfPayroll }}</td>
                <td style="border: 1px solid black;">{{ $value->SAPGLAccount }}</td>
                <td style="border: 1px solid black;">{{ $value->SAPGLAccountDescription }}</td>
                <td style="border: 1px solid black;">{{ $value->AmountD }}</td>
                <td style="border: 1px solid black;">{{ $value->AmountK }}</td>
                <td style="border: 1px solid black;">{{ $value->TotalEmployee }}</td>
                <td style="border: 1px solid black;">{{ $value->SAPCostCenter }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>