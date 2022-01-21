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
			@foreach($data as $value)
			<tr>
                <td>{{ $value->no }}</td>
				<td>{{ $value->employeeno }}</td>
				<td>{{ $value->employeename }}</td>
				<td>{{ $value->normaldays }}</td>
				<td>{{ $value->normalhours->totalHours }}</td>
              	<td>{{ $value->actualdays }}</td>
				<td>{{ $value->actualhours->totalHours }}</td>
				<td>{{ $value->vanDays }}</td>
				<td>{{ $value->vanDaysP }}</td>
				<td>{{ $value->vanHours->totalHours }}</td>
				<td>{{ $value->vanHoursP }}</td>
				<td>{{ $value->overtimeDays }}</td>
				<td>{{ $value->overtimeDaysP }}</td>
				<td>{{ $value->overtimeHours->totalHours }}</td>
				<td>{{ $value->overtimeHoursP }}</td>
				<td>{{ $value->overtimeConvert }}</td>
				<td>{{ $value->absentDays }}</td>
				<td>{{ $value->absentHours->totalHours }}</td>
				<td>{{ $value->othersDays }}</td>
				<td>{{ $value->othersHours->totalHours }}</td>
				<td>{{ $value->leavePermitDays }}</td>
				<td>{{ $value->leavePermitHours->totalHours }}</td>
				<td>{{ $value->totalAbsentDays }}</td>
				<td>{{ $value->totalAbsentHours->totalHours }}</td>
				<td>{{ $value->ewDays }}</td>
				<td>{{ $value->ewDaysP }}</td>
				<td>{{ $value->ewHours->totalHours }}</td>			
				<td>{{ $value->ewHoursP }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>