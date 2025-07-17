<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_detail_absenteeism_report.judul') }}</title>
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
				<th colspan="13" style="text-align: center; font-size: 16px; font-weight: bold;">Detail Absenteeism Report</th>
			</tr>
			<tr>
				<th style="text-align: center; border: 1px solid black" rowspan="2">No</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Employee No</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Employee Name</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Absent Date</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Day</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Shift</th>
                <th style="text-align: center; border: 1px solid black" colspan="2">Normal</th>
                <th style="text-align: center; border: 1px solid black" colspan="3">Actual Time</th>
                <th style="text-align: center; border: 1px solid black" colspan="2">Absent</th>
			</tr>
			<tr>
				<td style="text-align: center; border: 1px solid black">In</td>
                <td style="text-align: center; border: 1px solid black">Out</td>
                <td style="text-align: center; border: 1px solid black">In</td>
                <td style="text-align: center; border: 1px solid black">Out</td>
                <td style="text-align: center; border: 1px solid black">Overtime</td>
                <td style="text-align: center; border: 1px solid black">Code</td>
                <td style="text-align: center; border: 1px solid black">Description</td>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1; 
				$totalSeconds = [
					'normalDateIn' => 0,
					'normalDateOut' => 0,
					'actualDateIn' => 0,
					'actualDateOut' => 0,
					'hourOvt' => 0
				];

				function timeToSeconds($time) {
					if (!$time || !is_string($time) || !str_contains($time, ':')) return 0;

					$isNegative = str_starts_with($time, '-');
					$time = ltrim($time, '-');

					list($h, $i) = explode(':', $time);

					if (!is_numeric($h) || !is_numeric($i)) return 0;

					$seconds = ((int)$h * 3600) + ((int)$i * 60);
					return $isNegative ? -$seconds : $seconds;
				}

				function secondsToTime($seconds) {
					$isNegative = $seconds < 0;
					$seconds = abs($seconds);

					$h = floor($seconds / 3600);
					$m = floor(($seconds % 3600) / 60);
					$s = floor($seconds % 60);
					return ($isNegative ? '-' : '') . sprintf('%02d:%02d:%02d', $h, $m, $s);
				}
			?>
			@foreach($data as $key => $value)
				<?php 
					$fields = ['normalDateIn', 'normalDateOut', 'actualDateIn', 'actualDateOut', 'hourOvt'];

					foreach ($fields as $field) {
						$timeStr = isset($value->$field) ? date('H:i', strtotime($value->$field)) : '00:00';
						$totalSeconds[$field] += timeToSeconds($timeStr);
					}
				?>
				<tr>
					<td style="text-align: center; border: 1px solid black">{{ $no++ }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->employeeNo ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->fullName ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->absentDate ? date('Y-m-d',strtotime($value->absentDate)) : '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->day ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->shiftCode ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->normalDateIn ? date('H:i',strtotime($value->normalDateIn)) : '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->normalDateOut ? date('H:i',strtotime($value->normalDateOut)) : '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->actualDateIn ? date('H:i',strtotime($value->actualDateIn)) : '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->actualDateOut ? date('H:i',strtotime($value->actualDateOut)) : '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->hourOvt ? date('H:i',strtotime($value->hourOvt)) : ''}}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->absentCode ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->description ?? '' }}</td>
				</tr>
			@endforeach
			{{-- <tr>
				<td style="font-weight: bold; text-align: center; border: 1px solid black" colspan="6">Grand Total</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ secondsToTime($totalSeconds['normalDateIn']) }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ secondsToTime($totalSeconds['normalDateOut']) }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ secondsToTime($totalSeconds['actualDateIn']) }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ secondsToTime($totalSeconds['actualDateOut']) }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ secondsToTime($totalSeconds['hourOvt']) }}</td>
				<td colspan="2" style="border: 1px solid black"></td>
			</tr> --}}
		</tbody>
	</table>
</body>
</html>