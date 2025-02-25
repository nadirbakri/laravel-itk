<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_journal_report.judul') }}</title>
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
		}
	</style>
</head>
<body>
	<table class="table table-bordered table-hover responsive table_detail" style="width:100%; font-size: 15px;">
        <tr>
            <th>&nbsp;</th>
            <td style="font-weight: bold; text-align:left;">{{ $data->reportName }}</td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td style="font-weight: bold; text-align:left;">{{ $data->reportYear }}</td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td style="font-weight: bold; text-align:left;">{{ $data->reportPeriod }}</td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td style="font-weight: bold; text-align:left;">{{ $data->companyName }}</td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered table-hover responsive table_detail" style="width:100%; font-size: 15px;">
        <thead>
            <tr>
                <th style="border:1px solid #000; text-align:center; font-weight: bold;">NO</th>
                <th style="border:1px solid #000; text-align:center; font-weight: bold;">KETERANGAN</th>
                <th style="border:1px solid #000; text-align:center; font-weight: bold;">{{ $data->reportPeriod }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->data as $key => $dataTables)
            <tr>
                <td style="border:1px solid #000; text-align:center; padding:4px;">{{ ($key + 1) }}</td>
                <td style="border:1px solid #000; text-align:left; padding:4px;">{{ $dataTables->columnName }}</td>
                <td style="border:1px solid #000; text-align:right; padding:4px;">{{ number_format($dataTables->amount, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2" style="border:1px solid #000; text-align:right; padding:4px;">TOTAL</td>
                <td style="border:1px solid #000; text-align:right; padding:4px;">{{ number_format($data->total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>