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
				<th>Nama</th>
				<th>Employee No</th>
				<th>receipt Date</th>
				<th>Type</th>
                <th>Project Name</th>
                <th>Start Location</th>
                <th>Ende Location</th>
                <th>customer Name</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->transportEntity->status}}</td>
				<td>{{ $value->transportEntity->userID }}</td>
				<td>{{ $value->transportEntity->employeeNo }}</td>
				<td>{{ \Carbon\Carbon::parse($value->transportEntity->receiptDate)->format('Y-m-d') }}</td>
				<td>{{ $value->transportEntity->businessUnit }}</td>
				<td>{{ $value->transportEntity->type }}</td>
				<td>{{ $value->transportEntity->projectName}}</td>
				<td>{{ $value->transportEntity->startLocation}}</td>
				<td>{{ $value->transportEntity->endLocation}}</td>
				<td>{{ $value->transportEntity->customerName}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>