<!DOCTYPE html>
<html>
<head>
    <title>Salary Summary Report</title>
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
                <td colspan="3"><b>{{ $data[0]->companyName }}</b></td>
            </tr>
            <tr>
                <td colspan="3"><b>Salaries Summary</b></td>
            </tr>
            <tr>
                <td colspan="3"><b>Period : {{ $data[0]->period }}</b></td>
            </tr>
        </table>
        <br>
        <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    <th colspan="15" style="border:1px solid #000;"><b>Employee Data</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>1</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>2</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>3</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>4</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>5</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>6</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>7</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>8</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>9</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>10</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>11</b></th>
                    <th colspan="6" style="border:1px solid #000; text-align: left;"><b>12</b></th>
                </tr>
                <tr>
                    <th style="border:1px solid #000;"><b>No</b></th>
                    <th style="border:1px solid #000;"><b>Employee Name</b></th>
                    <th style="border:1px solid #000;"><b>Code</b></th>
                    <th style="border:1px solid #000;"><b>Birth</b></th>
                    <th style="border:1px solid #000;"><b>Gender</b></th>
                    <th style="border:1px solid #000;"><b>Status</b></th>
                    <th style="border:1px solid #000;"><b>Dept</b></th>
                    <th style="border:1px solid #000;"><b>Dept</b></th>
                    <th style="border:1px solid #000;"><b>Dept</b></th>
                    <th style="border:1px solid #000;"><b>Enroll</b></th>
                    <th style="border:1px solid #000;"><b>Resign</b></th>
                    <th style="border:1px solid #000;"><b>Term of Employment</b></th>
                    @foreach($data[0]->employeeData[0]->employeeSalaryData as $key => $value)
                        @if($loop->first)
                            <th style="border:1px solid #000;"><b>{{ $value->periods }}</b></th>
                            <th style="border:1px solid #000;"><b>Remarks</b></th>
                            <th style="border:1px solid #000;"><b></b></th>
                        @else
                            <th style="border:1px solid #000;"><b>{{ $value->periods }}</b></th>
                            <th style="border:1px solid #000;"><b>Var Previous Month</b></th>
                            <th style="border:1px solid #000;"><b>%</b></th>
                            <th style="border:1px solid #000;"><b>Check</b></th>
                            <th style="border:1px solid #000;"><b>Remarks</b></th>
                            <th style="border:1px solid #000;"><b></b></th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data[0]->employeeData as $key => $value)
                <tr>
                    <td style="border:1px solid #000;">{{ $key+1 }}</td>
                    <td style="border:1px solid #000;">{{ $value->employeeName }}</td>
                    <td style="border:1px solid #000;">{{ $value->code }}</td>
                    <td style="border:1px solid #000;">{{ empty($value->birthDate) ? "" : date('m/d/Y',strtotime($value->birthDate)) }}</td>
                    <td style="border:1px solid #000;">{{ $value->gender }}</td>
                    <td style="border:1px solid #000;">{{ $value->status }}</td>
                    <td style="border:1px solid #000;">{{ $value->departement1 }}</td>
                    <td style="border:1px solid #000;">{{ $value->departement2 }}</td>
                    <td style="border:1px solid #000;">{{ $value->departement3 }}</td>
                    <td style="border:1px solid #000;">{{ empty($value->enrollDate) ? "" : date('m/d/Y',strtotime($value->enrollDate)) }}</td>
                    <td style="border:1px solid #000;">{{ empty($value->resignDate) ? "" : date('m/d/Y',strtotime($value->resignDate)) }}</td>
                    <td style="border:1px solid #000;">{{ $value->employmentStatus }}</td>
                    @foreach($value->employeeSalaryData as $key2 => $value2)
                        @if($loop->first)
                            <th data-format="#,##0" style="border:1px solid #000; text-align: {{ ($value2->basicSalary == 0) ? 'center' : 'right' }};">{{ ($value2->basicSalary == 0) ? "-" : $value2->basicSalary }}</th>
                            <th style="border:1px solid #000;">{{ $value2->remarks }}</th>
                            <th style="border:1px solid #000;"></th>
                        @else
                            <th data-format="#,##0" style="border:1px solid #000; text-align: {{ ($value2->basicSalary == 0) ? 'center' : 'right' }};">{{ ($value2->basicSalary == 0) ? "-" : $value2->basicSalary }}</th>
                            <th data-format="#,##0" style="border:1px solid #000; text-align: {{ ($value2->balance == 0) ? 'center' : 'right' }};">{{ ($value2->balance == 0) ? "-" : $value2->balance }}</th>
                            <th style="border:1px solid #000;">{{ $value2->percentage }}</th>
                            <th style="border:1px solid #000;">{{ $value2->check }}</th>
                            <th style="border:1px solid #000;">{{ $value2->remarks }}</th>
                            <th style="border:1px solid #000;"></th>
                        @endif
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>