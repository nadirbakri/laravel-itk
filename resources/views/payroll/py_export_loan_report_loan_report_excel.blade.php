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
                <th colspan="11" style="font-size:14px; font-weight:bold;">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="11" style="font-size:12px; font-weight:bold;">{{ $data_company[0]->address }}</th>
            </tr>
            <tr>
                <th colspan="11" style="text-align:center; font-size:12px; font-weight:bold;">LOAN REPORT</th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th colspan="3" style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Employee</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Seq</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Source Document</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Loan Date</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">First Payment</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Currency</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Loan Amount</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">No of Installment</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Rate / Year</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Interest</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Installment / Period</th>
            </tr>
            <tr>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">No</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
            <tr>
                <td style="border:1px solid #000; text-align:center; padding:4px;">Loan Type</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->loanCode}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->loanDescription}}</td>
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
            <?php
            $totalLoanAmount = 0;
            $totalInterest = 0;
            $totalInstallment = 0;
            ?>
            @foreach($value->loanType as $key2 => $value2)
            <tr>
                <?php 
                $totalLoanAmount += $value->loanAmount; 
                $totalInterest += $value->paymentInterest; 
                $totalInstallment += $value->installmentPerMonth; 
                ?>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->employeeNo}}</td>
                <td colspan="2" style="border:1px solid #000; text-align:center; padding:4px;">{{$value->fullName}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->loanNo}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->sourceDocument}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->loanDate}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->firstPaymentDate}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->currencyCode}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->loanAmount}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->noOfInstallment}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->ratePerYear}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->paymentInterest}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->installmentPerMonth}}</td>
            </tr>
            @endforeach
            <tr>
                <td style="border:1px solid #000; text-align:center; padding:4px;">Total Loan</td>
                <td style="border:1px solid #000; text-align:center; padding:4px; font-weight:bold;">{{$value->loanCode}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->loanDescription}}</td>
                <td colspan="5" style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$totalLoanAmount}}</td>
                <td colspan="2" style="border:1px solid #000; text-align:center; padding:4px;"></td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$totalInterest}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$totalInstallment}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2" style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                <td style="border:1px solid #000; text-align:center; padding:4px; font-weight:bold;">Grand Total</td>
                <td colspan="5" style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{($totalLoanAmount * 2)}}</td>
                <td colspan="2" style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{($totalInterest * 2)}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{($totalInstallment * 2)}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>