<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_payment_slip.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		* { box-sizing: border-box; }
		html {
			margin: 1%;
		}
		.table_detail td{
			border:1px solid #000;
			text-align:center;
            padding:4px;
		}
		.table_detail th{
			border:1px solid #000;
            padding:4px;
            background-color:#84c2e0;
		}
		.table_detail{
			border-collapse:collapse;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	@foreach($data as $key => $value)
	<table style="width:100%; padding:1%;">
		<tr>
			@if($display_logo == "1")
			<td width="5%">&nbsp;</td>
			<td width="25%" style="text-align:left;">
				<table style="width: 100%;">
					<tr>
						<td>
							<img class="ml-4" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/logo_hatten.png'))) }}" style="width: 90px; height: 90px" alt="Logo">
						</td>
					</tr>
				</table>
			</td>
			@else
			<td width="30%" style="text-align:left;">&nbsp;</td>
			@endif
			<td width="40%" style="text-align:center;">
				<table style="width: 100%; padding: 0; margin: 0;">
					<tr>
						<td style="padding: 0; margin: 0; text-align:center; font-size: 15px; font-weight: 700;">{{ $value->companyName }}</td>
					</tr>
					<tr>
						<td style="padding: 0; margin: 0; text-align:center; font-size: 15px; font-weight: 700;">{{ $value->slipName }}</td>
					</tr>
					<tr>
						<td style="padding: 0; margin: 0; text-align:center; font-size: 15px; font-weight: 700;">{{ $period }}</td>
					</tr>
				</table>
			</td>
			<td width="30%">&nbsp;</td>
		</tr>
	</table>
	<table style="width:100%; border:1px solid #000; padding:3%;">
		<tr>
			<td width="12%" style="font-size: 12px; font-weight: 600;">Employee No</td>
			<td width="20%" style="font-size: 12px; border-bottom: 1px solid black;">{{ $value->employeeNo }}</td>
			<td width="12%" style="font-size: 12px; font-weight: 600; padding-left: 10px;">Position</td>
			<td width="20%" style="font-size: 12px; border-bottom: 1px solid black;">{{ $value->position }}</td>
			
		</tr>
		<tr>
			<td width="12%" style="font-size: 12px; font-weight: 600;">Employee Name</td>
			<td width="20%" style="font-size: 12px; border-bottom: 1px solid black;">{{ $value->employeeName }}</td>
			<td width="12%" style="font-size: 12px; font-weight: 600; padding-left: 10px;">Join Date</td>
			<td width="20%" style="font-size: 12px; border-bottom: 1px solid black;">{{ date('d F Y', strtotime($value->joinDate)) }}</td>
		</tr>
		<tr>
			<td width="12%" style="font-size: 12px; font-weight: 600;">Divisi</td>
			<td width="20%" style="font-size: 12px; border-bottom: 1px solid black;">Test</td>
			<td colspan="2" width="12%" style="font-size: 12px;">&nbsp;</td>
		</tr>
		<tr>
			@if($value->custom1 != null)
			<td width="12%" style="font-size: 12px; font-weight: 600;">Custom 1</td>
			<td width="20%" style="font-size: 12px; border-bottom: 1px solid black;">{{ $value->custom1 }}</td>
			@endif
			@if($value->custom2 != null)
			<td width="12%" style="font-size: 12px; font-weight: 600;">Custom 2</td>
			<td width="20%" style="font-size: 12px; border-bottom: 1px solid black;">{{ $value->custom2 }}</td>
			@endif
		</tr>
	</table>
	<table style="width:100%; padding:2%; border-collapse: collapse; font-size: 12px;">
    	<tr>
        	<td style="width:45%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: center; font-size: 15px; font-weight: 600; padding-bottom: 1%; border-bottom: 1px solid black;">Allowance</td>
					</tr>
					@if($value->allowance1Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance1Label != null) ? $value->allowance1Label : 'Allowance 1' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance1Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance2Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance2Label != null) ? $value->allowance2Label : 'Allowance 2' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance2Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance3Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance3Label != null) ? $value->allowance3Label : 'Allowance 3' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance3Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance4Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance4Label != null) ? $value->allowance4Label : 'Allowance 4' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance4Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance5Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance5Label != null) ? $value->allowance5Label : 'Allowance 5' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance5Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance6Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance6Label != null) ? $value->allowance6Label : 'Allowance 6' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance6Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance7Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance7Label != null) ? $value->allowance7Label : 'Allowance 7' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance7Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance8Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance8Label != null) ? $value->allowance8Label : 'Allowance 8' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance8Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance9Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance9Label != null) ? $value->allowance9Label : 'Allowance 9' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance9Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance10Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance10Label != null) ? $value->allowance10Label : 'Allowance 10' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance10Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance11Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance11Label != null) ? $value->allowance11Label : 'Allowance 11' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance11Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance12Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance12Label != null) ? $value->allowance12Label : 'Allowance 12' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance12Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance13Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance13Label != null) ? $value->allowance13Label : 'Allowance 13' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance13Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance14Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance14Label != null) ? $value->allowance14Label : 'Allowance 14' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance14Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance15Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance15Label != null) ? $value->allowance15Label : 'Allowance 15' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance15Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance16Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance16Label != null) ? $value->allowance16Label : 'Allowance 16' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance16Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance17Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance17Label != null) ? $value->allowance17Label : 'Allowance 17' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance17Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance18Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance18Label != null) ? $value->allowance18Label : 'Allowance 18' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance18Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance19Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance19Label != null) ? $value->allowance19Label : 'Allowance 19' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance19Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->allowance20Field > 0)
					<tr>
						<td width="50%">{{ ($value->allowance20Label != null) ? $value->allowance20Label : 'Allowance 20' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->allowance20Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					<tr>
						<td colspan="2" style="background-color: lightgray; padding: 0; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
							<table style="width: 100%; padding: 0; margin: 0;">
								<tr>
									<td width="50%" style="padding: 0; margin: 0;">Total Allowance</td>
									<td width="50%" style="text-align: right; padding: 0; margin: 0;">{{ number_format($value->totalAllowance, 0, ',', '.') }}</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="50%">Payment by</td>
						<td width="50%">Bank Transfer</td>
					</tr>
					<tr>
						<td width="50%">Account Number</td>
						<td width="50%">{{ $value->bankAccountNo1 }}</td>
					</tr>
					<tr>
						<td width="50%" style="border: 1px solid black;">Transfer :</td>
						<td width="50%" style="text-align: right; border: 1px solid black;">{{ number_format(($value->totalAllowance - $value->totalDeduction), 0, ',', '.') }}</td>
					</tr>
				</table>
			</td>
			<td style="width:10%; vertical-align: top;"></td>
			<td style="width:45%; vertical-align: top;">
				<table style="width:100%; border-collapse: collapse;">
					<tr>
						<td colspan="2" style="text-align: center; font-size: 15px; font-weight: 600; padding-bottom: 1%; border-bottom: 1px solid black;">Deduction</td>
					</tr>
					@if($value->deduction1Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction1Label != null) ? $value->deduction1Label : 'Deduction 1' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction1Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction2Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction2Label != null) ? $value->deduction2Label : 'Deduction 2' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction2Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction3Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction3Label != null) ? $value->deduction3Label : 'Deduction 3' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction3Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction4Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction4Label != null) ? $value->deduction4Label : 'Deduction 4' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction4Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction5Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction5Label != null) ? $value->deduction5Label : 'Deduction 5' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction5Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction6Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction6Label != null) ? $value->deduction6Label : 'Deduction 6' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction6Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction7Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction7Label != null) ? $value->deduction7Label : 'Deduction 7' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction7Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction8Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction8Label != null) ? $value->deduction8Label : 'Deduction 8' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction8Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction9Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction9Label != null) ? $value->deduction9Label : 'Deduction 9' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction9Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction10Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction10Label != null) ? $value->deduction10Label : 'Deduction 10' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction10Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction11Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction11Label != null) ? $value->deduction11Label : 'Deduction 11' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction11Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction12Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction12Label != null) ? $value->deduction12Label : 'Deduction 12' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction12Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction13Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction13Label != null) ? $value->deduction13Label : 'Deduction 13' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction13Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction14Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction14Label != null) ? $value->deduction14Label : 'Deduction 14' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction14Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction15Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction15Label != null) ? $value->deduction15Label : 'Deduction 15' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction15Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction16Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction16Label != null) ? $value->deduction16Label : 'Deduction 16' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction16Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction17Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction17Label != null) ? $value->deduction17Label : 'Deduction 17' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction17Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction18Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction18Label != null) ? $value->deduction18Label : 'Deduction 18' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction18Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction19Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction19Label != null) ? $value->deduction19Label : 'Deduction 19' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction19Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					@if($value->deduction20Field > 0)
					<tr>
						<td width="50%">{{ ($value->deduction20Label != null) ? $value->deduction20Label : 'Deduction 20' }}</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->deduction20Field, 0, ',', '.') }}</td>
					</tr>
					@endif
					<tr>
						<td colspan="2" style="background-color: lightgray; padding: 0; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
							<table style="width: 100%; padding: 0; margin: 0;">
								<tr>
									<td width="50%" style="padding: 0; margin: 0;">Total Deduction</td>
									<td width="50%" style="text-align: right; padding: 0; margin: 0;">{{ number_format($value->totalDeduction, 0, ',', '.') }}</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" style="border-bottom: 1px solid black;"><strong>Summary</strong></td>
					</tr>
					<tr>
						<td width="50%">Allowance</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->totalAllowance, 0, ',', '.') }}</td>
					</tr>
					<tr>
						<td width="50%">Deduction</td>
						<td width="50%" style="text-align:right;">{{ number_format($value->totalDeduction, 0, ',', '.') }}</td>
					</tr>
					<tr>
						<td colspan="2" style="background-color: lightgray; padding: 0; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
							<table style="width: 100%; padding: 0; margin: 0;">
								<tr>
									<td width="50%" style="padding: 0; margin: 0;">Take Home Pay</td>
									<td width="50%" style="text-align: right; padding: 0; margin: 0;">{{ number_format(($value->totalAllowance - $value->totalDeduction), 0, ',', '.') }}</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table style="width: 100%; padding:2%; border-collapse: collapse; font-size: 12px;">
		<tr>
			<td width="30%">Prepared by,</td>
			<td width="40%">&nbsp;</td>
			<td width="30%">Received by,</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td width="30%" style="border-bottom: 1px solid black;">{{ Session::get('fullName') }}</td>
			<td width="40%">&nbsp;</td>
			<td width="40%" style="border-bottom: 1px solid black;">{{ $value->employeeName }}</td>
		</tr>
		<tr>
			<td width="30%">&nbsp;</td>
			<td width="40%">&nbsp;</td>
			<td width="40%">{{ $value->employeeNo }}</td>
		</tr>
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