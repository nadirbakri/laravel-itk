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
				<th>Request Date</th>
				<th>Overtime ID</th>
				<th>Business Unit</th>
				<th>Employee Name</th>
                <th>Status</th>
				<th>Start Date</th>
				<th>Start Time</th>
				<th>End Date</th>
				<th>End Time</th>
				<th>Difference (Hours)</th>
				<th>Project Name</th>
				<th>Location</th>
                <th>Customer</th>
				<th>Remarks</th>
				<th>Approval Date</th>
				<th>Approval Remarks</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			@php
			if (isset($value->overtimeEntity->overtimeHourFrom) && isset($value->overtimeEntity->overtimeHourTo)) {
				$waktuAwal = strtotime($value->overtimeEntity->overtimeHourFrom);
				$waktuAkhir = strtotime($value->overtimeEntity->overtimeHourTo);
				$waktuSelisih = $waktuAkhir - $waktuAwal;
			}
			@endphp
			<tr>
                <td>{{ $no }}</td>
				<td>{{ isset($value->overtimeEntity->createdDate) ? \Carbon\Carbon::parse($value->overtimeEntity->createdDate)->format('Y-m-d') : ''}}</td>
				<td>{{ $no }}</td>
				<td>{{ isset($value->overtimeEntity->businessUnit) ? $value->overtimeEntity->businessUnitCode . " - " . $value->overtimeEntity->businessUnit : ''}}</td>
				<td>{{ isset($value->overtimeEntity->fullnameRequester) ? $value->overtimeEntity->fullnameRequester : ''}}</td>
				<td>{{ isset($value->overtimeEntity->status) ? $value->overtimeEntity->status : ''}}</td>
				<td>{{ isset($value->overtimeEntity->overtimeHourFrom) ? \Carbon\Carbon::parse($value->overtimeEntity->overtimeHourFrom)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->overtimeEntity->overtimeHourFrom) ? \Carbon\Carbon::parse($value->overtimeEntity->overtimeHourFrom)->format('H:i:s') : '' }}</td>
				<td>{{ isset($value->overtimeEntity->overtimeHourTo) ? \Carbon\Carbon::parse($value->overtimeEntity->overtimeHourTo)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->overtimeEntity->overtimeHourTo) ? \Carbon\Carbon::parse($value->overtimeEntity->overtimeHourTo)->format('H:i:s') : '' }}</td>
				<td>{{ isset($waktuSelisih) ? \Carbon\Carbon::parse($waktuSelisih)->format('H:i:s') : '' }}</td>
				<td>{{ isset($value->overtimeEntity->projectName) ? $value->overtimeEntity->projectName : '' }}</td>
				<td>{{ isset($value->overtimeEntity->locationCode) ? $value->overtimeEntity->locationCode : '' }}</td>
				<td>{{ isset($value->overtimeEntity->customerName) ? $value->overtimeEntity->customerName : '' }}</td>
				<td>{{ isset($value->overtimeEntity->overtimeRemarks) ? $value->overtimeEntity->overtimeRemarks : '' }}</td>
				<td>{{ isset($value->overtimeEntity->approvalDate) ? \Carbon\Carbon::parse($value->overtimeEntity->approvalDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->overtimeEntity->approvalRemarks) ? $value->overtimeEntity->approvalRemarks : '' }}</td>
			</tr>
			<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
</body>
</html>