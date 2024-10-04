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
				<th>{{ __('export_reimbursement.reqdate') }}</th>
				<th>{{ __('export_reimbursement.status') }}</th>
				<th>{{ __('export_reimbursement.ticket') }}</th>
				<th>{{ __('export_reimbursement.rtipe') }}</th>
				<th>{{ __('export_reimbursement.employeename') }}</th>
				<th>{{ __('export_reimbursement.division') }}</th>
                <th>{{ __('export_reimbursement.rdate') }}</th>
				<th>{{ __('export_reimbursement.companycustomer') }}</th>
				<th>{{ __('export_reimbursement.remarks') }}</th>
				<th>{{ __('export_reimbursement.treq') }}</th>
                <th>{{ __('export_reimbursement.temp') }}</th>
                <th>{{ __('export_reimbursement.nrek') }}</th>
                <th>{{ __('export_reimbursement.tapprove') }}</th>
                <th>{{ __('export_reimbursement.tpaid') }}</th>
				<th>{{ __('export_reimbursement.premarks') }}</th>
				<th>{{ __('export_reimbursement.email') }}</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td> 
				<td>{{ isset($value->reimbursementEntity->reimbursementStatus) ? $value->reimbursementEntity->reimbursementStatus : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->ticketNo) ? $value->reimbursementEntity->ticketNo : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->reimbursementType) ? $value->reimbursementEntity->reimbursementType : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->receiptDate) ? \Carbon\Carbon::parse($value->reimbursementEntity->receiptDate)->format('Y-m-d') : '' }}</td> 
				<td>{{ isset($value->reimbursementEntity->employeeNo) ? $value->reimbursementEntity->employeeNo : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->fullnameRequester) ? $value->reimbursementEntity->fullnameRequester : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->customerName) ? $value->reimbursementEntity->customerName : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->projectName) ? $value->reimbursementEntity->projectName : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->currency) ? $value->reimbursementEntity->currency : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->totalClaimAmount) ? $value->reimbursementEntity->totalClaimAmount : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->paidAmount) ? $value->reimbursementEntity->paidAmount : '' }}</td>
				<td>{{ isset($value->reimbursementEntity->paymentDate) ? \Carbon\Carbon::parse($value->reimbursementEntity->paymentDate)->format('Y-m-d') : '' }}</td> 
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
