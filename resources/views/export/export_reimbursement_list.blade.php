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
				<th>{{ __('export_reimbursement.no') }}</th>
				{{-- <th>{{ __('export_reimbursement.reqdate') }}</th> --}}
				<th>{{ __('export_reimbursement.status') }}</th>
				<th>{{ __('export_reimbursement.ticket') }}</th>
				<th>{{ __('export_reimbursement.rdate') }}</th>
				<th>{{ __('export_reimbursement.employee') }}</th>
				<th>{{ __('export_reimbursement.cname') }}</th>
                <th>{{ __('export_reimbursement.pname') }}</th>
				{{-- <th>{{ __('export_reimbursement.treq') }}</th>
				<th>{{ __('export_reimbursement.remarks') }}</th> --}}
                <th>{{ __('export_reimbursement.currency') }}</th>
                <th>{{ __('export_reimbursement.tcamount') }}</th>
                <th>{{ __('export_reimbursement.pamount') }}</th>
                <th>{{ __('export_reimbursement.pdate') }}</th>
				{{-- <th>{{ __('export_reimbursement.nrek') }}</th>
				<th>{{ __('export_reimbursement.tapprove') }}</th> --}}
				{{-- <th>{{ __('export_reimbursement.tpaid') }}</th> --}}
				<th>{{ __('export_reimbursement.premarks') }}</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td> 
				{{-- <td></td> --}}
				<td>{{ $value->reimbursementEntity->reimbursementStatus}}</td>
				<td>{{ $value->reimbursementEntity->ticketNo }}</td>
				<td>{{ \Carbon\Carbon::parse($value->reimbursementEntity->receiptDate)->format('Y-m-d') }}</td> 
				<td>{{ $value->reimbursementEntity->employeeNo }}</td>
				<td>{{ $value->reimbursementEntity->customerName}}</td>
				<td>{{ $value->reimbursementEntity->projectName }}</td>
				{{-- <td></td>
				<td></td> --}}
				<td>{{ $value->reimbursementEntity->currency}}</td>
				<td>{{ $value->reimbursementEntity->totalClaimAmount}}</td>
				<td>{{ $value->reimbursementEntity->paidAmount}}</td>
				<td>{{ \Carbon\Carbon::parse($value->reimbursementEntity->paymentDate)->format('Y-m-d') }}</td> 
				{{-- <td></td> 
				<td></td>  --}}
				{{-- <td>{{ $value->reimbursementEntity->totalPaidMonth}}</td>  --}}
				<td>{{ $value->reimbursementEntity->approvalRemarks}}</td> 
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
