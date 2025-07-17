<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_detail_rate_overtime_report.judul') }}</title>
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
				<th colspan="15" style="text-align: center; font-size: 16px; font-weight: bold;">Detail Rate Absenteeism Report</th>
			</tr>
			<tr>
                <th style="text-align: center; border: 1px solid black" rowspan="2">No</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Employee No</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Employee Name</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Absent Date</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Day</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Status Day</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Total Hours Ovt</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Total Normal Hour</th>
                <th style="text-align: center; border: 1px solid black" colspan="4">Overtime</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Total Ovt Index</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Rate Hour</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Overtime Rate</th>
			</tr>
            <tr>
                <th style="text-align: center; border: 1px solid black">x1.5</th>
                <th style="text-align: center; border: 1px solid black">x2.0</th>
                <th style="text-align: center; border: 1px solid black">x3.0</th>
                <th style="text-align: center; border: 1px solid black">x4.0</th>
            </tr>
		</thead>
		<tbody>
            <?php $no = 1; 
				$total = [
					'hourOvt' => 0,
					'totalNormalHour' => 0,
					'ovtx1' => 0,
					'ovtx2' => 0,
					'ovtx3' => 0,
					'ovtx4' => 0,
					'hourOvtCvt' => 0,
					'rateHour' => 0,
					'overtimeRate' => 0,
				];

				function timeToSeconds($time) {
					if (!$time || !is_string($time) || !str_contains($time, ':')) return 0;

					$isNegative = str_starts_with($time, '-');
					$time = ltrim($time, '-');

					list($h, $i, $s) = explode(':', $time);

					if (!is_numeric($h) || !is_numeric($i) || !is_numeric($s)) return 0;

					$seconds = ((int)$h * 3600) + ((int)$i * 60) + (int)$s;
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
			@foreach($data as $value)
				<?php
					$total['hourOvt'] += timeToSeconds($value->hourOvt ? date('H:i:s', strtotime($value->hourOvt)) : '00:00:00');
            		$total['totalNormalHour'] += timeToSeconds($value->totalNormalHour ? date('H:i:s', strtotime($value->totalNormalHour)) : '00:00:00');
					$total['ovtx1'] += $value->overtime->xfactor1;
					$total['ovtx2'] += $value->overtime->xfactor2;
					$total['ovtx3'] += $value->overtime->xfactor3;
					$total['ovtx4'] += $value->overtime->xfactor4;
					$total['hourOvtCvt'] += $value->hourOvtCvt;
					$total['rateHour'] += $value->rateHour;
					$total['overtimeRate'] += $value->overtimeRate;
				?>
				<tr>
					<td style="text-align: center; border: 1px solid black">{{ $no++ }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->employeeNo ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->employeeName ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->absentDate ? date('Y-m-d',strtotime($value->absentDate)) : '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->day ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->dayDescription ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->hourOvt ? date('H:i:s',strtotime($value->hourOvt)) : '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->totalNormalHour ? date('H:i:s',strtotime($value->totalNormalHour)) : '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->overtime->xfactor1 ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->overtime->xfactor2 ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->overtime->xfactor3 ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->overtime->xfactor4 ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->hourOvtCvt ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->rateHour ?? '' }}</td>
					<td style="text-align: left; border: 1px solid black">{{ $value->overtimeRate ?? '' }}</td>
				</tr>
			@endforeach
			<tr>
				<td style="font-weight: bold; text-align: center; border: 1px solid black" colspan="6">Grand Total</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ secondsToTime($total['hourOvt']) }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ secondsToTime($total['totalNormalHour']) }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ $total['ovtx1'] }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ $total['ovtx2'] }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ $total['ovtx3'] }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ $total['ovtx4'] }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ $total['hourOvtCvt'] }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ $total['rateHour'] }}</td>
				<td style="text-align: left; font-weight: bold; border: 1px solid black">{{ $total['overtimeRate'] }}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>