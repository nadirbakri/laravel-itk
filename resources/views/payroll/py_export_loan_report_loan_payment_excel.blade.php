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
                <th colspan="12" style="font-size:14px; font-weight:bold;">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="12" style="font-size:14px; font-weight:bold;">{{ $data_company[0]->address }}</th>
            </tr>
            <tr>
                <th colspan="12" style="text-align:center; font-size:14px; font-weight:bold;">LOAN PAYMENT REPORT</th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                <th colspan="3" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Employee</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Seq</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Source Document</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Loan Date</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Loan Amount</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Interest</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Principal + Interest</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Total Payment</th>
                <th rowspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Outstanding</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Last Payment</th>
            </tr>
            <tr>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Name</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Date</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; font-weight: bold; text-align: center; vertical-align: middle;">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data[0]->loanReportData as $key => $value)
                <tr>
                    <td colspan="2" style="border:1px solid #000; font-weight:bold; text-align:center; padding:4px;">Loan Type</td>
                    <td style="border:1px solid #000; font-weight:bold; text-align:center; padding:4px;">{{$value->loanCode}}</td>
                    <td style="border:1px solid #000; font-weight:bold; text-align:center; padding:4px;">{{$value->loanDescription}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                </tr>
                @foreach($value->listData as $key2 => $value2)
                <tr>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{ $key2 + 1 }}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value2->employeeNo}}</td>
                    <td colspan="2" style="border:1px solid #000; text-align:left; padding:4px;">{{$value2->fullName}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value2->loanNo}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value2->sourceDocument}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{date('d M Y', strtotime($value2->loanDate))}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->loanAmount}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->paymentInterest}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->principalInterest}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->totalPayment}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->outstanding}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{date('d M Y', strtotime($value2->lastPaymentDate))}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; text-align:right; padding:4px;">{{$value2->paymentAmount}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" style="border:1px solid #000; font-weight:bold; text-align:center; padding:4px;">Total Loan</td>
                    <td style="border:1px solid #000; font-weight:bold; text-align:center; padding:4px;">{{$value->loanCode}}</td>
                    <td style="border:1px solid #000; font-weight:bold; text-align:center; padding:4px;">{{$value->loanDescription}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->totalLoan}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->totalInterest}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->totalPrincipalInterest}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->totalPaidAmount}}</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->totalOutstanding}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                    <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$value->totalLastPaid}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="7" style="border:1px solid #000; text-align:center; padding:4px; font-weight:bold;">Grand Total</td>
                <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$data[0]->grandTotalLoan}}</td>
                <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$data[0]->grandTotalInterest}}</td>
                <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$data[0]->grandTotalPrincipalInterest}}</td>
                <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$data[0]->grandTotalPayment}}</td>
                <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$data[0]->grandTotalOutstanding}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                <td data-format="#,##0.00" style="border:1px solid #000; font-weight:bold; text-align:right; padding:4px;">{{$data[0]->grandTotalLastPaid}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>