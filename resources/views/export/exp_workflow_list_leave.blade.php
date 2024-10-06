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
				<th>Employee Number</th>
				<th>Employee Name</th>
				<th>Leave Type</th>
				<th>Waktu Cuti</th>
                <th>Leave Start Date</th>
				<th>Leave End Date</th>
				<th>Approve Date</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ isset($value->leaveEntity->employeeNo) ? $value->leaveEntity->employeeNo : '' }}</td>
				<td>{{ isset($value->leaveEntity->fullnameRequester) ? $value->leaveEntity->fullnameRequester : '' }}</td>
				<td>{{ isset($value->leaveEntity->leaveName) ? $value->leaveEntity->leaveName : '' }}</td>
				<td>{{ isset($value->leaveEntity->dayDuration) ? $value->leaveEntity->dayDuration : '' }}</td>
				<td>{{ isset($value->leaveEntity->leaveDateFrom) ? date('Y-m-d', strtotime($value->leaveEntity->leaveDateFrom)) : '' }}</td>
				<td>{{ isset($value->leaveEntity->leaveDateTo) ? date('Y-m-d', strtotime($value->leaveEntity->leaveDateTo)) : '' }}</td>
				<td>{{ isset($value->leaveEntity->changedDate) ? date('Y-m-d', strtotime($value->leaveEntity->changedDate)) : '' }}</td>
				<td>{{ isset($value->leaveEntity->leaveRemarks) ? $value->leaveEntity->leaveRemarks : '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>