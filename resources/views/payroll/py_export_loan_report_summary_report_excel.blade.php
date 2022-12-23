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
                <th colspan="11" style="text-align:center; font-size:12px; font-weight:bold;">LOAN SUMMARY</th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Employee</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">{{ $loanDesc1 }}</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">{{ $loanDesc2 }}</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">{{ $loanDesc3 }}</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Total</th>
            </tr>
            <tr>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">No</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Name</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Amount</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Installment</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Amount</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Installment</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Amount</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Installment</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Amount</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0; text-align:center;">Installment</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $grandTotalAmount1 = 0;
            $grandTotalAmount2 = 0;
            $grandTotalAmount3 = 0;
            $grandTotalInstallment1 = 0;
            $grandTotalInstallment2 = 0;
            $grandTotalInstallment3 = 0;
            ?>
            @foreach($data as $key => $value)
            <?php
            $totalAmountLoan1 = 0;
            $totalAmountLoan2 = 0;
            $totalAmountLoan3 = 0;
            $totalInstallmentLoan1 = 0;
            $totalInstallmentLoan2 = 0;
            $totalInstallmentLoan3 = 0;

            foreach($value->loanSummeryDesc as $key2 => $value2){
                if($value2->loanCode == $loanDesc1){
                    $totalAmountLoan1 += $value2->loanAmount;
                    $totalInstallmentLoan1 += $value2->installmentPerMonth;
                }

                if($value2->loanCode == $loanDesc2){
                    $totalAmountLoan2 += $value2->loanAmount;
                    $totalInstallmentLoan2 += $value2->installmentPerMonth;
                }

                if($value2->loanCode == $loanDesc3){
                    $totalAmountLoan3 += $value2->loanAmount;
                    $totalInstallmentLoan3 += $value2->installmentPerMonth;
                }
            }

            $grandTotalAmount1 += $totalAmountLoan1;
            $grandTotalAmount2 += $totalAmountLoan2;
            $grandTotalAmount3 += $totalAmountLoan3;
            $grandTotalInstallment1 += $totalInstallmentLoan1;
            $grandTotalInstallment2 += $totalInstallmentLoan2;
            $grandTotalInstallment3 += $totalInstallmentLoan3;

            ?>
            <tr>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->employeeNo}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->fullName}}</td>
                
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($totalAmountLoan1, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($totalInstallmentLoan1, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($totalAmountLoan2, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($totalInstallmentLoan2, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($totalAmountLoan3, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($totalInstallmentLoan3, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format(($totalAmountLoan1+$totalAmountLoan2+$totalAmountLoan3), 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format(($totalInstallmentLoan1+$totalInstallmentLoan2+$totalInstallmentLoan3), 2, ',', '.')}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2" style="border:1px solid #000; text-align:center; padding:4px;">Grand Total</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($grandTotalAmount1, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($grandTotalAmount2, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($grandTotalAmount3, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($grandTotalInstallment1, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($grandTotalInstallment2, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format($grandTotalInstallment3, 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format(($grandTotalAmount1+$grandTotalAmount2+$grandTotalAmount3), 2, ',', '.')}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{number_format(($grandTotalInstallment1+$grandTotalInstallment2+$grandTotalInstallment3), 2, ',', '.')}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>