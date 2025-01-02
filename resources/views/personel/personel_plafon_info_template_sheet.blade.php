<!DOCTYPE html>
<html>
<head>
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
	@if(!empty($data))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<thead>
			<tr>
				<th style="font-weight: bold">Plafon Code</th>
				<th style="font-weight: bold">Plafon Description</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $value)
			<tr>
				<td>{{ $value->code }}</td>
				<td>{{ $value->value }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	@if(!empty($data_ranking))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<thead>
			<tr>
				<th style="font-weight: bold">Ranking Code</th>
				<th style="font-weight: bold">Ranking Name</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data_ranking as $value)
			<tr>
				<td>{{ $value->rankingCode }}</td>
				<td>{{ $value->rankingName }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	@if(!empty($data_status))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<thead>
			<tr>
				<th style="font-weight: bold">Plafon Status Code</th>
				<th style="font-weight: bold">Plafon Status Description</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data_status as $value)
			<tr>
				<td>{{ $value->code }}</td>
				<td>{{ $value->value }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</body>
</html>