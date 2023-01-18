<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_disease_report.judul') }}</title>
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
        .table_detail td{
            text-align:center;
			text-align:center;
		}
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="5">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="5">{{ $data_company[0]->address }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="5" style="text-align:center; font-weight:bold;"><h3>{{ ucfirst($type) }} Disease Report</h3></th>
            </tr>
            <tr>
                <th colspan="5" style="text-align:center; font-weight:bold;"><pre>Period Claim Date : {{ $period }}</pre></th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Fullname</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Claim Date</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Remarks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data[0]->detail as $key => $value)
            <tr>
                <td colspan="5" style="text-align:left; border:1px solid #000;">{{ $value->diseaseCode }}</td>
            </tr>
            @foreach($value->listData as $key2 => $value2)
            <tr>
                <td style="text-align:right; border:1px solid #000;">{{ $key2+1 }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->employeeNo }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->fullName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->claimDate }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->remarks }}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>