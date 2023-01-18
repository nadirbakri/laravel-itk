<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_medical_facility_used_report.judul') }}</title>
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
                <th colspan="16">{{ $data[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="16">{{ $data[0]->companyAddress }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="16" style="text-align:center; font-weight:bold;"><h3>Medical Facility Used {{ ucfirst($type) }}</h3></th>
            </tr>
            <tr>
                <th colspan="16" style="text-align:center; font-weight:bold;"><pre>Period Payment Date : {{ $period }}</pre></th>
            </tr>
            <tr>
                <th style="text-align:right;">Type of Method : </th>
                <th colspan="15">{{ $data[0]->claimTo }}</th>
            </tr>
        </thead>
    </table>
    <?php
    $grandTotalEmployee = 0;
    $grandTotalFamily = 0;
    ?>
    @foreach($data[0]->claimDetail as $key => $value)
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:right;">Claim Code : </th>
                <th colspan="14">{{ $value->claimCode }}</th>
            </tr>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Fullname</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Receipt Date</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Position</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Ranking</th>
                <th colspan="2" style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee</th>
                <th colspan="2" style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Family</th>
                <th colspan="2" style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Total</th>
                <th colspan="2" style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Balance</th>
            </tr>
        </thead>
        <?php
        $totalEmployee = 0;
        $totalFamily = 0;
        ?>
        <tbody>
            @foreach($value->listData as $key2 => $value2)
            <?php
                $totalEmployee += $value2->employee;
                $totalFamily += $value2->family;
                $grandTotalEmployee += $value2->employee;
                $grandTotalFamily += $value2->family;
            ?>
            <tr>
                <td style="text-align:center; border:1px solid #000;">{{ $key2+1 }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->employeeNo }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->fullName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->receiptDate }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->positionName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value2->rankingName }}</td>
                <td style="text-align:right; border:1px solid #000;">IDR</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value2->employee }}</td>
                <td style="text-align:right; border:1px solid #000;">IDR</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value2->family }}</td>
                <td style="text-align:right; border:1px solid #000;">IDR</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value2->totalPlafond }}</td>
                <td style="text-align:right; border:1px solid #000;">IDR</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value2->balance }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align:center;">&nbsp;</td>
                <td colspan="3" style="text-align:center; border:1px solid #000;">Total Claim Code</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalEmployee }}</td>
                <td style="text-align:right; border:1px solid #000;">&nbsp;</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalFamily }}</td>
                <td colspan="4" style="text-align:right;"></td>
            </tr>
        </tbody>
    </table>
    @endforeach
    @if($grand_total)
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td colspan="4" style="text-align:center;">&nbsp;</td>
                <td colspan="3" style="text-align:center; border:1px solid #000;">Grand Total Claim</td>
                <td style="text-align:right; border:1px solid #000;">{{ $grandTotalEmployee }}</td>
                <td style="text-align:right; border:1px solid #000;">&nbsp;</td>
                <td style="text-align:right; border:1px solid #000;">{{ $grandTotalFamily }}</td>
                <td colspan="4" style="text-align:right;"></td>
            </tr>
        </tbody>
    </table>
    @endif
</body>
</html>