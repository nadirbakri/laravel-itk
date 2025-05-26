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
				<th>{{ __('trans_death_benefit_list.date_of_death') }}</th>
                <th>{{ __('trans_death_benefit_list.ticket_no') }}</th>
                <th>{{ __('trans_death_benefit_list.status') }}</th>
                <th>{{ __('trans_death_benefit_list.name') }}</th>
                <th>{{ __('trans_death_benefit_list.family_member') }}</th>
                <th>{{ __('trans_death_benefit_list.relation') }}</th>
                <th>{{ __('trans_death_benefit_list.total_claim_amount') }}</th>
                <th>{{ __('trans_death_benefit_list.paid_amount') }}</th>
                <th>{{ __('trans_death_benefit_list.payment_date') }}</th>
                <th>{{ __('trans_death_benefit_list.remarks') }}</th>
			</tr>
		</thead>
		<tbody>
            <?php 
			$no = 1; 
			?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ isset($value->tunjanganKematianEntity->claimDate) ? \Carbon\Carbon::parse($value->tunjanganKematianEntity->claimDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->tunjanganKematianEntity->ticketNo) ? $value->tunjanganKematianEntity->ticketNo : '' }}</td>
				<td>{{ isset($value->tunjanganKematianEntity->reimbursementStatus) ? $value->tunjanganKematianEntity->reimbursementStatus : '' }}</td>
				<td>{{ isset($value->tunjanganKematianEntity->fullNameRequester) ? $value->tunjanganKematianEntity->fullNameRequester : '' }}</td>
                <td>{{ isset($value->tunjanganKematianEntity->anggotaKeluarga) ? $value->tunjanganKematianEntity->anggotaKeluarga : '' }}</td>
                <td>{{ isset($value->tunjanganKematianEntity->relasiKeluarga) ? $value->tunjanganKematianEntity->relasiKeluarga : '' }}</td>
                <td data-format="#,##0">{{ isset($value->tunjanganKematianEntity->totalClaimAmount) ? $value->tunjanganKematianEntity->totalClaimAmount : '' }}</td>
                <td data-format="#,##0">{{ isset($value->tunjanganKematianEntity->paidAmount) ? $value->tunjanganKematianEntity->paidAmount : '' }}</td>
                <td>{{ isset($value->tunjanganKematianEntity->paymentDate) ? \Carbon\Carbon::parse($value->tunjanganKematianEntity->paymentDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->tunjanganKematianEntity->approvalRemarks) ? $value->tunjanganKematianEntity->approvalRemarks : '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>