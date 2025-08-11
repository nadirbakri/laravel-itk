<!DOCTYPE html>
<html>
<head>
	<title>Medical Checkup Master Info</title>
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
				<th style="font-weight: bold;">MCU Code *</th>
				<th style="font-weight: bold;">MCU Name *</th>
				<th style="font-weight: bold;">Batch Code *</th>
				<th style="font-weight: bold;">Number of Dose *</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1; 
			?>
			@foreach($data as $value)
				@if($value->detail)
					@foreach($value->detail as $detail)
						<tr>
							<td style="text-align: left;">{{ isset($value->activityCode) ? $value->activityCode : '' }}</td>
							<td style="text-align: left;">{{ isset($value->activityName) ? $value->activityName : '' }}</td>
							<td style="text-align: left;">{{ isset($detail->batchCode) ? $detail->batchCode : '' }}</td>
							<td style="text-align: left;">{{ isset($detail->sequence) ? $detail->sequence : '' }}</td>
						</tr>
					@endforeach
				@endif
				<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
</body>
</html>