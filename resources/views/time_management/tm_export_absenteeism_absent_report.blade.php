<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_absenteeism_overtime_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
			text-align:"center";
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
				<th colspan="{{ count($data[0]->dynamicColumn) }}">Date</th>
                <th colspan="{{ count($data[0]->aggregateColumn) }}">Total</th>
			</tr>
			<tr>
				@foreach($data[0]->dynamicColumn as $value)
				<td>{{ $value->key }}</td>
				@endforeach
				@foreach($data[0]->aggregateColumn as $value)
				<td>{{ $value->key }}</td>
				@endforeach
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullname }}</td>
				@foreach($value->dynamicColumn as $value2)
				<td>{{ $value2->valueString }}</td>
				@endforeach
				@foreach($value->aggregateColumn as $value2)
				<td>{{ isset($value2->valueNum) ? $value2->valueNum : $value2->valueDec }}</td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>