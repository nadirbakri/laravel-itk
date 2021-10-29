<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_list.judul') }}</title>
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
				<th>Employee Address</th>
                <th>City</th>
                <th>Phone No</th>
                <th>Zip Code</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>Religion</th>
                <th>Join Date</th>
                <th>Marital Status</th>
                <th>Dependent</th>
                <th>Ranking</th>
                <th>Position</th>
                <th>Location</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->employeeNo }}</td>
				<td>{{ $value->fullName }}</td>
				<td>{{ $value->homeAddress }}</td>
				<td>{{ $value->cityName }}</td>
                <td>{{ $value->homePhone }}</td>
                <td>{{ $value->homeZIpCode }}</td>
                <td>{{ $value->gender }}</td>
                <td>{{ $value->birthDate }}</td>
                <td>{{ $value->religion }}</td>
                <td>{{ $value->joinDate }}</td>
                <td>{{ $value->maritalStatus }}</td>
                <td>{{ $value->dependent }}</td>
                <td>{{ $value->ranking }}</td>
                <td>{{ $value->position }}</td>
                <td>{{ $value->location }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>