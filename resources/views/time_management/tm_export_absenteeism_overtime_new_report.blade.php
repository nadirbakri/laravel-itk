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
				$totalTimeSeconds = [];
				$totalInt = [];

				function timeToSeconds($time) {
					[$h, $m] = explode(':', $time);
					return ((int)$h * 3600) + ((int)$m * 60);
				}

				function secondsToTime($seconds) {
					$h = floor($seconds / 3600);
					$m = floor(($seconds % 3600) / 60);
					return sprintf('%02d:%02d', $h, $m);
				}
			?>
			@foreach($data as $value)
				<tr>
					<td style="text-align: center; border: 1px solid black">{{ $no++ }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->{'Employee No'} ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->{'Employee Name'} ?? '' }}</td>
					@foreach ((array) $value->{'Date'} as $key => $val)
						<?php
							if (empty($val) || strpos($val, '|') === false) {
								$timePart = "00:00";
								$intPart = "0";
							} else {
								$parts = explode('|', $val . '|');
								$timePart = trim($parts[0] ?? '00:00');
								$intPart = trim($parts[1] ?? '0');
							}

							$seconds = timeToSeconds($timePart);
							$intVal = is_numeric($intPart) ? (float) $intPart : 0;

							$totalTimeSeconds[$key] = ($totalTimeSeconds[$key] ?? 0) + $seconds;
							$totalInt[$key] = ($totalInt[$key] ?? 0) + $intVal;
						?>
						<td style="text-align: left; border: 1px solid black">{{ $val ?? '' }}</td>
					@endforeach
					<td style="text-align: left; border: 1px solid black">{{ $value->{'Total Actual'} ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->{'Total Convert'} ?? '' }}</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="3" style="text-align: center; border: 1px solid black; font-weight: bold">Grand Total</td>

				@foreach ($totalTimeSeconds as $key => $totalSec)
					<?php
						$timeStr = secondsToTime($totalSec);
						$intStr = number_format($totalInt[$key], 3);
					?>
					<td style="text-align: left; border: 1px solid black; font-weight: bold">{{ $timeStr }} | {{ $intStr }}</td>
				@endforeach

				<td style="text-align: left; border: 1px solid black; font-weight: bold">
					{{ array_sum(array_column($data, 'Total Actual')) }} jam
				</td>
				<td style="text-align: left; border: 1px solid black; font-weight: bold">
					{{ array_sum(array_column($data, 'Total Convert')) }}
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>