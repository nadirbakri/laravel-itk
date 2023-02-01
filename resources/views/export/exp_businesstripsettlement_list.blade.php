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
				{{-- <th>Request Date</th> --}}
                <th>Status</th>
				<th>Ticket Number</th>
				<th>Employee Name</th>
				<th>Customer Name</th>
                <th>Claim Type</th>
                {{-- <th>SPPD Type</th> --}}
                <th>Destination</th>
                <th>Customer Name</th>
				<th>Project Name</th>
				<th>Currency</th>
				<th>Total Paid</th>
				<th>Total Request</th>
				{{-- <th>Total Per Employee</th>
				<th>No Rekening</th> --}}
				<th>Total Approve HRD</th>
				<th>Tujuan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($data as $value)
				@foreach($value->responseSettlement as $value2)
				<tr>
					{{-- @if($value->responseSettlement =! null) --}}
					<td>{{ $no++ }}</td>
					{{-- <td></td> --}}
					<td>{{ $value2->ticketNo }}</td>
					<td>{{ $value2->fullnameRequester }}</td>
					<td>{{ $value2->customerName }}</td>
					<td>{{ $value2->status }}</td>
					<td>{{ $value3->typeClaim }}</td>
					{{-- <td></td> --}}
					<td>{{ $value2->destination }}</td>
					<td>{{ $value2->customerName }}</td>
					<td>{{ $value2->projectName }}</td>
					<td>IDR</td>
					<td>{{ $value2->total }}</td>
					<td>{{ $value2->totalClaimAmount }}</td>
					{{-- <td></td>
					<td></td> --}}
					<td>{{ $value3->sequence }}</td>
					<td>{{ $value2->purpose }}</td>
					{{-- @else
					<td>{{ $value2->responseSettlement}}</td>
					@endif --}}
				</tr>
					@endforeach
				@endforeach
		</tbody>
	</table>
</body>
</html>