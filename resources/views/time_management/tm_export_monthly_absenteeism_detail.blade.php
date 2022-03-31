<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_monthly_absenteeism_detail.judul_export') }}</title>
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
				<th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">No</th>
				<th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">Employee No</th>
				<th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">Employee Name</th>
				<th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">Month</th>
                <th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">Total Working Days</th>
                <th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">Total Attendance</th>
                @if(!empty($data_detail))
				    <th colspan="{{ count($data_detail) }}">Attendance</th>
                @endif
                <th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">Until {{ date('h:i', strtotime($hourFrom)) }}</th>
                <th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">{{ date('h:i', strtotime($hourFrom)) }} To {{ date('h:i', strtotime($hourTo)) }}</th>
                <th rowspan="{{ (!empty($data_detail)) ? 2 : 1 }}">After {{ date('h:i', strtotime($hourTo)) }}</th>
			</tr>
            @if(!empty($data_detail))
			<tr>
                @foreach($data_detail as $value)
                    @if($changeHeader)
                        <th>{{ $value->headerName }}</th>
                    @else
                        <th>{{ $value->description }}</th>
                    @endif
                @endforeach
			</tr>
            @endif
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td rowspan="{{ count($value->workingData) }}">{{ $no++ }}</td>
				<td rowspan="{{ count($value->workingData) }}">{{ $value->employeeNo }}</td>
				<td rowspan="{{ count($value->workingData) }}">{{ $value->fullName }}</td>
				@foreach($value->workingData as $key2 => $value2)
					@if($key2 !== array_key_first($value->workingData))
					<tr>
					@endif
					<td>{{ $value2->month }}</td>
					<td>{{ $value2->totalWorkDays }}</td>
					<td>{{ $value2->totalAttendance }}</td>
					@if(!empty($data_detail))
						@foreach($data_detail as $value3)
							@foreach($value2->attendance as $value4)
								@if($value4->absentCode == $value3->absentCode)
									<td>{{ $value4->count }}</td>
								@endif
							@endforeach
						@endforeach
					@endif
					<td>{{ $value2->until }}</td>
					<td>{{ $value2->to }}</td>
					<td>{{ $value2->after }}</td>
					@if($key2 !== array_key_first($value->workingData))
					<tr>
					@endif
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>