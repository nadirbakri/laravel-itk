<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_detail_absenteeism_reason_report.judul_short') }}</title>
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
                <th>No</th>
				<th>Employee No</th>
				<th>Employee Name</th>
				<th>Absent Date</th>
                <th>Absent Code</th>
                <th>Absent Name</th>
                <th>Day</th>
                <th>Hour</th>
                <th>Description</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
				<td>{{ date('Y-m-d',strtotime($value->absentDate)) }}</td>
                <td>{{ $value->absentCode }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->day }}</td>
                <td>{{ date('H:i',strtotime($value->hourAbsent)) }}</td>
                <td>{{ $value->descriptionAbsent }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>