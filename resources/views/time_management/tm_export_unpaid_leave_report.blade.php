<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_unpaid_leave_report.judul') }}</title>
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
				<th colspan="6" style="text-align: center; font-size: 16px; font-weight: bold;">Unpaid Leave Report</th>
			</tr>
			<tr>
				<th style="text-align: center; border: 1px solid black" rowspan="2">No</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Employee No</th>
				<th style="text-align: center; border: 1px solid black" rowspan="2">Employee Name</th>
				<th style="text-align: center; border: 1px solid black" colspan="2">Unpaid Leave Date</th>
                <th style="text-align: center; border: 1px solid black" rowspan="2">Description</th>
			</tr>
			<tr>
				<th style="text-align: center; border: 1px solid black">From</th>
				<th style="text-align: center; border: 1px solid black">To</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td style="text-align: center; border: 1px solid black">{{ $no++ }}</td>
				<td style="text-align: left; border: 1px solid black">{{ $value->employeeNo }}</td>
				<td style="text-align: left; border: 1px solid black">{{ $value->employeeName }}</td>
				<td style="text-align: left; border: 1px solid black">{{ date('Y-m-d', strtotime($value->dateFrom)) }}</td>
				<td style="text-align: left; border: 1px solid black">{{ date('Y-m-d', strtotime($value->dateTo)) }}</td>
                <td style="text-align: left; border: 1px solid black">{{ $value->description }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>