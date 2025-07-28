<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_loan_report.judul') }}</title>
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
    <table>
        <thead>
            <tr>
                <th colspan="5" style="font-size:14px; font-weight:bold;">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="5" style="font-size:14px; font-weight:bold;">{{ $data_company[0]->address }}</th>
            </tr>
            <tr>
                <th colspan="5" style="text-align:center; font-size:14px; font-weight:bold;">LOAN SUMMARY REPORT</th>
            </tr>
            <tr>
                <th colspan="5" style="text-align:center;">Month : {{date('F Y', strtotime($period))}}</th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Employee</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Amount</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Installment</th>
            </tr>
            <tr>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
                @foreach($value->loanEmployeeList as $key2 => $value2)
                <tr>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $key2 + 1 }}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value2->employeeNo}}</td>
                    <td style="border:1px solid #000; text-align:left; padding:4px;">{{$value2->employeeName}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->loanAmount}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->installmentPerMonth}}</td>
                </tr>
                @endforeach
            @endforeach
            @if(isset($value))
                <tr>
                    <td colspan="3" style="border:1px solid #000; text-align:center; padding:4px; font-weight:bold;">Grand Total</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->grandTotalLoan}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->grandTotalInstallment}}</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>