<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_claim_report.judul') }}</title>
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
    <table style="width: 100%;">
        <thead>
            <tr>
                <th colspan="11">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="11">{{ $data_company[0]->address }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="11" style="text-align:center; font-weight:bold;"><h3>Medical Claim Report</h3></th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Claim Date</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Full Name</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Position</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Ranking</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Claim Code</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Dependent Name</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Currency</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Amount</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Remarks</th>
            </tr>
        </thead>
        <?php
        $total = 0;
        ?>
        @if(count($data) > 0)
        <tbody>
            @foreach($data->claimDetail as $key => $value)
            <?php
                $total += $value->claimAmount;
            ?>
            <tr>
                <td style="text-align:center; border:1px solid #000;">{{ $key+1 }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimDate }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->employeeNo }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->fullName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->positionName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->rankingName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->dependentName }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value->currencyCode }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->claimAmount }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimRemarks }}</td>
            </tr>
            @endforeach
            @if($grand_total)
            <tr>
                <td colspan="7" style="text-align:center;">&nbsp;</td>
                <td colspan="2" style="text-align:left; border:1px solid #000;">Total</td>
                <td style="text-align:right; border:1px solid #000;">{{ $total }}</td>
                <td style="text-align:right; border:1px solid #000;">&nbsp;</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endif
</body>
</html>