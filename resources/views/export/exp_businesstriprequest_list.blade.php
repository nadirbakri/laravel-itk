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
				<th>Request Date</th>
				<th>Trip Number</th>
				<th>Ticket Number</th>
				<th>Employee Name</th>
				<th>Status</th>
				<th>Claim Type</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Destination</th>
                <th>Company Customer</th>
				<th>Project Name</th>
				<th>Total Request (Rp)</th>
                <th>Total Per Employee (Rp)</th>
				<th>No Rekening</th>
				<th>Total Approve HRD (Rp)</th>
				<th>Total Paid (Rp)</th>
				<th>Paid Remarks</th>
				<th>Alamat Email</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($data as $value)
				<tr>
					<td>{{ $no }}</td>
					<td>{{ isset($value->requestDate) ? date('Y-m-d', strtotime($value->requestDate)) : '' }}</td>
					<td>{{ $no }}</td>
					<td>{{ isset($value->ticketNo) ? $value->ticketNo : '' }}</td>
					<td>{{ isset($value->fullName) ? $value->fullName : '' }}</td>
					<td>{{ isset($value->status) ? $value->status : '' }}</td>
					<td>{{ isset($value->claimType) ? $value->claimType : '' }}</td>
					<td>{{ isset($value->startDate) ? date('Y-m-d', strtotime($value->startDate)) : '' }}</td>
					<td>{{ isset($value->endDate) ? date('Y-m-d', strtotime($value->endDate)) : '' }}</td>
					<td>{{ isset($value->destination) ? $value->destination : '' }}</td>
					<td>{{ isset($value->customerName) ? $value->customerName : '' }}</td>
					<td>{{ isset($value->projectName) ? $value->projectName : '' }}</td>
					<td data-format="#,##0">{{ isset($value->totalRequest) ? $value->totalRequest : '' }}</td>
					<td data-format="#,##0">{{ isset($value->totalPerEmployee) ? $value->totalPerEmployee : '' }}</td>
					<td data-format="@">{{ isset($value->noRekening) ? $value->noRekening : '' }}</td>
					<td data-format="#,##0"></td>
					<td data-format="#,##0">{{ isset($value->totalPaid) ? $value->totalPaid : '' }}</td>
					<td>{{ isset($value->paidRemarks) ? $value->paidRemarks : '' }}</td>
					<td>{{ isset($value->email) ? $value->email : '' }}</td>
				</tr>
				<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
	<div>
	</div>
</body>
</html>