<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_unpaid_leave_report.judul') }}</title>
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
				<th rowspan="2">No</th>
				<th rowspan="2">Employee No</th>
				<th rowspan="2">Employee Name</th>
				<th colspan="2">Unpaid Leave Date</th>
                <th rowspan="2">Description</th>
			</tr>
			<tr>
				<th>From</th>
				<th>To</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
				<td>{{ date('Y-m-d', strtotime($value->leaveDateFrom)) }}</td>
				<td>{{ date('Y-m-d', strtotime($value->leaveDateTo)) }}</td>
                <td>{{ $value->leaveRemarks }}</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>