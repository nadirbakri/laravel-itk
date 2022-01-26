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
				<th>Employee No</th>
				<th>Employee Name</th>
				@foreach($data[0]->fieldName as $value)
					<th>{{ $value->columnHeader }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
				@foreach($value->fieldName as $value2)
					<td>{{ $value2->fieldName }}</td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>