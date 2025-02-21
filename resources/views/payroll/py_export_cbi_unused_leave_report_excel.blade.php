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
                <td colspan="3">Unused Leave Accrual Detail</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3">Period : {{ $data[0]->stringMonth }}</td>
            </tr>
        </table>
        <br>
        <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Employee No</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Employee Name</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Budget Code</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Product Code</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Monthly Salary</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Annual Salary</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Daily Rate</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Unused Leave Balance</th>
                    <th style="border:1px solid #000; background-color: #D3D3D3;">Unused Leave Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data[0]->employeeData as $key => $value)
                <tr>
                    <td style="border:1px solid #000;">{{ $value->employeeNo }}</td>
                    <td style="border:1px solid #000;">{{ $value->employeeName }}</td>
                    <td style="border:1px solid #000;">{{ $value->budgetCode }}</td>
                    <td style="border:1px solid #000; text-align: right">{{ $value->productCode }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->monthlySalary }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->annualSalary }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->dailyRate }}</td>
                    <td style="border:1px solid #000;">{{ $value->unusedLeaveBalance }}</td>
                    <td data-format="#,##0" style="border:1px solid #000;">{{ $value->unusedLeaveAmount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>