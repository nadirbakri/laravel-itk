<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_custom_report_employee.judul') }}</title>
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
	<table style="width: 100%; font-size: 14px;">
		<thead>
			<tr>
				<th>No</th>
				@foreach($data[0] as $key => $value)
					<th>{{ $key }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach($data as $index => $value)
			<tr>
				<td>{{ $index + 1 }}</td>
				@foreach($value as $item)
					<td style="text-align: left;">{{ $item }}</td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>