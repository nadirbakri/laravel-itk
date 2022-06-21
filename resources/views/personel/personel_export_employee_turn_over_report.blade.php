<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_turn_over_report.judul') }}</title>
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
				<td></td>	
				<td>Total Joined</td>
				<td>: {{ $data->totalJoin }} Person</td>
			</tr> 
			<tr>
				<td></td>
				<td>Total Resigned</td>
				<td>: {{ $data->totalResigned }} Person</td>
			</tr>
		</thead>
	</table>


	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<thead>
			<tr>
				<th>No</th>
				<th>Employee No</th>
				<th>Employee Name</th>
                <th>Position</th>
                <th>Ranking</th>
                <th>Location</th>
                <th>Join Date</th>
                <th>Terminate Date</th>
                
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data->reportContent as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
				<td>{{ $value->positionName }}</td>
				<td>{{ $value->rankingName }}</td>
                <td>{{ $value->locationName }}</td>
                <td>{{ date('Y-m-d', strtotime($value->joinDate)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->terminationDate)) }}</td>
                
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>