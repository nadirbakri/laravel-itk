<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_monthly_absenteeism_analysis.judul_export') }}</title>
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
	<table style="width: 100%; font-size: 14px;" >
		<thead>
			<tr>
				<th colspan="28" style="text-align: center; font-size: 16px; font-weight: bold;">Monthly Absenteeism Analysis Report</th>
			</tr>
			<tr>
				<th colspan="28" style="text-align: center; font-size: 16px; font-weight: bold;">{{ date('F Y', strtotime($period)) }}</th>
			</tr>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Employee No</th>
				<th rowspan="2">Employee Name</th>
				<th colspan="2">Normal</th>
				<th colspan="2">Actual</th>
				<th colspan="4">Variance Actual With Normal</th>
				<th colspan="5">Overtime</th>
				<th colspan="2">Absent</th>
				<th colspan="2">Others</th>
				<th colspan="2">Leave Permit</th>
				<th colspan="2">Total Absent</th>
				<th colspan="4">Effective Working</th>
			</tr>
			<tr>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
				<th>Convert</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1; 
				$totals = [
					'normal_days' => 0,
					'normal_hours' => 0,
					'actual_days' => 0,
					'actual_hours' => 0,
					'variance_days' => 0,
					'variance_days_percentage' => 0,
					'variance_hours' => 0,
					'variance_hours_percentage' => 0,
					'overtime_days' => 0,
					'overtime_days_percentage' => 0,
					'overtime_hours' => 0,
					'overtime_hours_percentage' => 0,
					'overtime_convert' => 0,
					'absent_days' => 0,
					'absent_hours' => 0,
					'others_days' => 0,
					'others_hours' => 0,
					'leave_permit_days' => 0,
					'leave_permit_hours' => 0,
					'total_absent_days' => 0,
					'total_absent_hours' => 0,
					'effective_days' => 0,
					'effective_days_percentage' => 0,
					'effective_hours' => 0,
					'effective_hours_percentage' => 0
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
				$totals['normal_days'] += $value->normal->days;
				$totals['normal_hours'] += timeToSeconds($value->normal->hours);
				$totals['actual_days'] += $value->actual->days;
				$totals['actual_hours'] += timeToSeconds($value->actual->hours);
				$totals['variance_days'] += $value->varianceActualWithNormal->days;
				$totals['variance_days_percentage'] += $value->varianceActualWithNormal->daysPercentage;
				$totals['variance_hours'] += timeToSeconds($value->varianceActualWithNormal->hours);
				$totals['variance_hours_percentage'] += $value->varianceActualWithNormal->hoursPercentage;
				$totals['overtime_days'] += $value->overtime->days;
				$totals['overtime_days_percentage'] += $value->overtime->daysPercentage;
				$totals['overtime_hours'] += timeToSeconds($value->overtime->hours);
				$totals['overtime_hours_percentage'] += $value->overtime->hoursPercentage;
				$totals['overtime_convert'] += $value->overtime->convert;
				$totals['absent_days'] += $value->absent->days;
				$totals['absent_hours'] += timeToSeconds($value->absent->hours);
				$totals['others_days'] += $value->others->days;
				$totals['others_hours'] += timeToSeconds($value->others->hours);
				$totals['leave_permit_days'] += $value->leavePermit->days;
				$totals['leave_permit_hours'] += timeToSeconds($value->leavePermit->hours);
				$totals['total_absent_days'] += $value->totalAbsent->days;
				$totals['total_absent_hours'] += timeToSeconds($value->totalAbsent->hours);
				$totals['effective_days'] += $value->effectiveHours->days;
				$totals['effective_days_percentage'] += $value->effectiveHours->daysPercentage;
				$totals['effective_hours'] += timeToSeconds($value->effectiveHours->hours);
				$totals['effective_hours_percentage'] += $value->effectiveHours->hoursPercentage;

				// $total_normal_hours_seconds += timeToSeconds($value->normal->hours);
			?>
			<tr>
                <td>{{ $no++ }}</td>
				<td style="text-align: left;">{{ $value->employeeNo }}</td>
				<td>{{ $value->employeeName }}</td>
				<td>{{ $value->normal->days }}</td>
				<td>{{ $value->normal->hours }}</td>
              	<td>{{ $value->actual->days }}</td>
				<td>{{ $value->actual->hours }}</td>
				<td>{{ $value->varianceActualWithNormal->days }}</td>
				<td>{{ $value->varianceActualWithNormal->daysPercentage }}</td>
				<td>{{ $value->varianceActualWithNormal->hours }}</td>
				<td>{{ $value->varianceActualWithNormal->hoursPercentage }}</td>
				<td>{{ $value->overtime->days }}</td>
				<td>{{ $value->overtime->daysPercentage }}</td>
				<td>{{ $value->overtime->hours }}</td>
				<td>{{ $value->overtime->hoursPercentage }}</td>
				<td>{{ $value->overtime->convert }}</td>
				<td>{{ $value->absent->days }}</td>
				<td>{{ $value->absent->hours }}</td>
				<td>{{ $value->others->days }}</td>
				<td>{{ $value->others->hours }}</td>
				<td>{{ $value->leavePermit->days }}</td>
				<td>{{ $value->leavePermit->hours }}</td>
				<td>{{ $value->totalAbsent->days }}</td>
				<td>{{ $value->totalAbsent->hours }}</td>
				<td>{{ $value->effectiveHours->days }}</td>
				<td>{{ $value->effectiveHours->daysPercentage }}</td>
				<td>{{ $value->effectiveHours->hours }}</td>			
				<td>{{ $value->effectiveHours->hoursPercentage }}</td>
			</tr>
			@endforeach
			<tr style="font-weight: bold;">
				<td colspan="3" style="font-weight: bold; text-align: center;">Grand Total</td>
				<td style="font-weight: bold;">{{ $totals['normal_days'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['normal_hours']) }}</td>
				<td style="font-weight: bold;">{{ $totals['actual_days'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['actual_hours']) }}</td>
				<td style="font-weight: bold;">{{ $totals['variance_days'] }}</td>
				<td style="font-weight: bold;">{{ $totals['variance_days_percentage'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['variance_hours']) }}</td>
				<td style="font-weight: bold;">{{ $totals['variance_hours_percentage'] }}</td>
				<td style="font-weight: bold;">{{ $totals['overtime_days'] }}</td>
				<td style="font-weight: bold;">{{ $totals['overtime_days_percentage'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['overtime_hours']) }}</td>
				<td style="font-weight: bold;">{{ $totals['overtime_hours_percentage'] }}</td>
				<td style="font-weight: bold;">{{ $totals['overtime_convert'] }}</td>
				<td style="font-weight: bold;">{{ $totals['absent_days'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['absent_hours']) }}</td>
				<td style="font-weight: bold;">{{ $totals['others_days'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['others_hours']) }}</td>
				<td style="font-weight: bold;">{{ $totals['leave_permit_days'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['leave_permit_hours']) }}</td>
				<td style="font-weight: bold;">{{ $totals['total_absent_days'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['total_absent_hours']) }}</td>
				<td style="font-weight: bold;">{{ $totals['effective_days'] }}</td>
				<td style="font-weight: bold;">{{ $totals['effective_days_percentage'] }}</td>
				<td style="font-weight: bold;">{{ secondsToTime($totals['effective_hours']) }}</td>			
				<td style="font-weight: bold;">{{ $totals['effective_hours_percentage'] }}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>