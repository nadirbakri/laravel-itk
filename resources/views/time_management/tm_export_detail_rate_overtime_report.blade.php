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
                <th colspan="4">Overtime</th>
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
			<?php $length_overtime = count($value->rateOvertime); ?>
			<tr>
                <td rowspan="{{ $length_overtime }}">{{ $no++ }}</td>
				<td rowspan="{{ $length_overtime }}">{{ $value->employeeNo }}</td>
				<td rowspan="{{ $length_overtime }}">{{ $value->fullName }}</td>
				@foreach($value->rateOvertime as $value2)
					<td>{{ date('Y-m-d',strtotime($value2->absentDate)) }}</td>
					<td>{{ $value2->day }}</td>
					<td>{{ $value2->statusDay }}</td>
					<td>{{ date('H:i',strtotime($value2->hourOvt)) }}</td>
					<td>{{ date('H:i',strtotime($value2->totalNormalHour)) }}</td>
					<td>{{ $value2->xfactor1 }}</td>
					<td>{{ $value2->xfactor2 }}</td>
					<td>{{ $value2->xfactor3 }}</td>
					<td>{{ $value2->xfactor4 }}</td>
					<td>{{ $value2->hourOvtCvt }}</td>
					<td>{{ $value2->rateHour }}</td>
					<td>{{ $value2->overtimeRate }}</td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>