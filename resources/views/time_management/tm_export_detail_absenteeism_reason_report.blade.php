<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_detail_absenteeism_reason_report.judul_short') }}</title>
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
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>

<body>
    @if(count($data) > 0)
		<table style="width: 100%; font-size: 14px;">
			<tr>
				<td style="font-weight: bold;">{{ $data[0]->companyName }}</td>
			</tr>
			<tr>
				<td colspan='8' style="font-weight: bold; text-align: center">DETAIL ABSENTEEISM REASON REPORT</td>
			</tr>
		</table>
		<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive table_detail">
			<thead>
				<tr>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Seq</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Employee No</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Full Name</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Absent Date</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Absent Type</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Absent Name</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Day</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Hour</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@foreach($data as $value)
					@foreach ($value->listAbsentCode as $list)
						@if (count($list->absenteeismDetail) > 0)
							<?php 
								$rowspan = count($list->absenteeismDetail); 
								$totalDays = 0;
								$totalHours = 0;
								$totalMinutes = 0;
							?>
							@foreach ($list->absenteeismDetail as $index => $listDetail)
								<?php 
									$totalDays += $listDetail->day;

									list($hours, $minutes) = explode(':', $listDetail->hour);
									$totalHours += (int)$hours;
									$totalMinutes += (int)$minutes;
								?>
								<tr>
									<td style="text-align: center; vertical-align: middle; border:1px solid #000">{{ $no++ }}</td>
									<td style="text-align: center; vertical-align: middle; border:1px solid #000">{{ $value->employeeNo }}</td>
									<td style="text-align: center; vertical-align: middle; border:1px solid #000">{{ $value->fullName }}</td>
									<td style="text-align: center; border:1px solid #000">{{ date('Y-m-d',strtotime($listDetail->absentDate)) }}</td>
									<td style="text-align: center; border:1px solid #000">{{ $list->absentCode }}</td>
									<td style="text-align: center; border:1px solid #000">{{ $listDetail->description }}</td>
									<td style="text-align: right; border:1px solid #000">{{ $listDetail->day }}</td>
									<td style="text-align: right; border:1px solid #000">{{ $listDetail->hour }}</td>
								</tr>
							@endforeach

							<?php
								$totalHours += floor($totalMinutes / 60);
								$totalMinutes = $totalMinutes % 60;

								$formattedTotalHours = sprintf('%02d:%02d', $totalHours, $totalMinutes);
							?>
							<tr>
								<td colspan="6" style="text-align: right; font-weight: bold; border:1px solid #000">Total</td>
								<td style="text-align: right; font-weight: bold; border:1px solid #000">{{ $totalDays }}</td>
								<td style="text-align: right; font-weight: bold; border:1px solid #000">{{ $formattedTotalHours }}</td>
							</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>
	@endif
</body>
</html>