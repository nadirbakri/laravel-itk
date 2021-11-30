<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_report_by_status.judul') }}</title>
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
				<th>Gender</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Ranking</th>
                <th>Position</th>
                <th>Location</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
                <td>{{ $value->gender }}</td>
                <td>{{ $value->contractstartDate }}</td>
                <td>{{ $value->contractendDate }}</td>
                <td>{{ $value->ranking }}</td>
                <td>{{ $value->position }}</td>
                <td>{{ $value->location }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>