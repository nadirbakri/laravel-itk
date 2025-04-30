<!DOCTYPE html>
<html>
<head>
	<title>Insurance</title>
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
				<th>Employee No *</th>
				<th>Insurance Code *</th>
				<th>Insurance Class *</th>
				<th>Insurance Start Date *</th>
				<th>Insurance End Date *</th>
				<th>Insurance Policy No *</th>
				<th>Remarks</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1; 
			?>
			@foreach($data as $value)
				<tr>
					<td style="text-align: left;">{{ isset($value->employeeNo) ? $value->employeeNo : '' }}</td>
					<td style="text-align: left;">{{ isset($value->insuranceCode) ? $value->insuranceCode : '' }}</td>
					<td style="text-align: left;">{{ isset($value->insuranceClassCode) ? $value->insuranceClassCode : '' }}</td>
					<td style="text-align: left;">{{ isset($value->insuranceStartDate) ? date('d/m/Y', strtotime($value->insuranceStartDate)) : '' }}</td>
					<td style="text-align: left;">{{ isset($value->insuranceEndDate) ? date('d/m/Y', strtotime($value->insuranceEndDate)) : '' }}</td>
					<td style="text-align: left;">{{ isset($value->insurancePolicyNo) ? $value->insurancePolicyNo : '' }}</td>
					<td style="text-align: left;">{{ isset($value->insuranceRemark) ? $value->insuranceRemark : '' }}</td>
				</tr>
				<?php $no++; ?>
			@endforeach
		</tbody>
	</table>
</body>
</html>