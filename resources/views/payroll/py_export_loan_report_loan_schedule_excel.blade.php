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
                <th colspan="7" style="text-align:center; font-size:14px; font-weight:bold;">LOAN SCHEDULE REPORT</th>
            </tr>
        </thead>
    </table>
    @foreach($data as $key => $value)
        <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: left;">Employee No</th>
                    <th style="border:1px solid #000; text-align: left;">{{$value->employeeNo}}</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: left;">Employee Name</th>
                    <th style="border:1px solid #000; text-align: left;">{{$value->fullName}}</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: left;">Seq</th>
                    <th style="border:1px solid #000; text-align: left;">{{$value->loanNo}}</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: left;">Loan Type</th>
                    <th style="border:1px solid #000; text-align: left;">{{$value->loanCode}}</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: left;">Loan Description</th>
                    <th style="border:1px solid #000; text-align: left;">{{$value->loanName}}</th>
                </tr>
                <tr>&nbsp;</tr>
            </thead>
            <tbody>
                @foreach($value->peminjaman as $key2 => $value2)
                    <tr>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; border:1px solid #000; text-align:left;">Source Document</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->sourceDocument}}</td>
                        <td style="border:1px solid #000;">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">Loan Date</td>
                        <td style="border:1px solid #000; text-align:right;">{{date('d M Y', strtotime($value2->loanDate))}}</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">Loan Amount</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->currencyCode}}</td>
                        <td data-format="#,##0.00" style="border:1px solid #000; text-align:right;">{{$value2->loanAmount}}</td>
                        <td>&nbsp;</td>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">First Payment Date</td>
                        <td style="border:1px solid #000; text-align:right;">{{date('d M Y', strtotime($value2->firstPaymentDate))}}</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">Interest</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->currencyCode}}</td>
                        <td data-format="#,##0.00" style="border:1px solid #000; border:1px solid #000; text-align:right;">{{$value2->interest}}</td>
                        <td>&nbsp;</td>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">Rate / Year</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->ratePerYear}} %</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">Principal + Interest</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->currencyCode}}</td>
                        <td data-format="#,##0.00" style="border:1px solid #000; text-align:right;">{{$value2->principalInterest}}</td>
                        <td>&nbsp;</td>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">No. of Installment</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->noOfInstallment}} Month(s)</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">Total Payment</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->currencyCode}}</td>
                        <td data-format="#,##0.00" style="border:1px solid #000; text-align:right;">{{$value2->paymentAmount}}</td>
                        <td>&nbsp;</td>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">Description</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->description}}</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align:left;">Outstanding Loan</td>
                        <td style="border:1px solid #000; text-align:right;">{{$value2->currencyCode}}</td>
                        <td data-format="#,##0.00" style="border:1px solid #000; text-align:right;">{{$value2->outstanding}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: center;">Date</th>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: center;">Seq</th>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: center;">Type</th>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: center;">Principal</th>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: center;">Interest</th>
                    <th style="border:1px solid #000; background-color:#84c2e0; font-weight: bold; text-align: center;">Payment Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($value2->payment as $key3 => $value3)
                    <tr>
                        <td style="border:1px solid #000; text-align:center;">{{date('d M Y', strtotime($value3->paymentDate))}}</td>
                        <td style="border:1px solid #000; text-align:center;">{{$value3->paymentSeq}}</td>
                        <td style="border:1px solid #000; text-align:center;">{{$value3->paymentType}}</td>
                        <td data-format="#,##0.00" style="border:1px solid #000; text-align:center;">{{$value3->paymentPrincipal}}</td>
                        <td data-format="#,##0.00" style="border:1px solid #000; text-align:center;">{{$value3->paymentInterest}}</td>
                        <td data-format="#,##0.00" style="border:1px solid #000; text-align:center;">{{$value3->totalPayment}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>