<!DOCTYPE html>
<html>
<head>
	<title>{{ "Plafon ${fileName}" }}</title>
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
				{{-- <th>No</th> --}}
				<th>Plafon Year *</th>
				{{-- <th>Plafon Type *</th> --}}
				<th>Plafon Code *</th>
				<th>Plafon Status *</th>
				<th>Nominal *</th>
				<th>Ranking Code *</th>
				@if ($type === 'BUSINESSTRIP')
					<th>Is Duty (Kedinasan / Non Kedinasan) * </th>
				@endif
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1; 
			?>
			@foreach($data as $value)
				<tr>
					{{-- <td style="text-align: center;">{{ $no }}</td> --}}
					<td style="text-align: left;">{{ isset($value->plafonYear) ? $value->plafonYear : '' }}</td>
					{{-- <td>{{ isset($value->category) ? $value->category : '' }}</td> --}}
					<td style="text-align: left;">{{ isset($value->plafonCode) ? $value->plafonCode : '' }}</td>
					<td style="text-align: left;">{{ isset($value->status) ? $value->status : '' }}</td>
					<td style="text-align: left;">{{ isset($value->plafonAmount) ? number_format($value->plafonAmount, 0, '.', ',') : '' }}</td>
					<td style="text-align: left;">{{ isset($value->rankCode) ? $value->rankCode : '' }}</td>
					@if ($type === 'BUSINESSTRIP')
						@if ($value->isDuty)
							<td style="text-align: left;">Kedinasan</td>
						@else 
							<td style="text-align: left;">Non Kedinasan</td>
						@endif
					@endif
				</tr>
				<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
</body>
</html>