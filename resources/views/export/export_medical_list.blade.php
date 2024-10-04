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
				<th>Employee Name</th>
				<th>Division</th>
				<th>Receipt Date</th>
				<th>Claim For</th>
				<th>Dependent Name</th>
				<th>Remarks</th>
				<th>Total Request (Rp)</th>
				<th>Total Per Employee (Rp)</th>
				<th>No Rekening</th>
				<th>Total Approved HRD (Rp)</th>
				<th>Total Paid (Rp)</th>
				<th>Paid Remarks</th>
				<th>Alamat Email</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ isset($value->reimbursementEntity->createdDate) ? \Carbon\Carbon::parse($value->reimbursementEntity->createdDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->reimbursementStatus) ? $value->reimbursementEntity->reimbursementStatus : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->ticketNo) ? $value->reimbursementEntity->ticketNo : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->fullnameRequester) ? $value->reimbursementEntity->fullnameRequester : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->businessUnit) ? $value->reimbursementEntity->businessUnit : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->receiptDate) ? \Carbon\Carbon::parse($value->reimbursementEntity->receiptDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->claimFor) ? $value->reimbursementEntity->claimFor : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->dependentName) ? $value->reimbursementEntity->dependentName : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->reimbursementRemarks) ? $value->reimbursementEntity->reimbursementRemarks : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->totalClaimAmount) ? $value->reimbursementEntity->totalClaimAmount : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->totalClaimAmountPerEmployee) ? $value->reimbursementEntity->totalClaimAmountPerEmployee : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->bankAccountNo) ? $value->reimbursementEntity->bankAccountNo : '' }}</td>
				<td></td>
				<td>{{ isset($value->reimbursementEntity->paidAmount) ? $value->reimbursementEntity->paidAmount : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->approvalRemarks) ? $value->reimbursementEntity->approvalRemarks : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->emailRequester) ? $value->reimbursementEntity->emailRequester : '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>

