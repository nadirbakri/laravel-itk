<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_monthly_absenteeism_detail.judul_export') }}</title>
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

		.table_detail{
			border-collapse:collapse;
            table-layout: auto;
		}
        .table_detail td{
            margin: 0;
			border:1px solid #000;
            padding:4px;
            font-size: 14px;
            text-align: left
		}
		.table_detail th{
            margin: 0;
			border:1px solid #000;
            padding:4px;
            font-size: 14px;
            /* font-weight: normal; */
            text-align: center
		}
	</style>
</head>

<body>
    @if(count($data) > 0)
		<table style="width: 100%; font-size: 14px;">
			<tr>
				<td style="font-weight: bold;">{{ $data[0]->{'Company Name'} }}</td>
			</tr>
			<tr>
				@php
					$keyCount = 3;
					foreach($data[0] as $key => $value) {
						if($key !== 'Full Name' && $key !== 'CompanyCode' && $key !== 'Company Name' && $key !== 'EmployeeNo') {
							$keyCount++;
						}
					}
				@endphp
				<td colspan={{ $keyCount }} style="font-weight: bold; text-align: center">LAPORAN KEHADIRAN KERJA KARYAWAN</td>
			</tr>
				@foreach($dataLevel as $index => $item)
					<tr>
						<td>
							Level {{ $item['levelType'] }} :
							@foreach($item['levelCode'] as $code)
								@if($code === 'ALL')
									{{ $code }}
									@break
								@else
									{{ $code }},
								@endif
							@endforeach
						</td>
					</tr>
				@endforeach
			<tr>
				<td>Periode : {{ date('d M Y', strtotime($absentDateFrom)) }} s/d {{ date('d M Y', strtotime($absentDateTo)) }}</td>
			</tr>
		</table>
		<table style="width:100%;" class="table_detail">
			<thead>
				<tr>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">No</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Employee No</th>
					<th style="text-align: center; font-weight: bold; border:1px solid #000">Full Name</th>
					@foreach($data[0] as $key => $value)
						@if($key !== 'Full Name' && $key !== 'CompanyCode' && $key !== 'Company Name' && $key !== 'EmployeeNo')
							<th style="text-align: center; font-weight: bold; border:1px solid #000">{{ ucwords(str_replace('_', ' ', $key)) }}</th>
						@endif
					@endforeach
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					$totals = [];
					foreach($data[0] as $key => $value) {
						if ($key !== 'Full Name' && $key !== 'CompanyCode' && $key !== 'Company Name' && $key !== 'EmployeeNo') {
							$totals[$key] = 0;
						}
					}
				?>
				@foreach($data as $index => $row)
					<tr>
						<td style="text-align: center; border:1px solid #000">{{ $no++ }}</td>
						<td style="border:1px solid #000">{{ $row->EmployeeNo }}</td>
						<td style="border:1px solid #000">{{ $row->{'Full Name'} }}</td>
						@foreach($row as $key => $value)
							@if($key !== 'Full Name' && $key !== 'CompanyCode' && $key !== 'Company Name' && $key !== 'EmployeeNo')
								<td style="text-align: center; border:1px solid #000">{{ $value }}</td>
								<?php $totals[$key] += $value; ?>
							@endif
						@endforeach
					</tr>
				@endforeach

				<tr>
					<td colspan="3" style="text-align: center; font-weight: bold; border:1px solid #000">Total</td>
					@foreach($totals as $key => $total)
						<td style="text-align: center; font-weight: bold; border:1px solid #000">{{ $total }}</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	@endif
</body>
</html>