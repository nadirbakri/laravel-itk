<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_outstanding_claim_report.judul') }}</title>
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
                <th>{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th>{{ $data_company[0]->address }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th style="text-align:center; font-weight:bold;"><h3>Outstanding Claim Report {{ ($claim_to == 'C') ? 'By Company' : '' }}{{ ($claim_to == 'I') ? 'By Insurance' : '' }}</h3></th>
            </tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Fullname</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Insurance Class</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Insurance Code</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Claim Date</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Receipt Date</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Claim Code</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Claim For</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Claim Currency</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Claim Amount</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Covered Amount</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Uncovered Amount</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Outstanding Claim</th>
            </tr>
        </thead>
        <?php
        $totalClaimC = 0;
        $totalCoveredC = 0;
        $totalUncoveredC = 0;
        $totalOutstandingC = 0;
        $totalClaimI = 0;
        $totalCoveredI = 0;
        $totalUncoveredI = 0;
        $totalOutstandingI = 0;
        ?>
        @if($claim_to == 'C' || $claim_to == 'A')
        <tbody>
            @if($claim_to == 'A')
            <tr>
                <td colspan="14" style="text-align:left; border:1px solid #000;">Company</td>
            </tr>
            @endif
            @foreach($data[0]->company as $key => $value)
            <?php
            $totalClaimC += $value->claimAmount;
            $totalCoveredC += $value->coveredAmount;
            $totalUncoveredC += $value->uncoveredAmount;
            $totalOutstandingC += $value->outstandingClaim;
            ?>
            <tr>
                <td style="text-align:right; border:1px solid #000;">{{ $key+1 }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->employeeNo }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->fullName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->insuranceClassCode }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->insuranceCode }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimDate }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->receiptDate }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimCode }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimFor }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value->claimCurrencyCode }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->claimAmount }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->coveredAmount }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->uncoveredAmount }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->outstandingClaim }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="8" style="text-align:center;">&nbsp;</td>
                <td colspan="2" style="text-align:left; border:1px solid #000;">Total Claim</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalClaimC }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalCoveredC }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalUncoveredC }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalOutstandingC }}</td>
            </tr>
        </tbody>
        @endif
        <tr></tr>
        @if($claim_to == 'I' || $claim_to == 'A')
        <tbody>
            @if($claim_to == 'A')
            <tr>
                <td colspan="14" style="text-align:left; border:1px solid #000;">Insurance</td>
            </tr>
            @endif
            @foreach($data[0]->insurance as $key => $value)
            <?php
            $totalClaimI += $value->claimAmount;
            $totalCoveredI += $value->coveredAmount;
            $totalUncoveredI += $value->uncoveredAmount;
            $totalOutstandingI += $value->outstandingClaim;
            ?>
            <tr>
                <td style="text-align:right; border:1px solid #000;">{{ $key+1 }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->employeeNo }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->fullName }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->insuranceClassCode }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->insuranceCode }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimDate }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->receiptDate }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimCode }}</td>
                <td style="text-align:center; border:1px solid #000;">{{ $value->claimFor }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $value->claimCurrencyCode }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->claimAmount }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->coveredAmount }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->uncoveredAmount }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $value->outstandingClaim }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="8" style="text-align:center;">&nbsp;</td>
                <td colspan="2" style="text-align:left; border:1px solid #000;">Total Claim</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalClaimI }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalCoveredI }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalUncoveredI }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalOutstandingI }}</td>
            </tr>
        </tbody>
        @endif
        @if($grand_total)
        <tbody>
            <tr>
                <td colspan="8" style="text-align:center;">&nbsp;</td>
                <td colspan="2" style="text-align:left; border:1px solid #000;">Grand Total</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalClaimC + $totalClaimI }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalCoveredC + $totalCoveredI }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalUncoveredC + $totalUncoveredI }}</td>
                <td style="text-align:right; border:1px solid #000;">{{ $totalOutstandingC + $totalOutstandingI }}</td>
            </tr>
        </tbody>
        @endif
    </table>
</body>
</html>