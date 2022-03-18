<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_detail_rate_overtime_report.judul') }}</title>
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
                <th rowspan="2">No</th>
				<th rowspan="2">Employee No</th>
				<th rowspan="2">Employee Name</th>
				<th rowspan="2">Absent Date</th>
                <th rowspan="2">Day</th>
                <th rowspan="2">Status Day</th>
                <th rowspan="2">Total Hours Ovt</th>
                <th rowspan="2">Total Normal Hour</th>
                <th colspan="2">Overtime</th>
                <th rowspan="2">Total Ovt Index</th>
                <th rowspan="2">Rate Hour</th>
                <th rowspan="2">Overtime Rate</th>
			</tr>
            <tr>
                <th>x1.5</th>
                <th>x2.0</th>
                <th>x3.0</th>
                <th>x4.0</th>
            </tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
				<td>{{ $value->valueString }}</td>
				<td>{{ isset($value->valueNum) ? $value->valueNum : $value->valueDec }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>