<!DOCTYPE html>
<html>
<head>
    <title>Period Fund Report</title>
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
                <td>&nbsp;</td>
                <td colspan="3">{{ $data[0]->companyName }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3">Medical Reimbursement Limit</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3">Period : {{ $data[0]->periodYear }}</td>
            </tr>
        </table>
        <br>
        <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">No</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Employee No</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Employee Name</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Code</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Enroll</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Resign</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Jan</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Feb</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Mar</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Apr</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">May</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Jun</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Jul</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Aug</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Sep</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Oct</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Nov</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Des</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Limit From Salary</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Additional Limit Maternity</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Total Limit</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Jan</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Feb</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Mar</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Apr</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical May</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Jun</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Jul</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Aug</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Sep</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Oct</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Nov</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Medical Des</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Total Claim</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Remain Balance</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">CTRL CHECK</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data[0]->employeeData as $key => $value)
                <tr>
                    <td style="border:1px solid #000;">{{ $key+1 }}</td>
                    <td style="border:1px solid #000;">{{ $value->employeeNo }}</td>
                    <td style="border:1px solid #000;">{{ $value->employeeName }}</td>
                    <td style="border:1px solid #000;">{{ $value->code }}</td>
                    <td style="border:1px solid #000;">{{ $value->enroll }}</td>
                    <td style="border:1px solid #000;">{{ $value->resignDate }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->januaryLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->februaryLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->marchLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->aprilLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->mayLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->juneLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->julyLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->augustLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->septemberLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->octoberLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->novemberLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->decemberLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->limitFromSalary }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->additionalLimitMaternity }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->totalLimit }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->januaryClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->februaryClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->marchClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->aprilClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->mayClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->juneClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->julyClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->augustClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->septemberClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->octoberClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->novemberClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->decemberClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->totalClaim }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->reimbursementBalance }}</td>
                    <td style="border:1px solid #000;">{{ $value->controlCheck }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>