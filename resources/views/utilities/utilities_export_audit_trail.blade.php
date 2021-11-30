<!DOCTYPE html>
<html>
<head>
	<title>{{ __('utilities_audit_trail.judul') }}</title>
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
				<th>User ID</th>
				<th>User Name</th>
				<th>Activity Time</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $value)
			<tr>
				<td>{{ $value->logActionUserID }}</td>
				<td>{{ $value->logActionUsername }}</td>
				<td>{{ $value->logActionDate }}</td>
				<td>{{ $value->logActionDesc }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>