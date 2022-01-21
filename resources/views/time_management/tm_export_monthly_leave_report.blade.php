<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_monthly_leave_report.judul') }}</title>
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
				<th rowspan="2">No</th>
				<th rowspan="2">Employee No</th>
				<th rowspan="2">Employee Name</th>
				@foreach($dataListAbsent as $value)
					<th colspan="4">{{ $value->description }}</th>
				@endforeach
			</tr>
			<tr>
			@foreach($dataListAbsent as $value)
				<th>Prev. Year</th>
				<th>This Year</th>
				<th>Request</th>
				<th>Balance</th>
			@endforeach
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; 
			?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
				@foreach($value->leaveList as $value2)
					@foreach($dataListAbsent as $value3)	
						@if($value2->leaveCode == $value3->absentCode)
						<td>{{ $value2->prevYear }}</td>
						<td>{{ $value2->thisYear }}</td>
						<td>{{ $value2->request }}</td>
						<td>{{ $value2->balance }}</td>
						@else
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						@endif
					@endforeach
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>