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
		.table_detail thead tr th{
            padding:4px;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    <table style="width: 100%;">
        <thead>
            <tr>
                <td>{{ $data_company[0]->companyName }}</td>
            </tr>
            <tr>
                <td>{{ $data_company[0]->address }}</td>
            </tr>
            <tr></tr>
            <tr>
                <th style="text-align:center; font-weight:bold;"><h3>{{ ucfirst($type) }} Disease Report</h3></th>
            </tr>
            <tr>
                <th style="text-align:center; font-weight:bold;">Period Claim Date : {{ $period }}</th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Disease Code</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Total</th>
            </tr>
        </thead>
        <?php
        $total = 0;
        ?>
        <tbody>
            @foreach($data[0]->summary as $key => $value)
            <?php
                $total += $value->total;
            ?>
            <tr>
                <td style="text-align:center; border:1px solid #000;">{{ $key2+1 }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->diseaseCode }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->total }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2" style="text-align:right; border:1px solid #000;">Grand Total</td>
                <td style="text-align:right; border:1px solid #000;">{{ $total }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>