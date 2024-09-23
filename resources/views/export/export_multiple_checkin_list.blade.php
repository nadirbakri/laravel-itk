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
                <th>User ID</th>
				<th>Employee No</th>
				<th>Full Name</th>
				<th>Date</th>
				<th>Time</th>
				<th>Type</th>
                <th>Latitude</th>
                <th>Longitude</th>
				<th>Customer</th>
				<th>Address</th>
                <th>Remarks</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
                <td>{{ $value->userID }}</td>
                <td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullname }}</td>
				<td>
					@if($value->type == 'CHECK_IN')
					{{ $value->checkInDate ? date('Y-m-d', strtotime($value->checkInDate)) : '' }}
					@else
					{{ $value->checkOutDate ? date('Y-m-d', strtotime($value->checkOutDate)) : '' }}
					@endif
				</td>
				<td>{{ $value->checkInHour ? date('H:i:s', strtotime($value->checkInHour)) : '' }}</td>
                <td>{{ $value->type }}</td>
                <td>{{ $value->latitude }}</td>
                <td>{{ $value->longitude }}</td>
				<td>{{ $value->customerName }}</td>
				<td>{{ $value->address }}</td>
				<td>{{ $value->remarks }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>

