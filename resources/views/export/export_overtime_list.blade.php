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
                <th>Name</th>
				<th>Ticket No</th>
				<th>Employee No</th>
				{{-- <th>Business Unit</th> --}}
				<th>Project Name</th>
				<th>Overtime Date</th>
                <th>Overtime Hour From</th>
                <th>Overtime Hour To</th>
                <th>Overtime Remarks</th>
                <th>Status</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->overtimeEntity->fullnameRequester }}</td>
				<td>{{ $value->overtimeEntity->ticketNo }}</td>
				{{-- <td>{{ $value->overtimeEntity->businessUnit }}</td> --}}
				<td>{{ $value->overtimeEntity->employeeNo}}</td>
				<td>{{ $value->overtimeEntity->projectName}}</td>
				{{-- <td>{{ $value->overtimeEntity->overtimeDate }}</td> --}}
				<td>{{ \Carbon\Carbon::parse($value->overtimeEntity->overtimeDate)->format('Y-m-d') }}</td>
				<td>{{ \Carbon\Carbon::parse($value->overtimeEntity->overtimeHourFrom)->format('Y-m-d')}}</td>
				<td>{{ \Carbon\Carbon::parse($value->overtimeEntity->overtimeHourTo)->format('Y-m-d')}}</td>
				<td>{{ $value->overtimeEntity->overtimeRemarks}}</td>
				<td>{{ $value->overtimeEntity->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>