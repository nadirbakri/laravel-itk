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
				<th>{{ __('trans_salary_complaint_list.complaint_date') }}</th>
                <th>{{ __('trans_salary_complaint_list.complaint_type') }}</th>
                <th>{{ __('trans_salary_complaint_list.status') }}</th>
                <th>{{ __('trans_salary_complaint_list.ticket_no') }}</th>
                <th>{{ __('trans_salary_complaint_list.name') }}</th>
                <th>{{ __('trans_salary_complaint_list.missing_amount') }}</th>
                <th>{{ __('trans_salary_complaint_list.correct_amount') }}</th>
                <th>{{ __('trans_salary_complaint_list.remarks') }}</th>
			</tr>
		</thead>
		<tbody>
            <?php 
			$no = 1; 
			?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ isset($value->complainEntity->complainDate) ? \Carbon\Carbon::parse($value->complainEntity->complainDate)->format('Y-m-d') : '' }}</td>
				<td>{{ isset($value->complainEntity->complainTypeValue) ? $value->complainEntity->complainTypeValue : '' }}</td>
				<td>{{ isset($value->complainEntity->status) ? $value->complainEntity->status : '' }}</td>
				<td>{{ isset($value->complainEntity->ticketNo) ? $value->complainEntity->ticketNo : '' }}</td>
				<td>{{ isset($value->complainEntity->fullName) ? $value->complainEntity->fullName : '' }}</td>
                <td data-format="#,##0">{{ isset($value->complainEntity->missingAmount) ? $value->complainEntity->missingAmount : '' }}</td>
                <td data-format="#,##0">{{ isset($value->complainEntity->correctAmount) ? $value->complainEntity->correctAmount : '' }}</td>
				<td>{{ isset($value->complainEntity->remarks) ? $value->complainEntity->remarks : '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>