<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_monthly_absenteeism_analysis.judul_export') }}</title>
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
	<table style="width: 100%; font-size: 14px;" >
		<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Employee No</th>
				<th rowspan="2">Employee Name</th>
				<th colspan="2">Normal</th>
				<th colspan="2">Actual</th>
				<th colspan="4">Variance Actual With Normal</th>
				<th colspan="5">Overtime</th>
				<th colspan="2">Absent</th>
				<th colspan="2">Others</th>
				<th colspan="2">Leave Permit</th>
				<th colspan="2">Total Absent</th>
				<th colspan="4">Effective Working</th>
			</tr>
			<tr>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
				<th>Convert</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1; 
			?>
			@foreach($data as $key => $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td style="text-align: left;">{{ $value->employeeNo }}</td>
				<td>{{ $value->employeeName }}</td>
				<td>{{ $value->normal->days }}</td>
				<td>{{ $value->normal->hours }}</td>
              	<td>{{ $value->actual->days }}</td>
				<td>{{ $value->actual->hours }}</td>
				<td>{{ $value->varianceActualWithNormal->days }}</td>
				<td>{{ $value->varianceActualWithNormal->daysPercentage }}</td>
				<td>{{ $value->varianceActualWithNormal->hours }}</td>
				<td>{{ $value->varianceActualWithNormal->hoursPercentage }}</td>
				<td>{{ $value->overtime->days }}</td>
				<td>{{ $value->overtime->daysPercentage }}</td>
				<td>{{ $value->overtime->hours }}</td>
				<td>{{ $value->overtime->hoursPercentage }}</td>
				<td>{{ $value->overtime->convert }}</td>
				<td>{{ $value->absent->days }}</td>
				<td>{{ $value->absent->hours }}</td>
				<td>{{ $value->others->days }}</td>
				<td>{{ $value->others->hours }}</td>
				<td>{{ $value->leavePermit->days }}</td>
				<td>{{ $value->leavePermit->hours }}</td>
				<td>{{ $value->totalAbsent->days }}</td>
				<td>{{ $value->totalAbsent->hours }}</td>
				<td>{{ $value->effectiveHours->days }}</td>
				<td>{{ $value->effectiveHours->daysPercentage }}</td>
				<td>{{ $value->effectiveHours->hours }}</td>			
				<td>{{ $value->effectiveHours->hoursPercentage }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>