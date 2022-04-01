<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_dependents.judul') }}</title>
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
				<th>No</th>
				<th>Employee No</th>
				<th>Employee Name</th>
				<th>Family Name</th>
                <th>Relation</th>
                <th>Birth Date</th>
                <th>Birth Place</th>
                <th>Gender</th>
                <th>Blood Type</th>
                <th>Family Card</th>
                <th>Occu</th>
                <th>Medical</th>
                <th>Payroll</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			@foreach($data as $value)
			<tr>
                <td rowspan="{{ count($value->family) }}">{{ $no++ }}</td>
				<td rowspan="{{ count($value->family) }}">{{ $value->employeeNo }}</td>
				<td rowspan="{{ count($value->family) }}">{{ $value->fullName }}</td>
                @foreach($value->family as $key2 => $value2)
					@if($key2 !== array_key_first($value->family))
					<tr>
					@endif
                    <td>{{ $value2->familyName }}</td>
                    <td>{{ $value2->relation }}</td>
                    <td>{{ date('Y-m-d', strtotime($value2->birthDate)) }}</td>
                    <td>{{ $value2->birthPlace }}</td>
                    <td>{{ $value2->gender }}</td>
                    <td>{{ $value2->bloodType }}</td>
                    <td>{{ $value2->familyCardNumber }}</td>
                    <td>{{ $value2->occupation }}</td>
                    <td>{{ ($value2->medical) ? "Yes" : "No" }}</td>
                    <td>{{ ($value2->payroll) ? "Yes" : "No" }}</td>
                @endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>