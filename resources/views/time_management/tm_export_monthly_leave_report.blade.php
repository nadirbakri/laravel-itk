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
				<th rowspan="2" style="text-align:center;">No</th>
				<th rowspan="2" style="text-align:center;">Employee No</th>
				<th rowspan="2" style="text-align:center;">Employee Name</th>
				@foreach($dataListAbsent as $value)
					<th colspan="4" style="text-align:center;">{{ $value->description }}</th>
				@endforeach
			</tr>
			<tr>
			@foreach($dataListAbsent as $value)
				<th style="text-align:center;">Prev. Year</th>
				<th style="text-align:center;">This Year</th>
				<th style="text-align:center;">Request</th>
				<th style="text-align:center;">Balance</th>
			@endforeach
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; 
			?>
			@foreach($data as $value)
			<tr>
                <td style="text-align:center;">{{ $no++ }}</td>
				<td style="text-align:center;">{{ $value->employeeNo }}</td>
				<td style="text-align:center;">{{ $value->fullName }}</td>
				@foreach($dataListAbsent as $value3)
					<?php $exist = false; ?>
					@foreach($value->leaveList as $value2)
						@if($value2->leaveCode == $value3->absentCode)
						<?php $exist = true; ?>
						<td style="text-align:center;">{{ $value2->prevYear }}</td>
						<td style="text-align:center;">{{ $value2->thisYear }}</td>
						<td style="text-align:center;">{{ $value2->request }}</td>
						<td style="text-align:center;">{{ $value2->balance }}</td>
						@endif
					@endforeach
					@if(!$exist)
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					@endif
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>