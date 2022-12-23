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
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Loan Amount</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Interest</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Interest + Principal</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Total of Payment</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Outstanding</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Last Payment</th>
            </tr>
            <tr>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">No</th>
                <th colspan="2" style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Name</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Date</th>
                <th style="border:1px solid #000; padding:4px; background-color:#84c2e0;">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
            <tr>
                <td style="border:1px solid #000; text-align:center; padding:4px;">Loan Type</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnE}}</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnE}}</td>
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
                @foreach($value->loanType as $key2 => $value2)
                <tr>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnD}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnE}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnF}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnG}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnH}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnI}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnJ}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnK}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnL}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnM}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnN}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnO}}</td>
                    <td style="border:1px solid #000; text-align:center; padding:4px;">{{$value->columnP}}</td>
                </tr>
                @endforeach
            </tr>
            @endforeach
            <tr>
                <td colspan="2" style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                <td style="border-bottom:1px solid #000; border-left: none; text-align:center; padding:4px; font-weight:bold;">Grand Total</td>
                <td colspan="3" style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;"></td>
                <td style="border:1px solid #000; text-align:center; padding:4px;"></td>
                <td style="border:1px solid #000; text-align:center; padding:4px;"></td>
                <td style="border:1px solid #000; text-align:center; padding:4px;"></td>
                <td style="border:1px solid #000; text-align:center; padding:4px;"></td>
                <td style="border:1px solid #000; text-align:center; padding:4px;">&nbsp;</td>
                <td style="border:1px solid #000; text-align:center; padding:4px;"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>