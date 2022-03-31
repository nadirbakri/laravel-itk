<!DOCTYPE html>
<html>
<head>
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
	@if(!empty($data))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table ComGen</td>
			</tr>
			<tr>
				<th>Variable</th>
				<th>ComGen Code</th>
				<th>Value</th>
			</tr>
			@foreach($data as $value)
			<tr>
				<td>{{ strtok($value->variable, '_') }}</td>
				<td>{{ $value->comGenCode }}</td>
				<td>{{ $value->value }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data2))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Cost Center</td>
			</tr>
			<tr>
				<th>Cost Center Code</th>
				<th>Description</th>
			</tr>
			@foreach($data2 as $value)
			<tr>
				<td>{{ $value->costCenterCode }}</td>
				<td>{{ $value->costCenterDescription }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data3))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Location</td>
			</tr>
			<tr>
				<th>Location Code</th>
				<th>Location Name</th>
			</tr>
			@foreach($data3 as $value)
			<tr>
				<td>{{ $value->locationCode }}</td>
				<td>{{ $value->locationName }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data4))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Grade</td>
			</tr>
			<tr>
				<th>Grade Code</th>
				<th>Grade Name</th>
			</tr>
			@foreach($data4 as $value)
			<tr>
				<td>{{ $value->gradeCode }}</td>
				<td>{{ $value->gradeName }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data5))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Position</td>
			</tr>
			<tr>
				<th>Position Code</th>
				<th>Position Name</th>
				<th>Supervisor Position Code</th>
			</tr>
			@foreach($data5 as $value)
			<tr>
				<td>{{ $value->positionCode }}</td>
				<td>{{ $value->positionName }}</td>
				<td>{{ $value->supervisorPositionCode }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data6))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Ranking</td>
			</tr>
			<tr>
				<th>Ranking Code</th>
				<th>Ranking Name</th>
			</tr>
			@foreach($data6 as $value)
			<tr>
				<td>{{ $value->rankingCode }}</td>
				<td>{{ $value->rankingName }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data7))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Work Nature</td>
			</tr>
			<tr>
				<th>Work Nature Code</th>
				<th>Work Nature Name</th>
			</tr>
			@foreach($data7 as $value)
			<tr>
				<td>{{ $value->workNatureCode }}</td>
				<td>{{ $value->workNatureName }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data8))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Group</td>
			</tr>
			<tr>
				<th>Group Code</th>
				<th>Group Name</th>
			</tr>
			@foreach($data8 as $value)
			<tr>
				<td>{{ $value->groupCode }}</td>
				<td>{{ $value->groupName }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data9))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Group Authorize</td>
			</tr>
			<tr>
				<th>Group Authorize Code</th>
				<th>Group Authorize Description</th>
			</tr>
			@foreach($data9 as $value)
			<tr>
				<td>{{ $value->groupAuthorizeCode }}</td>
				<td>{{ $value->groupAuthorizeDesc }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data10))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Work Pattern</td>
			</tr>
			<tr>
				<th>Pattern Code</th>
				<th>Description</th>
			</tr>
			@foreach($data10 as $value)
			<tr>
				<td>{{ $value->patternCode }}</td>
				<td>{{ $value->description }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data11))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table NPWP</td>
			</tr>
			<tr>
				<th>NPWP Code</th>
				<th>Pemotong Kuasa</th>
			</tr>
			@foreach($data11 as $value)
			<tr>
				<td>{{ $value->npwpCode }}</td>
				<td>{{ $value->pemotongKuasa }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data12))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table BPJS</td>
			</tr>
			<tr>
				<th>BPJS Code</th>
				<th>Signer Name</th>
			</tr>
			@foreach($data12 as $value)
			<tr>
				<td>{{ $value->bpjsCode }}</td>
				<td>{{ $value->signerName }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data13))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Bank</td>
			</tr>
			<tr>
				<th>Bank Code</th>
				<th>Bank Name</th>
			</tr>
			@foreach($data13 as $value)
			<tr>
				<td>{{ $value->bankCode }}</td>
				<td>{{ $value->bankName }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br>
	@if(!empty($data14))
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Company Bank</td>
			</tr>
			<tr>
				<th>Bank Code</th>
				<th>Description</th>
			</tr>
			@foreach($data14 as $value)
			<tr>
				<td>{{ $value->bankCode }}</td>
				<td>{{ $value->description }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</body>
</html>