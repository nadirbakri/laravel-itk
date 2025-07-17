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
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>

<body>
	@if (count($data) > 0)
		<table style="width: 100%; font-size: 14px; border-collapse: collapse; border: 1px solid black;" class="table table-bordered table-hover responsive">
			<thead>
				<?php 
					$totalColumn = (array) $data[0]->Total;
					$dateColumn = (array) $data[0]->Date;
					$mergeColumn = count($dateColumn) + count($totalColumn) + 3;
					$mergeColumnGrandTotal = count($dateColumn) + 3;
				?>
				<tr>
					<th colspan="{{ $mergeColumn }}" style="text-align: center; font-size: 16px; font-weight: bold;">Absenteeism Report</th>
				</tr>
				<tr>
					<th style="text-align: center; border: 1px solid black" rowspan="2">No</th>
					<th style="text-align: center; border: 1px solid black" rowspan="2">Employee No</th>
					<th style="text-align: center; border: 1px solid black" rowspan="2">Employee Name</th>
					<th style="text-align: center; border: 1px solid black" colspan="{{ count($dateColumn) }}">Date</th>
					<th style="text-align: center; border: 1px solid black" colspan="{{ count($totalColumn) }}">Total</th>
				</tr>
				<tr>
					@foreach (array_keys($dateColumn) as $dateKey)
						<th style="text-align: center; border: 1px solid black">{{ $dateKey }}</th>
					@endforeach
					@foreach(array_keys($totalColumn) as $totalKey)
						<th style="text-align: center; border: 1px solid black">{{ $totalKey }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1; 
					$total = [];
				?>
				@foreach($data as $key => $value)
					<tr>
						<td style="text-align: center; border: 1px solid black">{{ $no++ }}</td>
						<td style="text-align: left; border: 1px solid black">{{ $value->{'Employee No'} ?? '' }}</td>
						<td style="text-align: left; border: 1px solid black">{{ $value->{'Employee Name'} ?? '' }}</td>
						@foreach ((array) $value->{'Date'} as $val)
							<td style="text-align: left; border: 1px solid black">{{ $val ?? '' }}</td>
						@endforeach
						@foreach ((array) $value->{'Total'} as $key => $val)
							<?php 
								if (!isset($total[$key])) {
									$total[$key] = 0;
								}
								$total[$key] += (float) $val; 
							?>
							<td style="text-align: left; border: 1px solid black">{{ $val ?? '' }}</td>
						@endforeach
					</tr>
				@endforeach
				<tr>
					<td style="font-weight: bold; text-align: center; border: 1px solid black" colspan="{{ $mergeColumnGrandTotal }}">Grand Total</td>
					@foreach ($total as $grandTotal)
						<td style="font-weight: bold; text-align: right; border: 1px solid black">{{ number_format($grandTotal, 2) }}</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	@endif
</body>
</html>