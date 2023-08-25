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
				<th>Employee Number</th>
				<th>Employee Name</th>
                <th>Permit Start Date</th>
                <th>Permit End Date</th>
                <th>Permit Start Hour</th>
                <th>Permit End Hour</th>
				<th>Status</th>
                <th>Customer Name</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->permitEntity->employeeNo }}</td>
				<td>{{ $value->permitEntity->fullnameRequester }}</td>
				<td>{{ date('Y-m-d', strtotime($value->permitEntity->permitDateFrom)) }}</td>
				<td>{{ date('Y-m-d', strtotime($value->permitEntity->permitDateTo)) }}</td>
				<td>{{ date('H:i', strtotime($value->permitEntity->permitHourFrom)) }}</td>
				<td>{{ date('H:i', strtotime($value->permitEntity->permitHourTo)) }}</td>
				<td>{{ $value->permitEntity->status}}</td>
				<td>{{ $value->permitEntity->customerName}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>