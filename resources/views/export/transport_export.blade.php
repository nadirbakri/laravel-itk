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
				<th>Employee Name</th>
				<th>Request Date</th>
				<th>Status</th>
				<th>Ticket Number</th>
				<th>Claim Type</th>
                <th>Company Customer</th>
                <th>Remarks</th>
                <th>Start Location</th>
                <th>End Location</th>
                <th>Total Request (Rp)</th>
                <th>Total per Employee (Rp)</th>
                <th>No Rekening</th>
                <th>Total Approve HRD (Rp)</th>
                <th>Paid Remarks (Rp)</th>
                <th>Parking</th>
                <th>Toll</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{{ $value->transportEntity->fullnameRequester}}</td>
				<td>{{ \Carbon\Carbon::parse($value->transportEntity->receiptDate)->format('Y-m-d') }}</td>
				<td>{{ $value->transportEntity->status }}</td>
				<td>{{ $value->transportEntity->ticketNo }}</td>
				<td>{{ $value->transportEntity->type }}</td>
				<td>{{ $value->transportEntity->customerName}}</td>
				<td>{{ $value->transportEntity->remarks}}</td>
				<td>{{ $value->transportEntity->startLocation}}</td>
				<td>{{ $value->transportEntity->endLocation}}</td>
				<td>{{ $value->transportEntity->totalAmount}}</td>
				<td></td>
				<td></td>
				<td>{{ $value->transportEntity->paidAmount}}</td>
				<td>{{ $value->transportEntity->paidRemarks}}</td>
				<td>{{ $value->transportEntity->amountParkir}}</td>
				<td>{{ $value->transportEntity->amountToll}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>