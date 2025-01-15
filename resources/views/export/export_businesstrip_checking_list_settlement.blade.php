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
	<table style="width: 100%; font-size: 12px;" class="table table-bordered table-hover responsive">
		<thead>
			<tr>
				<th>No</th>
				<th>Request Date</th>
				<th>Trip Number</th>
				<th>Ticket Number</th>
				<th>Business Unit</th>
				<th>Employee Name</th>
				<th>Status</th>
				<th>Claim Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Destination</th>
                <th>Company Customer</th>
                <th>Project Name</th>
                <th>Total Request (Rp)</th>
                <th>Total Settlement (Rp)</th>
                <th>Difference (Rp)</th>
				@if($companyCode == 'CBI')
				<th>Employee No</th>
				@endif
			</tr>
		</thead>
		<tbody>
            <?php
				$totalRequest = 0;	
				$totalSettlement = 0;
				$totalDifference = 0;
			?>
            @foreach($data as $key => $value)
				<?php
					$totalRequest += $value->totalRequest;
					$totalSettlement += $value->totalClaimAmount;
					$totalDifference += $value->totalDifferentAmount;
				?>
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ \Carbon\Carbon::parse($value->createdDate)->format('Y-m-d') }}</td>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->ticketNo }}</td>
					<td>{{ $value->businessUnit }}</td>
					<td>{{ $value->fullName }}</td>
					<td>{{ $value->status }}</td>
					<td>Perjalanan Dinas Penyelesaian</td>
					<td>{{ \Carbon\Carbon::parse($value->startDate)->format('Y-m-d') }}</td>
					<td>{{ \Carbon\Carbon::parse($value->endDate)->format('Y-m-d') }}</td>
					<td>{{ $value->destination }}</td>
					<td>{{ $value->customerName }}</td>
					<td>{{ $value->projectName }}</td>
					<td data-format="#,##0">{{ $value->totalRequest}}</td>
					<td data-format="#,##0">{{ $value->totalClaimAmount }}</td>
					<td data-format="#,##0">{{ $value->totalDifferentAmount }}</td>
					@if($companyCode == 'CBI')
					<td>{{ $value->employeeNo }}</td>
					@endif
				</tr>
            @endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="13" style="text-align: right; font-weight: bold;">TOTAL</td>
				<td data-format="#,##0">{{ $totalRequest }}</td>
				<td data-format="#,##0">{{ $totalSettlement  }}</td>
				<td data-format="#,##0">{{ $totalDifference }}</td>
				@if($companyCode == 'CBI')
				<td></td>
				@endif
			</tr>
		</tfoot>
	</table>
</body>
</html>