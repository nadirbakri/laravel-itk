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
                <th>Permit Start Date</th>
                <th>Permit End Date</th>
                <th>Permit Start Time</th>
                <th>Permit End Time</th>
				<th>Approve Date</th>
                <th>Description</th>
				<th>Customer Name</th>
				<th>Tanggal Ganti Off</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ isset($value->permitEntity->employeeNo) ? $value->permitEntity->employeeNo : '' }}</td>
				<td>{{ isset($value->permitEntity->fullnameRequester) ? $value->permitEntity->fullnameRequester : '' }}</td>
				<td>{{ isset($value->permitEntity->permitCode) ? $value->permitEntity->permitCode : '' }}</td>
				<td>{{ isset($value->permitEntity->permitDateFrom) ? date('Y-m-d', strtotime($value->permitEntity->permitDateFrom)) : '' }}</td>
				<td>{{ isset($value->permitEntity->permitDateTo) ? date('Y-m-d', strtotime($value->permitEntity->permitDateTo)) : '' }}</td>
				<td>{{ isset($value->permitEntity->permitHourFrom) ? date('H:i', strtotime($value->permitEntity->permitHourFrom)) : '' }}</td>
				<td>{{ isset($value->permitEntity->permitHourTo) ? date('H:i', strtotime($value->permitEntity->permitHourTo)) : '' }}</td>
				<td>{{ isset($value->permitEntity->approvalDate) ? date('Y-m-d', strtotime($value->permitEntity->approvalDate)) : '' }}</td>
				<td>{{ isset($value->permitEntity->permitRemarks) ? $value->permitEntity->permitRemarks : '' }}</td>
				<td>{{ isset($value->permitEntity->customerName) ? $value->permitEntity->customerName : '' }}</td>
				<td>{{ isset($value->permitEntity->overtimeDate) ? date('Y-m-d', strtotime($value->permitEntity->overtimeDate)) : '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>