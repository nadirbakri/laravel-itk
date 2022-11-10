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
				<th>Nama</th>
				<th>Employee Number</th>
				<th>Ticket Number</th>
				{{-- <th>Business Unit</th> --}}
				<th>Leave ID</th>
				<th>Leave Date</th>
                <th>Leave Duration</th>
                <th>Leave Time</th>
                <th>Status</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->leaveEntity->leaveName}}</td>
				<td>{{ $value->leaveEntity->employeeNo }}</td>
				<td>{{ $value->leaveEntity->ticketNo }}</td>
				<td>{{ $value->leaveEntity->leaveID }}</td>
				{{-- <td>{{\Carbon\Carbon::parse($value->leaveEntity->leaveDate)->format('Y-m-d')}}</td> --}}
				<td>{{ $value->leaveEntity->leaveDate }}</td>
				<td>{{ $value->leaveEntity->leaveDuration }}</td>
				<td>{{ $value->leaveEntity->leaveTime}}</td>
				<td>{{ $value->leaveEntity->status}}</td>
				{{-- <td>{{ $value->leaveEntity->permitHourTo}}</td>
				<td>{{ $value->leaveEntity->customerName}}</td> --}}
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>