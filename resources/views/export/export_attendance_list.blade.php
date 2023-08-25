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
				<th>Employee No</th>
                <th>AbsenceType</th>
                <th>ShiftCode</th>
				<th>Date</th>
				<th>Duration</th>
				<th>CheckIn</th>
				<th>CheckOut</th>
				<th>AddressIn</th>
                <th>AddressOut</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
                <td>{{ $value->employeeNo}}</td>
                <td>{{ $value->absenceType}}</td>
                <td>{{ $value->shiftCode}}</td>
				<td>{{ \Carbon\Carbon::parse($value->date)->format('Y-m-d') }}</td>
				<td>{{ $value->duration }}</td>
				<td>{{ date('Y-m-d H:i:s', strtotime($value->checkInDate)) }}</td>
				<td>{{ date('Y-m-d H:i:s', strtotime($value->checkOutDate)) }}</td>
				<td>{{ $value->address }}</td>
				<td>{{ $value->addressOut }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>

