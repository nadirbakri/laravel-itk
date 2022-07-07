<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_severance_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
		.table_detail td{
			border:1px solid #000;
			text-align:center;
		}
		.table_detail th{
			border:1px solid #000;
		}
		.table_detail{
			border-collapse:collapse;
		}

		.page_break { page-break-before: always; }

		.box_judul{
			background-color: #84c2e0;
			text-align:center;
			display: table;
			border: 1px solid black;
			height: 30px;
			width: 100%;
			font-weight:300;
		}
	</style>
</head>
<body>
	@foreach($data as $key => $value)
	<div class="box_judul">
		<p style="display: table-cell; vertical-align: middle;">FINAL PAYMENT OF EMPLOYEE</p>
	</div>
	<br>
	<table>
		<thead>
			<tr>
				<td>ID No</td>
				<td> : </td>
				<td>{{ $value->idNo }}</td>
			</tr>
			<tr>
				<td>Employee Name</td>
				<td> : </td>
				<td>{{ $value->employeeName }}</td>
			</tr>
			<tr>
				<td>Designation</td>
				<td> : </td>
				<td>{{ $value->designation }}</td>
			</tr>
			<tr>
				<td>Join Date</td>
				<td> : </td>
				<td>{{ $value->joinDate }}</td>
			</tr>
			<tr>
				<td>Termination Date</td>
				<td> : </td>
				<td>{{ $value->terminationDate }}</td>
			</tr>
			<tr>
				<td>Balance of Annual Leave</td>
				<td> : </td>
				<td>{{ $value->balanceofAnnualLeave }}</td>
			</tr>
		</thead>
	</table>
	<br>
	<p style="text-decoration:underline; font-weight: 200;">The Company will pay this amount based on Company Regulation & labour Law PP35/2021</p>
	<br>
	<table>
		<thead>
			<tr>
				<td style="font-weight: 200;">Severance Pay</td>
				<td> : </td>
				<td>{{ $value->severancePay }}</td>
			</tr>
			<tr>
				<td style="font-weight: 200;">Reward for Years of Service</td>
				<td> : </td>
				<td>{{ $value->rewardsForYearsOfService }}</td>
			</tr>
			<tr>
				<td><br></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="text-decoration:underline;">Sub Total</td>
				<td> : </td>
				<td style="text-decoration:underline; font-weight: 200;">{{ $value->subTotal }}</td>
			</tr>
			<tr>
				<td><br></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="font-weight: 200;">Rest of Annual Leave</td>
				<td> : </td>
				<td style="text-decoration:underline;">{{ $value->restOfAnnualLeave }}</td>
			</tr>
			<tr>
				<td><br></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="font-weight: 200;">Detachment Money</td>
				<td> : </td>
				<td>{{ $value->detachmentMoney }}</td>
			</tr>
			<tr>
				<td><br></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="text-decoration:underline; font-weight: 200;">Total</td>
				<td> : </td>
				<td style="text-decoration:underline; font-weight: 200;">Rp. {{ $value->total }}</td>
			</tr>
		</thead>
	</table>
	<br>
	<p>Remark : The above amount exclude Tax</p>
	<br>
	<table style="width:100%">
		<thead>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Prepared by,</td>
				<td>&nbsp;</td>
				<td>Acknowledge by,</td>
				<td>&nbsp;</td>
				<td>Approved by,</td>
			</tr>
			<tr>
				<td><br><br><br><br></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>_____________</td>
				<td>&nbsp;</td>
				<td>_____________</td>
				<td>&nbsp;</td>
				<td>_____________</td>
			</tr>
		</thead>
	</table>
	@if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
	@endforeach
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