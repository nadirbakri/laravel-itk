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
    @foreach($data as $key => $value)
    <table>
        <thead>
            <tr>
                <th colspan="11" style="font-size:14px; font-weight:bold;">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="11" style="font-size:12px; font-weight:bold;">{{ $data_company[0]->address }}</th>
            </tr>
        </thead>
    </table>
    <br>
    <table style="width: 100%; border-collapse: collapse;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <td style="padding:4px; background-color:#84c2e0;">{{ $data_company[0]->employeeNo }}</td>
                <td style="padding:4px; background-color:#84c2e0;">{{ $data_company[0]->fullName }}</td>
                <td colspan="4" style="padding:4px; background-color:#84c2e0;">&nbsp;</td>
            </tr>
            <?php 
            $i = 0; 
            $stat = false;
            ?>
            @foreach($value->levelList as $key2 => $value2)
            <?php $i++; ?>
            @if($i % 2 == 0)
            <?php $stat = true; ?>
                <td style="padding:4px; background-color:#84c2e0;">{{ $data_company[0]->levelType }}</td>
                <td style="padding:4px; background-color:#84c2e0;">{{ $data_company[0]->levelCode }}</td>
                <td style="padding:4px; background-color:#84c2e0;">{{ $data_company[0]->levelName }}</td>
            </tr>
            @else
            <?php $stat = false; ?>
            <tr>
                <td style="padding:4px; background-color:#84c2e0;">{{ $data_company[0]->levelType }}</td>
                <td style="padding:4px; background-color:#84c2e0;">{{ $data_company[0]->levelCode }}</td>
                <td style="padding:4px; background-color:#84c2e0;">{{ $data_company[0]->levelName }}</td>
            @endif
            @endforeach
            @if(!$stat)
            </tr>
            @endif
        </thead>
        <br>
        <tbody>
            @foreach($value->peminjaman as $key2 => $value2)
            <tr style="border-bottom:1px solid #000;">
                <td style="border-bottom:1px solid #000; text-align:center; padding:4px;">{{ $key2++; }}</td>
                <td style="border-bottom:1px solid #000; text-align:center; padding:4px;">{{$value2->loanNo}}</td>
                <td style="border-bottom:1px solid #000; text-align:center; padding:4px;">{{$value2->loanCode}}</td>
                <td style="border-bottom:1px solid #000; text-align:center; padding:4px;">{{$value2->loanDescription}}</td>
                <td colspan="2" style="border-bottom:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
            </tr>
            <br>
            <tr>
                <td style="text-align:center; padding:4px;">Source Document</td>
                <td colspan="2" style="text-align:center; padding:4px;">&nbsp;</td>
                <td style="text-align:center; padding:4px;">Loan Date</td>
                <td style="text-align:center; padding:4px;">{{$value2->loanDate}}</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align:center; padding:4px;">Loan Amount</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
                <td style="text-align:center; padding:4px;">{{$value2->loanAmount}}</td>
                <td style="text-align:center; padding:4px;">First Payment Date</td>
                <td style="text-align:center; padding:4px;">{{$value2->firstPaymentDate}}</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align:center; padding:4px;">Interest</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
                <td style="text-align:center; padding:4px;">{{$value2->interest}}</td>
                <td style="text-align:center; padding:4px;">Rate / Year</td>
                <td style="text-align:center; padding:4px;">{{$value2->ratePerYear}}</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align:center; padding:4px;">Principal + Interest</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
                <td style="text-align:center; padding:4px;">{{($value2->paymentPrincipal+$value2->paymentInterest)}}</td>
                <td style="text-align:center; padding:4px;">Installment / Period</td>
                <td style="text-align:center; padding:4px;">{{$value2->installmentPerMonth}}</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align:center; padding:4px;">Total Payment</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
                <td style="text-align:center; padding:4px;">{{$value2->paymentAmount}}</td>
                <td style="text-align:center; padding:4px;">No. of Installment</td>
                <td style="text-align:center; padding:4px;">{{$value2->noOfInstallment}}</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align:center; padding:4px;">Outstanding Loan</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
                <td style="text-align:center; padding:4px;">{{(($value2->loanAmount + $value2->interest) - $value2->paymentAmount)}}</td>
                <td style="text-align:center; padding:4px;">Description</td>
                <td style="text-align:center; padding:4px;">{{$value2->description}}</td>
                <td style="text-align:center; padding:4px;">&nbsp;</td>
            </tr>
            <br>
            <tr>
                <td colspan="6" style="text-align:center; padding:4px;">Payment</td>
            </tr>
            <tr>
                <th style="border:1px solid #000; text-align:center; padding:4px;">No</th>
                <th style="border:1px solid #000; text-align:center; padding:4px;">Date</th>
                <th style="border:1px solid #000; text-align:center; padding:4px;">Type</th>
                <th style="border:1px solid #000; text-align:center; padding:4px;">Amount</th>
                <th style="border:1px solid #000; text-align:center; padding:4px;">Description</th>
                <th style="text-align:center; padding:4px;">&nbsp;</th>
            </tr>
            @foreach($value2->payment as $key3 => $value3)
            <tr>
                <th style="border:1px solid #000; text-align:center; padding:4px;">{{$key3++;}}</th>
                <th style="border:1px solid #000; text-align:center; padding:4px;">{{$value3->paymentDate}}</th>
                <th style="border:1px solid #000; text-align:center; padding:4px;">{{$value3->paymentType}}</th>
                <th style="border:1px solid #000; text-align:center; padding:4px;">{{($value3->paymentInterest+$value3->paymentPrincipal)}}</th>
                <th style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</th>
                <th style="text-align:center; padding:4px;">&nbsp;</th>
            </tr>
            @endforeach
            @endforeach
            
        </tbody>
    </table>
    @endforeach
</body>
</html>