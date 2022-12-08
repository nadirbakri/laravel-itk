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
				<th>Employee No</th>
				<th>Receipt Date</th>
				<th>Company Customer</th>
				<th>Remarks</th>
				<th>Total Request(Rp)</th>
				<th>Total Per Employee</th>
				<th>No Rekening</th>
				<th>Total Approved HRD(Rp)</th>
				<th>Total Paid</th>
				<th>Paid Remarks</th>
				{{-- <th>Reimbursement Status</th>
				<th>Ticket No</th> --}}
				{{-- <th>Business Unit</th> --}}
				{{-- <th>Receipt Date</th>
				<th>Employee No</th>
                <th>Medical Type</th>
                <th>Claim For</th>
                <th>Name</th>
                <th>Total Claim</th>
                <th>Payment Date</th> --}}
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>#</td>
				<td>{{ $value->reimbursementEntity->reimbursementStatus }}</td>
				<td>{{ $value->reimbursementEntity->ticketNo }}</td>
				<td>{{ $value->reimbursementEntity->medicalType1 }}</td>
				<td>{{ $value->reimbursementEntity->employeeNo}}</td>
				<td>{{ \Carbon\Carbon::parse($value->reimbursementEntity->receiptDate)->format('Y-m-d') }}</td>
				{{-- <td>{{ $value->reimbursementEntity->reciptDate }}</td> --}}
				<td><b>TOTAL</b></td>
				<td>{{ $value->reimbursementEntity->reimbursementRemarks}}</td>
				<td><b>0</b></td>
				<td><b>0</b></td>
				<td>#</td>
				<td></td>
				<td>{{ $value->reimbursementEntity->paidAmount}}</td>
				<td>{{ $value->reimbursementEntity->approvalRemarks}}</td>
				{{-- <td>{{ $value->reimbursementEntity->paymentDate}}</td> --}}
				
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>

