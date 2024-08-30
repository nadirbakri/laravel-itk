<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_export_import_leave.judul') }}</title>
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
				<th>Employee No</th>
				<th>Employee Name</th>
				<th>Leave Code</th>
				<th>Leave Name</th>
				<th>Leave Balance</th>
				<th>Leave Balance Before</th>
				<th>Expired Date Before</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $value)
			<tr>
                <td>{{ $value->employeeNo }}</td>
				<td>{{ $value->employeeName }}</td>
				<td>{{ $value->leaveCode }}</td>
				<td>{{ $value->leaveName }}</td>
				<td>{{ $value->leaveBalance }}</td>
              	<td>{{ $value->leaveBalanceBefore }}</td>
				<td>{{ empty($value->leaveBalanceBeforeExpiredDate) ? '' : date('Y-m-d', strtotime($value->leaveBalanceBeforeExpiredDate)) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>