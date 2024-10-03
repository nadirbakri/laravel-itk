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
	</style>
</head>
<body>
 
    @if(!empty($data))
        @foreach($data as $index => $item)
        <table style="width:100%; @if ($index < count($data) - 1) page-break-after: always; @endif">
            <tr>
                <td width='20%' style="font-size: 18px; font-weight: 700; text-align: left;">{{ $item->companyName }}</td>
                <td>&nbsp;</td>
                <td width='80%' style="font-size: 14px; text-align: right;">Date : {{ date('d-M-Y', strtotime($item->createdDate)) }} | Assesment : {{ $item->costCenterCode }}</td>
            </tr>
            <tr>
                <td colspan="3"><hr style="margin-top: 20px; margin-bottom: 20px;" /></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size: 18px; font-weight: 700; text-align: center;">TRAVEL ADVANCE PAYMENT REQUEST</td>
            </tr>
            <br>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Status</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->status }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Doc No.</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->ticketNo }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Name</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->fullName }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Division</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->costCenterCode }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>SPPD Type</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->kategoriDestinasi }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Destination</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->destination }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Travel Period</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ date('d-m-Y', strtotime($item->startDate)) }} until {{ date('d-m-Y', strtotime($item->endDate)) }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Total Days</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->totalDays }} days</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Purpose</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->purpose }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Project</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->projectName }}</span></td>
            </tr>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Customer</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->customerName }}</span></td>
            </tr>
            <tr>
                <td colspan="3"><hr style="margin-top: 20px; margin-bottom: 20px;" /></td>
            </tr>
            <tr>
                <td width='50%' style="font-size: 18px; font-weight: 700; text-align: left; padding-bottom: 10px;">ESTIMATED EXPENSES</td>
            </tr>
            <br>
            <tr>
                <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Currency</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>{{ $item->currency }}</span></td>
            </tr>
            @foreach($item->claimList as $claim)
                {{-- @if($claim->claimName == 'Pocket Money') --}}
                    <tr>
                        <td width='20%' style="font-size: 14px; text-align: left; padding-bottom: 10px;">
                            <span>{{ $claim->claimName }}</span>
                        </td>
                        <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                        @if($claim->claimPerDay !== $claim->totalClaimPerDay)
                            <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;">
                                <span>Rp. {{ $claim->claimPerDay }} / Rp. {{ $claim->totalClaimPerDay }}</span>
                            </td>
                        @else
                            <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;">
                                <span>Rp. {{ $claim->totalClaimPerDay }}</span>
                            </td>
                        @endif
                    </tr>
                {{-- @endif --}}
            @endforeach
            <tr>
                <td width='20%' style="font-size: 14px; font-weight: 700; text-align: left; padding-bottom: 10px;"><span>TOTAL</span></td>
                <td width='3%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>:</span></td>
                <td width='77%' style="font-size: 14px; text-align: left; padding-bottom: 10px;"><span>Rp. {{ $item->totalClaimAmount }}</span></td>
            </tr>
        </table>
        @endforeach
    @endif

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                $text = sprintf(_("Page %d/%d"),  $PAGE_NUM, $PAGE_COUNT);
                // Uncomment the following line if you use a Laravel-based i18n
                //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
                $font = null;
                $size = 9;
                $color = array(0,0,0);
                $word_space = 0.5;  //  default
                $char_space = 0.5;  //  default
                $angle = 0.5;   //  default

                // Compute text width to center correctly
                $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

                $x = ($pdf->get_width() - $textWidth) / 2;
                $y = $pdf->get_height() - 35;

                $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            '); // End of page_script
        }
    </script>
</body>
</html>