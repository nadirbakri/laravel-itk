<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_overtime_report.judul') }}</title>
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
				<th>Employee Name</th>
				<th>Basic Hours</th>
                <th>Premium Hours</th>
				<th>X.1</th>
				<th>X.2</th>
                <th>X.3</th>
				<th>X.4</th>
				<th>Total Hours</th>
                <th>Rate Overtime</th>
                <th>Basic Rate</th>
                <th>Premium Rate</th>
                <th>Total Overtime</th>
                <th>Level 2 Code</th>
                <th>Level 3 Code</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td style="text-align: left;">{{ $no++ }}</td>
				<td style="text-align: left;">{{ $value->nik ?? '' }}</td>
				<td style="text-align: left;">{{ $value->nama ?? '' }}</td>
				<td style="text-align: left;">{{ $value->basicHours ?? '' }}</td>
				<td style="text-align: left;">{{ $value->premiumHours ?? '' }}</td>
                <td style="text-align: left;">{{ $value->x1_5 ?? '' }}</td>
                <td style="text-align: left;">{{ $value->x2 ?? '' }}</td>
                <td style="text-align: left;">{{ $value->x3 ?? '' }}</td>
				<td style="text-align: left;">{{ $value->x4 ?? '' }}</td>
				<td style="text-align: left;">{{ $value->totalHours ?? '' }}</td>
                <td style="text-align: left;">{{ $value->rateOvertime ?? '' }}</td>
                <td style="text-align: left;">{{ $value->basicRate ?? '' }}</td>
                <td style="text-align: left;">{{ $value->premiumRate ?? '' }}</td>
                <td style="text-align: left;">{{ $value->totalOvertime ?? '' }}</td>
                <td style="text-align: left;">{{ $value->level2Code ?? '' }}</td>
                <td style="text-align: left;">{{ $value->level3Code ?? '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>