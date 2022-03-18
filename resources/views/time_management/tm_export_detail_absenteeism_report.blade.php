<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_detail_absenteeism_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
			text-align:"center";
		}
	</style>
</head>

<body>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<thead>
			<tr>
				<th rowspan="2">Employee No</th>
				<th rowspan="2">Employee Name</th>
				<th rowspan="2">Absent Date</th>
                <th rowspan="2">Day</th>
                <th rowspan="2">Shift</th>
                <th colspan="2">Normal</th>
                <th colspan="3">Actual Time</th>
                <th colspan="2">Absent</th>
			</tr>
			<tr>
				<td>In</td>
                <td>Out</td>
                <td>In</td>
                <td>Out</td>
                <td>Overtime</td>
                <td>Code</td>
                <td>Description</td>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $value)
			<tr>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
                <td>{{ date('Y-m-d',strtotime($value->absentDate)) }}</td>
                <td>{{ $value->day }}</td>
                <td>{{ $value->shiftCode }}</td>
                <td>{{ date('H:i',strtotime($value->normalDateIn)) }}</td>
                <td>{{ date('H:i',strtotime($value->normalDateOut))  }}</td>
                <td>{{ date('H:i',strtotime($value->actualDateIn)) }}</td>
                <td>{{ date('H:i',strtotime($value->actualDateOut)) }}</td>
                <td>{{ date('H:i',strtotime($value->hourOvt)) }}</td>
                <td>{{ $value->absentCode }}</td>
                <td>{{ $value->description }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>