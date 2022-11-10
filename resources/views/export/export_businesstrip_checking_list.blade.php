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
				<th>Direct Superior</th>
				<th>Checkin Date</th>
				<th>Checkout Date</th>
				<th>Checkin Hour</th>
				<th>Checkout Hour</th>
				<!-- {{-- <th>Business Unit</th> --}} -->
				<th>Customer Name</th>
                <th>Project Name</th>
			</tr>
		</thead>
		<tbody>
            <?php $no =1; ?>
            @foreach($data as $value)
            <tr>
                <td>{{ $no++}}</td>
				<td>{{ $value->employeeNo}}</td>
				<td>{{ $value->directSuperiorID}}</td>
				<td>{{ \Carbon\Carbon::parse($value->checkInDate)->format('Y-m-d')}}</td>
				<td>{{ \Carbon\Carbon::parse($value->checkOutDate)->format('Y-m-d')}}</td>
				<td>{{ $value->checkInHour}}</td>
				<td>{{ $value->checkOutHour}}</td>
				<td>{{ $value->customerName}}</td>
				<td>{{ $value->projectName}}</td>
            </tr>
            @endforeach
		</tbody>
	</table>
</body>
</html>