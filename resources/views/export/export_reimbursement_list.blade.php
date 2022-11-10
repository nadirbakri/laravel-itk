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
				<th>Receipt Date</th>
				<th>Employee No</th>
				<th>Customer Name</th>
                <th>Project Name</th>
				<th>Total Request(Rp)</th>
				<th>Remarks</th>
                <th>Currency</th>
                <th>Total Claim Amount</th>
                <th>Paid Amount</th>
                <th>Payment Date</th>
				<th>No Rekening</th>
				<th>Total Approved HRD(Rp)</th>
				<th>Total Paid</th>
				<th>Paid Remarks</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td> 
				<td></td>
				<td>{{ $value->reimbursementEntity->reimbursementStatus}}</td>
				<td>{{ $value->reimbursementEntity->ticketNo }}</td>
				<td>{{ \Carbon\Carbon::parse($value->reimbursementEntity->receiptDate)->format('Y-m-d') }}</td> 
				<td>{{ $value->reimbursementEntity->employeeNo }}</td>
				<td>{{ $value->reimbursementEntity->customerName}}</td>
				<td>{{ $value->reimbursementEntity->projectName }}</td>
				<td></td>
				<td></td>
				<td>{{ $value->reimbursementEntity->currency}}</td>
				<td>{{ $value->reimbursementEntity->totalClaimAmount}}</td>
				<td>{{ $value->reimbursementEntity->paidAmount}}</td>
				<td>{{ $value->reimbursementEntity->paymentDate}}</td> 
				<td></td> 
				<td></td> 
				<td>{{ $value->reimbursementEntity->totalPaidMonth}}</td> 
				<td>{{ $value->reimbursementEntity->approvalRemarks}}</td> 
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>