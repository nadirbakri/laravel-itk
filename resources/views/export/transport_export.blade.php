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
				<th>Status</th>
				<th>Ticket Number</th>
				<th>Claim Type</th>
				<th>Employee Name</th>
				<th>Receipt Date</th>
                <th>Company Customer</th>
				<th>Remarks</th>
				<th>Initial Location</th>
				<th>Destination</th>
				<th>Total Request (Rp)</th>
				<th>No Rekening</th>
				<th>Total Approve HRD (Rp)</th>
				<th>Total Paid (Rp)</th>
				<th>Paid Remarks</th>
				<th>Parking / Toll</th>
				<th>Amount Destination (Rp)</th>
				<th>Approval Date</th>
                <th>Alamat Email</th>
				<th>Division</th>
				<th>Cost Center</th>
				@if($companyCode == 'CBI')
				<th>Employee No</th>
				@endif
			</tr>
		</thead>
		<tbody>
            <?php 
			$no = 1; 
			$totalAmount = 0;
			?>
			@foreach($data as $value)
			<?php
			if(isset($value->totalAmount)){
				$totalAmount += $value->totalAmount;
			}
			?>
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ isset($value->requestDate) ? \Carbon\Carbon::parse($value->requestDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->status) ? $value->status : '' }}</td>
				<td>{{ isset($value->ticketNo) ? $value->ticketNo : '' }}</td>
				<td>{{ isset($value->type) ? $value->type : '' }}</td>
				<td>{{ isset($value->fullName) ? $value->fullName : '' }}</td>
				<td>{{ isset($value->receiptDate) ? \Carbon\Carbon::parse($value->receiptDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->customerName) ? $value->customerName : '' }}</td>
				<td>{{ isset($value->remarks) ? $value->remarks : '' }}</td>
				<td>{{ isset($value->startLocation) ? $value->startLocation : '' }}</td>
				<td>{{ isset($value->endLocation) ? $value->endLocation : '' }}</td>
				<td data-format="#,##0">{{ isset($value->totalAmount) ? $value->totalAmount : '' }}</td>
				<td data-format="@">{{ isset($value->noRekening) ? $value->noRekening : '' }}</td>
				<td data-format="#,##0"></td>
				<td data-format="#,##0">{{ isset($value->paidAmount) ? $value->paidAmount : '' }}</td>
				<td>{{ isset($value->hrdRemarks) ? $value->hrdRemarks : '' }}</td>
				<td data-format="#,##0">{{ isset($value->amountParkir) && isset($value->amountToll) ? $value->amountParkir + $value->amountToll : '' }}</td>
				<td data-format="#,##0">{{ isset($value->amountDistance) ? $value->amountDistance : '' }}</td>
				<td>{{ isset($value->changedDate) ? \Carbon\Carbon::parse($value->changedDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->email) ? $value->email : '' }}</td>
				<td>{{ isset($value->businessUnit) ? $value->businessUnit : '' }}</td>
				<td>{{ isset($value->costCenter) ? $value->costCenter : '' }}</td>
				@if($companyCode == 'CBI')
				<td>{{ isset($value->employeeNo) ? $value->employeeNo : '' }}</td>
				@endif
			</tr>
			@endforeach
			<tr>
                <td></td> 
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td> 
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td data-format="#,##0"><b>{{ $totalAmount }}</b></td>
				<td data-format="@"></td>
				<td data-format="#,##0"></td>
				<td data-format="#,##0"></td>
				<td></td> 
				<td data-format="#,##0"></td>
				<td></td> 
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</body>
</html>