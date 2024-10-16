<!DOCTYPE html>
<html>
<head>
	<title>Business Trip List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		* { box-sizing: border-box; }
        html, body, #header {
            margin-top: 1%;
            margin-bottom: 0;
            margin-left: 2%;
            margin-right: 2%;
            padding: 0 !important;
            font-family: Arial, Helvetica, sans-serif;
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

        .page_break { page-break-before: always; }
	</style>
</head>
<body>
    @if(!empty($data))
        @foreach($data as $index => $item)
            <table style="width:100%; padding-left:1%; padding-right:1%;">
                <tr>
                    <td width="50%" style="font-size: 18px; font-weight: 700; text-align: left;">{{ $item->companyName }}</td>
                    <td width='50%' style="font-size: 14px; text-align: right;">Date : {{ date('d-M-Y', strtotime($item->createdDate)) }} | Assesment : {{ $item->levelCode }}</td>
                </tr>
                <tr>
                    <td colspan="2"><hr style="margin-top: 10px; margin-bottom: 10px;" /></td>
                </tr>
            </table>
            <table style="width:100%; padding-left:1%; padding-right:1%;">
                <tr>
                    <td colspan="3" style="font-size: 18px; font-weight: 700; text-align: center;">
                        @if($item->type === "TTA")
                            TRAVEL ADVANCE PAYMENT REQUEST
                        @else
                            CALCULATION OF TRAVEL SETTLEMENT
                        @endif
                    </td>
                </tr>
                <br>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>No Rekening</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->bankAccountNo1 }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Status</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->status }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Doc No.</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->ticketNo }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Name</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->fullName }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Division</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->levelCode }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Destination</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->destination }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Travel Period</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ date('d-m-Y', strtotime($item->startDate)) }} until {{ date('d-m-Y', strtotime($item->endDate)) }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Total Days</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->totalDays }} days</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Purpose</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->purpose }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Project</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->projectName }}</span></td>
                </tr>
                <tr>
                    <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Customer</span></td>
                    <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->customerName }}</span></td>
                </tr>
                <tr>
                    <td colspan="3"><hr style="margin-top: 10px; margin-bottom: 10px;" /></td>
                </tr>
            </table>

            @if($item->type === "TTA")
                <table style="width:100%; padding-left:1%; padding-right:1%;">
                    <tr>
                        <td colspan="3" style="font-size: 18px; font-weight: 700; text-align: left; padding-bottom: 5px;">ESTIMATED EXPENSES</td>
                    </tr>
                    <br>
                    <tr>
                        <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Currency</span></td>
                        <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                        <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>{{ $item->currency }}</span></td>
                    </tr>
                    @foreach($item->claimList as $claim)
                        @if($claim->claimName == 'Other')
                            <tr>
                                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;">
                                    <span>{{ $claim->claimName }}</span>
                                </td>
                                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                                @if($claim->claimPerDay !== $claim->totalClaimPerDay)
                                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;">
                                        <span>Rp. {{ number_format($claim->totalClaimPerDay, 0, '.', ',') }} ( IDR {{ number_format($claim->claimPerDay, 0, '.', ',') }} / IDR {{ number_format($claim->totalClaimPerDay, 0, '.', ',') }} )</span>
                                    </td>
                                @else
                                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;">
                                        <span>Rp. {{ number_format($claim->totalClaimPerDay, 0, '.', ',') }}</span>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;">
                                    <span>{{ $claim->claimName }} Remarks</span>
                                </td>
                                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;">
                                    <span>{{ $claim->remarksType }}</span>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 5px;">
                                    <span>{{ $claim->claimName }}</span>
                                </td>
                                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                                @if($claim->claimPerDay !== $claim->totalClaimPerDay)
                                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;">
                                        <span>Rp. {{ number_format($claim->totalClaimPerDay, 0, '.', ',') }} ( IDR {{ number_format($claim->claimPerDay, 0, '.', ',') }} / IDR {{ number_format($claim->totalClaimPerDay, 0, '.', ',') }} )</span>
                                    </td>
                                @else
                                    <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;">
                                        <span>Rp. {{ number_format($claim->totalClaimPerDay, 0, '.', ',') }}</span>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td width='20%' style="font-size: 14px; font-weight: 700; text-align: left; padding-bottom: 5px;"><span>TOTAL</span></td>
                        <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>:</span></td>
                        <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 5px;"><span>Rp. {{ number_format($item->totalClaimAmount, 0, '.', ',') }}</span></td>
                    </tr>
                </table>
            @else
                <table style="width:100%; padding-left:1%; padding-right:1%;" class="table_detail">
                    <tr>
                        <td colspan="8" style="border: none; font-size: 18px; font-weight: 700; text-align: left; padding-bottom: 5px;">SETTLEMENT EXPENSES</td>
                    </tr>
                    <br>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Cost Type</th>
                            <th>Description</th>
                            <th>Currency</th>
                            <th>Exchange Rate</th>
                            <th>Amount</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($item->claimList as $claim)
                            <tr>
                                <td style="text-align: center">{{ $no++ }}</td>
                                <td>{{ $claim->date }}</td>
                                <td>{{ $claim->costType }}</td>
                                <td>{{ $claim->description }}</td>
                                <td>{{ $claim->currency }}</td>
                                <td>{{ $claim->exchangeRate }}</td>
                                <td>{{ $claim->amountInForex }}</td>
                                <td>Rp. {{ number_format($claim->totalSettlement, 0, '.', ',') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" style="font-size: 14px; text-align: right; border: none">TOTAL SETTLEMENT</td>
                            <td>Rp. {{ number_format($item->totalClaimAmount, 0, '.', ',') }}</td>
                        </tr>
                        <tr>
                            <td colspan="7" style="font-size: 14px; text-align: right; border: none">TOTAL REQUEST</td>
                            <td>Rp. {{ number_format($item->totalDifferentAmount, 0, '.', ',') }}</td>
                        </tr>
                        <tr>
                            <td colspan="7" style="font-size: 14px; text-align: right; border: none">DIFFERENCE</td>
                            {{-- <td>Rp. {{ number_format($item->difference, 0, '.', ',') }}</td> --}}
                            <td>Rp. 200,000</td>
                        </tr>
                    </tfoot>
                </table>
            @endif

        @if($index != array_key_last($data))
		<div class="page_break"></div>
	    @endif
        @endforeach
    @endif
</body>
</html>