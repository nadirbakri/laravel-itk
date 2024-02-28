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
				<th>Ticket No</th>
                <th>Name</th>
				<th>Employee No</th>
				<th>Project Name</th>
				<th>Overtime Date</th>
                <th>Overtime Hour From</th>
                <th>Overtime Hour To</th>
				<th>Total Overtime Hour</th>
                <th>Overtime Remarks</th>
                <th>Project Name</th>
                <th>Customer Name</th>
                <th>Total Paid</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			@php
			$waktuAwal = strtotime($value->overtimeEntity->overtimeHourFrom);
			$waktuAkhir = strtotime($value->overtimeEntity->overtimeHourTo);
			$waktuSelisih = $waktuAkhir - $waktuAwal;
			@endphp
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->overtimeEntity->status}}</td>
				<td>{{ $value->overtimeEntity->ticketNo }}</td>
				<td>{{ $value->overtimeEntity->fullnameRequester }}</td>
				<td>{{ $value->overtimeEntity->employeeNo}}</td>
				<td>{{ $value->overtimeEntity->projectName}}</td>
				<td>{{ \Carbon\Carbon::parse($value->overtimeEntity->overtimeDate)->format('Y-m-d') }}</td>
				<td>{{ \Carbon\Carbon::parse($value->overtimeEntity->overtimeHourFrom)->format('H:i:s')}}</td>
				<td>{{ \Carbon\Carbon::parse($value->overtimeEntity->overtimeHourTo)->format('H:i:s')}}</td>
				<td>{{ \Carbon\Carbon::parse($waktuSelisih)->format('H:i:s')}}</td>
				<td>{{ $value->overtimeEntity->overtimeRemarks}}</td>
				<td>{{ $value->overtimeEntity->projectName}}</td>
				<td>{{ $value->overtimeEntity->customerName}}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>