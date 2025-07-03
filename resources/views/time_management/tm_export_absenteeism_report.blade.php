<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_absenteeism_report.judul') }}</title>
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
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<thead>
			<tr>
				<th>No</th>
				<th>Employee No</th>
				<th>Employee Name</th>
				<th>Absent Date</th>
                <th>Day</th>
				<th>Shift Code</th>
				<th>Actual Date In</th>
                <th>Actual Date Out</th>
				<th>Absent Code</th>
				<th>Absent Description</th>
                <th>Overtime Hour</th>
                <th>Overtime Hour Convert</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td style="text-align: left;">{{ $no++ }}</td>
				<td style="text-align: left;">{{ $value->employeeNo ?? '' }}</td>
				<td style="text-align: left;">{{ $value->fullName ?? '' }}</td>
				<td style="text-align: left;">{{ $value->absentDate ? date('Y-m-d', strtotime($value->absentDate)) : '' }}</td>
				<td style="text-align: left;">{{ $value->day ?? '' }}</td>
                <td style="text-align: left;">{{ $value->shiftCode ?? '' }}</td>
                <td style="text-align: left;">{{ $value->actualDateIn ? date('Y-m-d', strtotime($value->actualDateIn)) : '' }}</td>
                <td style="text-align: left;">{{ $value->actualDateOut ? date('Y-m-d', strtotime($value->actualDateOut)) : '' }}</td>
				<td style="text-align: left;">{{ $value->absentCode }}</td>
				<td style="text-align: left;">{{ $value->descriptionAbsent }}</td>
                <td style="text-align: left;">{{ $value->hourOvt }}</td>
                <td style="text-align: left;">{{ $value->hourOvtCvt }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>