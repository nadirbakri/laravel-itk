<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_list.judul') }}</title>
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
				<th>Status</th>
				<th>Employee Number</th>
				<th>Employee Name</th>
				<th>Leave Type</th>
                <th>Leave Time</th>
                <th>Leave Start</th>
				<th>Leave End</th>
				<th>Leave Duration</th>
				<th>Approve Date</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->leaveEntity->status }}</td>
				<td>{{ $value->leaveEntity->employeeNo }}</td>
				<td>{{ $value->leaveEntity->fullnameRequester}}</td>
				<td>{{ $value->leaveEntity->leaveName }}</td>
				<td>{{ $value->leaveEntity->leaveTime }}</td>
				<td>{{ date('Y-m-d', strtotime($value->leaveEntity->leaveDateFrom)) }}</td>
				<td>{{ date('Y-m-d', strtotime($value->leaveEntity->leaveDateTo)) }}</td>
				<td>{{ $value->leaveEntity->leaveDuration }}</td>
				<td>{{ date('Y-m-d', strtotime($value->leaveEntity->changedDate)) }}</td>
				<td>{{ $value->leaveEntity->leaveRemarks }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>