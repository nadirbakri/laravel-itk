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
	<table style="width: 100%; font-size: 14px; border-collapse: collapse; border: 1px solid black;" class="table table-bordered table-hover responsive">
		<thead>
			<?php 
				$dateColumn = (array) $data[0]->Date;
				$mergeColumn = count($dateColumn) + 5;
			?>
			<tr>
				<th colspan="{{ $mergeColumn }}" style="text-align: center; font-size: 16px; font-weight: bold;">Overtime Report</th>
			</tr>
			<tr>
				<th style="text-align: center; border: 1px solid black" rowspan="2">No</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Employee No</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Employee Name</th>
				<th style="text-align: center; border: 1px solid black" colspan="{{ count($dateColumn) }}">Date</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Total Actual</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Total Convert</th>
			</tr>
			<tr>
				@foreach (array_keys($dateColumn) as $dateKey)
					<th style="text-align: center; border: 1px solid black">{{ $dateKey }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
            <?php 
				$no = 1; 
				$total = []; 
			?>
			@foreach($data as $value)
				<tr>
					<td style="text-align: center; border: 1px solid black">{{ $no++ }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->{'Employee No'} ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->{'Employee Name'} ?? '' }}</td>
					@foreach ((array) $value->{'Date'} as $val)
						<td style="text-align: left; border: 1px solid black">{{ $val ?? '' }}</td>
					@endforeach
					<td style="text-align: left; border: 1px solid black">{{ $value->{'Total Actual'} ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->{'Total Convert'} ?? '' }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>