<!DOCTYPE html>
<html>
<head>
    <title>Medical Reimbursement</title>
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
        .table_detail td{
            text-align:center;
			border:1px solid #000;
			text-align:center;
		}
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    @if(count($data) > 0)
        <table>
            <tr>
                <td colspan="11"><b>{{ $data[0]->companyName }}</b></td>
            </tr>
            <tr>
                <td colspan="11"><b>{{ $data[0]->companyLocation }}</b></td>
            </tr>
            <tr>
                <td colspan="11" style="text-align: center;"><b>MEDICAL FACILITY USED</b></td>
            </tr>
            <tr>
                <td colspan="11"><b>Type of Method : {{ $data[0]->claimTo }}</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><b>No</b></td>
                <td><b>Employee</b></td>
                <td colspan="3"><b>Full Name</b></td>
                <td><b>Receipt Date</b></td>
                <td><b>Position</b></td>
                <td><b>Ranking</b></td>
                <td>&nbsp;</td>
                <td><b>Employee</b></td>
            </tr>
            <tr>
                <td colspan="11">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2"><b>Currency Code</b></td>
                <td>{{ $data[0]->currencyCode }}</td>
            </tr>
        @foreach($data[0]->claimPerType as $key => $value)
            <tr>
                <td>&nbsp;</td>
                <td colspan="2"><b>Claim Code</b></td>
                <td>{{ $value->medicalType }}</td>
                <td colspan="2">- {{ $value->medicalClaim }}</td>
            </tr>
            @foreach($value->employeeData as $key2 => $value2)
            <tr>
                <td>&nbsp;</td>
                <td>{{ $key2+1 }}</td>
                <td data-format="@" style="text-align: right;">{{ $value2->employeeNo }}</td>
                <td colspan="3">{{ $value2->employeeName }}</td>
                <td>{{ $value2->receiptDate }}</td>
                <td>{{ $value2->position }}</td>
                <td>{{ $value2->rank }}</td>
                <td>{{ $value2->currencyCode }}</td>
                <td data-format="#,##0">{{ $value2->claimAmount }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7">&nbsp;</td>
                <td colspan="2">Total Claim Post Code</td>
                <td>{{ $value->employeeData[0]->currencyCode }}</td>
                <td data-format="#,##0" style="text-align: right;">{{ $value->totalClaimPerType }}</td>
            </tr>
        @endforeach
        </table>
        <br><br><br><br><br>
        <table>
            <tr>
                <td>&nbsp;</td>
                <td><b>Report Parameters :</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="5">Employee No : {{ empty($data[0]->employeeNoFrom) ? "-" : $data[0]->employeeNoFrom }} To {{ empty($data[0]->employeeNoTo) ? "-" : $data[0]->employeeNoTo }}</td>
                <td colspan="3">Claim Code : {{ $data[0]->claimCode }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="5">Period : {{ $data[0]->period }}</td>
                <td colspan="3">Claim To : {{ $data[0]->claimTo }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="5">Currency Code : {{ $data[0]->currencyCode }}</td>
            </tr>
            <tr>
                <td colspan="9">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Total Printed</td>
                <td colspan="4">{{ $data[0]->totalPrintedData }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>{{ date('d M Y', strtotime($data[0]->printDate)) }}</td>
                <td>{{ date('H:i:s', strtotime($data[0]->printDate)) }}</td>
            </tr>
        </table>
    @endif
</body>
</html>