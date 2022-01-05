<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_postpone_leave_report.judul') }}</title>
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
				<th colspan="2">Annual Leave</th>
                <th colspan="2">Long Leave</th>
                <th rowspan="2">Total Leave</th>
			</tr>
			<tr>
				<th>Total</th>
				<th>Postpone</th>
				<th>Total</th>
				<th>Postpone</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
				<td>{{ $value->leaveBalanceBefore }}</td>
				<td>{{ $value->leaveBalanceBeforeExpiredDate }}</td>
				<td>{{ $value->leaveBalanceBefore2 }}</td>
				<td>{{ $value->leaveBalanceBeforeExpiredDate2 }}</td>
				<td>{{ $value->total }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>