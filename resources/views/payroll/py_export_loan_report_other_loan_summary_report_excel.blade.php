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
                <th colspan="7" style="font-size:14px; font-weight:bold;">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="7" style="font-size:14px; font-weight:bold;">{{ $data_company[0]->address }}</th>
            </tr>
            <tr>
                <th colspan="7" style="text-align:center; font-size:14px; font-weight:bold;">OTHER LOAN SUMMARY REPORT</th>
            </tr>
            <tr>
                <th colspan="7" style="text-align:center;">Month : {{date('F Y', strtotime($period))}}</th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Employee</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Outstanding Balance</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Installment</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Total Payment</th>
            </tr>
            <tr>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Name</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Principal + Interest</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Principal</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Interest</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
                @foreach($value->loanEmployeeList as $key2 => $value2)
                <tr>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $key2 + 1 }}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value2->employeeNo}}</td>
                    <td style="border:1px solid #000; text-align:left; padding:4px;">{{$value2->employeeName}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->principalInterest}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->installmentPerMonth}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->interest}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->paymentAmount}}</td>
                </tr>
                @endforeach
            @endforeach
            @if(isset($value))
                <tr>
                    <td colspan="3" style="border:1px solid #000; text-align:center; padding:4px; font-weight:bold;">Grand Total</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->grandTotalPrincipalInterest}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->grandTotalInstallment}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->grandTotalInterest}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->grandTotalPaidAmount}}</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>